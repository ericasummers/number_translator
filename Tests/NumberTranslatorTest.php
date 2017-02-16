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

        function test_translate_twoDigitNumber()
        {
            $test_NumberTranslator = new NumberTranslator;
            $input = 15;

            $result = $test_NumberTranslator->translate($input);

            $this->assertEquals("fifteen", $result);
        }

        function test_translate_twoDigitNumber_aboveTwenty()
        {
            $test_NumberTranslator = new NumberTranslator;
            $input = 35;

            $result = $test_NumberTranslator->translate($input);

            $this->assertEquals("thirty-five", $result);
        }

        function test_translate_threeDigitNumber()
        {
            $test_NumberTranslator = new NumberTranslator;
            $input = 151;

            $result = $test_NumberTranslator->translate($input);

            $this->assertEquals("one hundred and fifty-one", $result);
        }
    }

?>
