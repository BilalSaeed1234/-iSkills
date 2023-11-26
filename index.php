<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the remote APK URL from the user input
    $apkUrl = $_POST["apk_url"];

    // Validate the URL (you may want to add more robust validation)
    if (filter_var($apkUrl, FILTER_VALIDATE_URL) !== false) {
        // Generate a unique filename for the APK
        $filename = "downloaded_app_" . time() . ".apk";

        // Download the APK file from the remote URL
        file_put_contents($filename, file_get_contents($apkUrl));

        // Provide a link to the downloaded APK file
        echo "APK file downloaded successfully. <a href='$filename' download>Download Here</a>";
    } else {
        echo "Invalid URL. Please enter a valid APK file URL.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APK File Uploader</title>
</head>
<body>
    <h2>Upload Remote APK File</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="apk_url">APK File URL:</label>
        <input type="text" name="apk_url" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
