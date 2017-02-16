<?php
    class NumberTranslator
    {
        function translate($input)
        {
            $possible_ones = ["one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
            // $possible_twos = array("eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen");
            $output = $possible_ones[$input - 1];
            return $output;
        }
    }
?>
