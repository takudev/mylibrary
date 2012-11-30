<?php

// 現在時刻 UnixTimestamp
$now_uts = time();

// 時間の差分秒数　ex) 24時間と1秒前
list($h, $m, $s) = array(24, 0, 1);
$shift_uts = $h*3600 + $m*60 + $s;

// 結果時間
$result_uts = $now_uts - $shift_uts;


echo sprintf("shift msec    :%02d:%02d:%02d", $h, $m, $s).PHP_EOL;
echo sprintf("unix timestamp:%s -> %s", $now_uts, $result_uts).PHP_EOL;
echo sprintf("format        :%s -> %s", date('Y-m-d H:i:s', $now_uts), date('Y-m-d H:i:s', $result_uts)).PHP_EOL;

?>
