<?php
require_once("*.php");

$haystack = "aaa@docomo.ne.jpa";
$needle = "docomo.ne.jp";

$ret = endsWith($haystack, $needle);

echo($ret ? "true":"false");
echo(PHP_EOL);


?>
