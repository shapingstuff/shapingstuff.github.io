<?php
// URL of the image you want to download
$imageUrl = "https://tommydylan.com/wp-content/uploads/2023/01/FindingOthers2_2.png";

// Directory where you want to save the downloaded image
$targetDirectory = "public_html/downloads/";

// Create the target directory if it doesn't exist
if (!is_dir($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

// Extract the filename from the URL
$filename = basename($imageUrl);

// Check if the file already exists in the target directory
if (file_exists($targetDirectory . $filename)) {
    echo "File already exists.";
} else {
    // Use cURL to download the image
    $ch = curl_init($imageUrl);
    $fp = fopen($targetDirectory . $filename, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    echo "Image downloaded successfully.";
}
?>