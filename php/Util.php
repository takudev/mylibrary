<?php

class Util{

    /**
     * 前方一致
     * $haystackが$needleから始まるか否かを判定します。
     * @param string $haystack
     * @param string $needle
     * @return TRUE = needleで始まる / FALSE = needleで始まらない
     */
    public static function startsWith($haystack, $needle){
    	return strpos($haystack, $needle) === 0;
    }

    /**
     * 後方一致
     * $haystackが$needleで終わるか判定します。
     * @param string $haystack
     * @param string $needle
     * @return boolean
     */
    public static function endsWith($haystack, $needle){
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
    public static function matchesIn($haystack, $needle){
        return strpos($haystack, $needle) !== false;
    }

    /**
     * ランダムな文字列を生成する。
     * @param int $nLengthRequired 必要な文字列長。省略すると 8 文字
     * @return String ランダムな文字列
     */
    public static function getRandomString($nLengthRequired = 8){
        $sCharList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_@";
        mt_srand();
        $sRes = "";
        for($i = 0; $i < $nLengthRequired; $i++)
            $sRes .= $sCharList[mt_rand(0, strlen($sCharList) - 1)];
        return $sRes;
    }

}
?>
