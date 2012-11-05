<?php

require_once dirname(__FILE__).'/../Util.php';

/**
 * Test class for Util.
 * Generated by PHPUnit on 2012-10-31 at 12:55:50.
 */
class UtilTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Util
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Util;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }


    //==========================================
    // test function
    //==========================================
    /**
     * @dataProvider forTestStartsWith
     */
    public function testStartsWith($haystack, $needle, $bool)
    {
        $ret = Util::startsWith($haystack, $needle);
        $this->assertEquals($ret, $bool);
    }

    /**
     * @dataProvider forTestEndsWith
     */
    public function testEndsWith($haystack, $needle, $bool)
    {
        $ret = Util::endsWith($haystack, $needle);
        $this->assertEquals($ret, $bool);
    }

    /**
     * @dataProvider forTestMatchesIn
     */
    public function testMatchesIn($haystack, $needle, $bool)
    {
        $ret = Util::matchesIn($haystack, $needle);
        $this->assertEquals($ret, $bool);
    }

    /**
     *
     */
    public function testGetRandomString(){

        // 文字種のチェック
        for($i=0; $i<250; $i++){
            $random_string = Util::getRandomString();
            $this->assertRegExp("/[a-zA-Z0-9_@]{8}/", $random_string);
        }

        // 文字数のチェック
        $random_string = Util::getRandomString(10);
        $this->assertEquals(strlen($random_string), 10, "char length not expected. random string:".$random_string);
    }

    //==========================================
    // dataProvider
    //==========================================
    public function forTestStartsWith()
    {
        return array(
                array("abc", "a", true),
                array("abc", "b", false),
                array("abc", "c", false),
        );
    }

    public function forTestEndsWith()
    {
        return array(
                array("abc", "a", false),
                array("abc", "b", false),
                array("abc", "c", true),
        );
    }

    public function forTestMatchesIn()
    {
        return array(
                array("abc", "a", true),
                array("abc", "b", true),
                array("abc", "c", true),
                array("abc", "abc", true),
                array("abc", "d", false),
        );
    }
}
?>
