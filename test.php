<?php

$filepath = "newresume.zip";
$handle = fopen($filepath, "r");
$contents = fread($handle, filesize($filepath));
fclose($handle);

$base64str = base64_encode($contents);
echo '<pre>';
echo $base64str;
