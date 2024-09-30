<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot;

class OgImageService
{
    /**
     * Create image from HTML
     */
    protected function fromHtml(string $html, string $path): void
    {
        try {
            $browserShot = \Spatie\Browsershot\Browsershot::html($html)
                ->fullPage()
                ->noSandbox();

            if (! app()->environment('local')) {
                $browserShot->setUserDataDir(config('app.app_domain'));
            }

            $browserShot->waitUntilNetworkIdle()->save($path);
        } catch (CouldNotTakeBrowsershot $e) {
            Log::error($e->getMessage());

            return;
        }
    }

    /**
     * Create image from URL
     */
    protected function fromUrl(string $title, ?string $description, string $path): void
    {
        try {
            $browserShot = \Spatie\Browsershot\Browsershot::url(route('og-image', ['title' => $title, 'description' => $description]))
                ->fullPage()
                ->noSandbox();

            if (! app()->environment('local')) {
                $browserShot->setUserDataDir(config('app.app_domain'));
            }

            $browserShot->waitUntilNetworkIdle()->save($path);
        } catch (CouldNotTakeBrowsershot $e) {
            Log::error($e->getMessage());

            return;
        }
    }

    /**
     * Get temporary image file paths
     */
    private function tmpImgFilePaths(string $title): array
    {
        $fileName = Str::slug($title).'.png';
        $tmpPath = storage_path('app/public/tmp/og-image');

        if (! File::exists($tmpPath)) {
            File::makeDirectory($tmpPath, 0755, true);
        }

        return [
            'tmpFilePath' => $tmpPath.'/'.$fileName,
            'imageFile' => "og-images/$fileName",
        ];
    }

    /**
     * Create image
     */
    private function makeImage(string $title, ?string $description, string $tmpFilePath, string $imageFile): void
    {
        $html = view('seo.image', [
            'title' => $title,
            'description' => $description,
        ])->render();

        $this->fromHtml($html, $tmpFilePath);

        Storage::put($imageFile, file_get_contents($tmpFilePath));

        File::delete($tmpFilePath); // Remove temporary image
    }

    /**
     * Save image or return image url if image with the same title slug already exists
     */
    public function saveImage(string $title, ?string $description = null): ?string
    {
        try {
            ['tmpFilePath' => $tmpFilePath, 'imageFile' => $imageFile] = $this->tmpImgFilePaths($title);

            $this->makeImage($title, $description, $tmpFilePath, $imageFile);

            return Storage::url($imageFile);
        } catch (Exception $exception) {
            Log::error($exception);

            return null;
        }
    }

    /**
     *  Save image or return image content if image with the same title slug already exists
     * /
     */
    public function getImage(string $title, ?string $description = null): ?string
    {
        try {
            ['tmpFilePath' => $tmpFilePath, 'imageFile' => $imageFile] = $this->tmpImgFilePaths($title);

            if (Storage::exists($imageFile)) {
                return Storage::get($imageFile);
            }

            $this->makeImage($title, $description, $tmpFilePath, $imageFile);

            return Storage::get($imageFile);
        } catch (Exception $exception) {
            Log::error($exception);

            return null; // null can be replaced with default image for the cases when image generation fails
        }
    }
}
