<?php

$inputFile = 'database/seeders/VenuesSeeder.php';
$outputFile = 'database/seeders/VenuesSeeder_processed.php';

$content = file_get_contents($inputFile);

// Function to convert escaped JSON string to json_encode format
function convertToJsonEncode($match)
{
    // Remove escaped quotes and slashes
    $str = str_replace(['\\"', '\\/'], ['"', '/'], $match[1]);

    // Parse the JSON string
    $arr = json_decode($str, true);

    // Return the proper format
    return "'images' => " . ($arr ? "json_encode(" . var_export($arr, true) . ")" : "json_encode([])");
}

// Function to process remarks field
function processRemarks($match)
{
    // Remove escaped quotes and slashes
    $str = str_replace(['\\"', '\\/'], ['"', '/'], $match[1]);

    // If it's just empty quotes, return empty string
    if ($str === '""') {
        return "'remarks' => ''";
    }

    // Otherwise, properly encode any HTML/content
    return "'remarks' => " . json_encode($str);
}

// Process images field
$pattern = "/'images' => '(.*?)'/s";
$content = preg_replace_callback($pattern, 'convertToJsonEncode', $content);

// Process remarks field
$pattern = "/'remarks' => '(.*?)'/s";
$content = preg_replace_callback($pattern, 'processRemarks', $content);

// Save the processed file
file_put_contents($outputFile, $content);

echo "Processing complete! Check " . $outputFile . "\n";
