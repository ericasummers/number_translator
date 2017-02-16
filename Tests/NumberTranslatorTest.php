<?php
    require_once __DIR__.'/../src/NumberTranslator.php';

    class NumberTranslatorTest extends PHPUnit_Framework_TestCase
    {
        function test_translate_singleDigit()
        {
            $test_NumberTranslator = new NumberTranslator;
            $input = 5;

            $result = $test_NumberTranslator->translate($input);

            $this->assertEquals("five", $result);
        }
    }

?>
