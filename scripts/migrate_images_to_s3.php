<?php

require __DIR__ . '/vendor/autoload.php';

// Initialize Laravel application
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Venue;
use Illuminate\Support\Facades\DB;


class ImageMigrator
{
    private $processedCount = 0;
    private $errorCount = 0;
    private $startTime;

    public function __construct()
    {
        $this->startTime = microtime(true);
    }

    public function migrate()
    {
        $this->log("Starting migration...");

        $chunkSize = 10;
        $processedTotal = 0;

        Venue::whereDoesntHave('dietCategories', function ($query) {
            $query->where('name', 'halal');
        })->chunk($chunkSize, function ($venues) use (&$processedTotal) {
            $this->log("Processing chunk of {$venues->count()} venues...");

            foreach ($venues as $venue) {
                $this->processVenue($venue);
                $processedTotal++;
            }

            $this->log("Completed chunk. Total processed: {$processedTotal}");
        });

        $this->printSummary();
    }

    private function processVenue(Venue $venue)
    {
        $this->log("Processing venue ID: {$venue->id} - {$venue->name}");

        try {
            // Process thumbnail
            if ($venue->thumbnail_url) {
                $newThumbnailUrl = $this->processImage(
                    'https://discoverhongkong.com/' . $venue->thumbnail_url,
                    "venues/{$venue->id}/thumbnail_" . basename($venue->thumbnail_url)
                );
                if ($newThumbnailUrl) {
                    $venue->thumbnail_url = $newThumbnailUrl;
                }
            }

            // Process images array
            if ($venue->images) {
                $newImages = [];
                foreach ($venue->images as $index => $imageUrl) {
                    $newUrl = $this->processImage(
                        $imageUrl,
                        "venues/{$venue->id}/image_{$index}_" . basename($imageUrl)
                    );
                    $newImages[] = $newUrl ?: $imageUrl;
                }
                $venue->images = $newImages;
            }

            $venue->save();
            $this->processedCount++;
            $this->log("Successfully processed venue ID: {$venue->id}");
        } catch (\Exception $e) {
            $this->errorCount++;
            $this->log("Error processing venue ID {$venue->id}: " . $e->getMessage(), 'error');
        }
    }

    private function processImage($sourceUrl, $destinationPath)
    {
        try {
            // Modified check since we're no longer dealing with DiscoverHK URLs
            if (str_contains($sourceUrl, 's3.amazonaws.com')) {
                $this->log("Skipping existing S3 image: {$sourceUrl}");
                return $sourceUrl;
            }

            $response = Http::timeout(30)->get($sourceUrl);

            if ($response->successful()) {
                Storage::disk('s3')->put($destinationPath, $response->body());
                $this->log("Migrated image: {$sourceUrl} -> {$destinationPath}");
                return $destinationPath;  // Store only the path
            } else {
                $this->log("Failed to download image: {$sourceUrl} (Status: {$response->status()})", 'error');
                return null;
            }
        } catch (\Exception $e) {
            $this->log("Error processing image {$sourceUrl}: " . $e->getMessage(), 'error');
            return null;
        }
    }

    private function log($message, $level = 'info')
    {
        $timestamp = date('Y-m-d H:i:s');
        $message = "[{$timestamp}] {$message}";

        echo $message . PHP_EOL;
        Log::$level($message);
    }

    private function printSummary()
    {
        $duration = round(microtime(true) - $this->startTime, 2);
        $summary = PHP_EOL . str_repeat('=', 50) . PHP_EOL;
        $summary .= "Migration Summary:" . PHP_EOL;
        $summary .= "Total venues processed: {$this->processedCount}" . PHP_EOL;
        $summary .= "Errors encountered: {$this->errorCount}" . PHP_EOL;
        $summary .= "Total duration: {$duration} seconds" . PHP_EOL;
        $summary .= str_repeat('=', 50) . PHP_EOL;

        echo $summary;
        Log::info($summary);
    }
}

// Run the migration
try {
    $migrator = new ImageMigrator();
    $migrator->migrate();
} catch (\Exception $e) {
    Log::error("Fatal error: " . $e->getMessage());
    echo "Fatal error: " . $e->getMessage() . PHP_EOL;
}
