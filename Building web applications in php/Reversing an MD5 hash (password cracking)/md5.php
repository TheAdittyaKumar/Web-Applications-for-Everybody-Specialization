<!DOCTYPE html>
<head><title>MD5 Encoder</title></head>
<body>
<h1>MD5 Hash Generator</h1>
<p>Enter a four-digit PIN below to generate its MD5 hash.</p>

<form>
    <input type="text" name="encode" size="40" placeholder="Enter PIN (0000-9999)" />
    <input type="submit" value="Compute MD5"/>
</form>

<?php
$md5 = "Not computed";
if ( isset($_GET['encode']) ) {
    $md5 = hash('md5', $_GET['encode']);
    print "<p>MD5 Hash: " . htmlentities($md5) . "</p>";
}
?>

<p><a href="md5.php">Reset</a></p>
<p><a href="index.php">Back to Cracking</a></p>
</body>
</html>

