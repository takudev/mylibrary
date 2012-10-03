<?php

/**
 * 前方一致
 * $haystackが$needleから始まるか否かを判定します。
 * @param string $haystack
 * @param string $needle
 * @return TRUE = needleで始まる / FALSE = needleで始まらない
 */
function startsWith($haystack, $needle){
	return strpos($haystack, $needle) === 0;
}

/**
 * 後方一致
 * $haystackが$needleで終わるか判定します。
 * @param string $haystack
 * @param string $needle
 * @return boolean
 */
function endsWith($haystack, $needle){
    $length = (strlen($haystack) - strlen($needle));
    // 文字列長が足りていない場合はFALSEを返します。
    if($length < 0) return false;
    return strpos($haystack, $needle, $length) !== false;
}


/**
 * 部分一致
 * $haystackの中に$needleが含まれているか判定します。
 * @param string $haystack
 * @param string $needle
 * @return boolean
 */
function matchesIn($haystack, $needle){
    return strpos($haystack, $needle) !== false;
}

?>
