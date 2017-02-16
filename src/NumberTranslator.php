<?php
    class NumberTranslator
    {
        function translate($input)
        {
            $possible_ones = ["one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
            $possible_twos = ["ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen"];
            $possible_tens = ["twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety"];

            if ($input < 10)
            {
                $output = $possible_ones[$input - 1];
            }
            elseif ($input < 20)
            {
                $output = $possible_twos[$input - 10];
            }
            elseif ($input < 100)
            {
                $ten_value = floor($input / 10);
                $ten_output = $possible_tens[$ten_value - 2];
                $one_value = $input - ($ten_value * 10);
                $one_output = $possible_ones[$one_value - 1];
                $output = $ten_output . "-" . $one_output;
            }
            elseif ($input < 1000)
            {
                $hundred_value = floor($input / 100);
                $hundred_output = $possible_ones[$hundred_value -1];
                $ten_value = floor(($input - ($hundred_value * 100)) / 10);
                $ten_output = $possible_tens[$ten_value - 2];
                $one_value = $input - (($hundred_value * 100) + ($ten_value * 10));
                $one_output = $possible_ones[$one_value - 1];
                if ($one_output == 0 && $ten_output == 0) {
                    $output = $hundred_output . " hundred";
                }
                if ($ten_output == 0) {
                    $output = $hundred_output . " hundred and " . $one_output;
                }
                if ($one_output == 0) {
                    $output = $hundred_output . " hundred and " . $ten_output;
                }
                if ($hundred_output && $ten_output && $one_output) {
                    $output = $hundred_output . " hundred and " . $ten_output . "-" . $one_output;
                }
            }

            return $output;

        }
    }
?>
