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

// Process images field
$pattern = "/'images' => '(.*?)'/s";
$content = preg_replace_callback($pattern, 'convertToJsonEncode', $content);

// Process remarks field
$content = str_replace("'remarks' => '\"\"'", "'remarks' => ''", $content);

// Save the processed file
file_put_contents($outputFile, $content);

echo "Processing complete! Check " . $outputFile . "\n";
