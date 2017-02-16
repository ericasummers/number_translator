<?php
    class NumberTranslator
    {
        function translate($input)
        {
            $possible_ones = ["one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
            $possible_twos = ["ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen"];
            if ($input < 10)
            {
                $output = $possible_ones[$input - 1];
            }
            elseif ($input < 20)
            {
                $output = $possible_twos[$input - 10];
            }
            return $output;

        }
    }
?>
