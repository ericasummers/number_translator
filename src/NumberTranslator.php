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

            return $output;

        }
    }
?>
