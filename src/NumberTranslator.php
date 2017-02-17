<?php
    class NumberTranslator
    {
        function translate($input)
        {
            $possible_ones = ["one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
            $possible_twos = ["ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen"];
            $possible_tens = ["twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety"];

            $hundreds = 0;
            $thousands = 0;
            $millions = 0;
            $billions = 0;
            $all_number_array = array();
            $all_number_words_array = array();

            if ($input > 0 && $input < 1000000000000)
            {
                if (strlen((string)$input) < 13) {
                    if (strlen((string)$input) == 1 || strlen((string)$input) == 4 || strlen((string)$input) == 7 || strlen((string)$input) == 10) {
                        $input = "00" . (string)$input;
                        $numbers_split_array = str_split($input, 3);
                    } elseif (strlen((string)$input) == 2 || strlen((string)$input) == 5 || strlen((string)$input) == 8 || strlen((string)$input) == 11) {
                        $input = "0" . (string)$input;
                        $numbers_split_array = str_split($input, 3);
                    } else {
                        $numbers_split_array = str_split($input, 3);
                    }

                    if (count($numbers_split_array) == 1) {
                        $hundreds = (int)$numbers_split_array[0];
                        array_push($all_number_array, $hundreds);
                    } elseif (count($numbers_split_array) == 2) {
                        $thousands = (int)$numbers_split_array[0];
                        $hundreds = (int)$numbers_split_array[1];
                        array_push($all_number_array, $thousands, $hundreds);
                    } elseif (count($numbers_split_array) == 3) {
                        $millions = (int)$numbers_split_array[0];
                        $thousands = (int)$numbers_split_array[1];
                        $hundreds = (int)$numbers_split_array[2];
                        array_push($all_number_array, $millions, $thousands, $hundreds);
                    } elseif (count($numbers_split_array) == 4) {
                        $billions = (int)$numbers_split_array[0];
                        $millions = (int)$numbers_split_array[1];
                        $thousands = (int)$numbers_split_array[2];
                        $hundreds = (int)$numbers_split_array[3];
                        array_push($all_number_array, $billions, $millions, $thousands, $hundreds);

                    }
                }



                foreach ($all_number_array as $unit)
                {
                    //separating 3 numbers into ones, tens, and hundreds
                    $hundred_value = floor($unit / 100);
                    if ($hundred_value > 0) {
                        $hundred_output = $possible_ones[$hundred_value -1];
                    }

                    $ten_value = floor(($unit - ($hundred_value * 100)) / 10);
                    $one_value = $unit - (($hundred_value * 100) + ($ten_value * 10));

                    if ($ten_value > 1) {
                        $ten_output = $possible_tens[$ten_value - 2];
                    } elseif ($ten_value == 1) {
                        $ten_one_number = $unit - ($hundred_value * 100);
                        $ten_output = $possible_twos[$ten_one_number - 10];
                        $one_value = 0;
                    }

                    if ($one_value > 0) {
                        $one_output = $possible_ones[$one_value - 1];
                    }


                    //word outputs for ones, tens, and hundreds
                    if ($hundred_value == 0 && $ten_value == 0 && $one_value == 0 ) {
                        $emptyoutput = "zero";
                        array_push($all_number_words_array, $emptyoutput);
                    }
                    if ($hundred_value == 0 && $ten_value == 0 && $one_value) {
                        $unitoneonly_output = $one_output;
                        array_push($all_number_words_array, $unitoneonly_output);
                    }
                    if ($hundred_value == 0 && $one_value == 0 && $ten_value) {
                        $unittenonly = $ten_output;
                        array_push($all_number_words_array, $unittenonly);
                    }
                    if ($one_value == 0 && $ten_value == 0 && $hundred_value) {
                        $unit_hundred_output = $hundred_output . " hundred";
                        array_push($all_number_words_array, $unit_hundred_output);
                    }
                    if ($hundred_value == 0 && $ten_value && $one_value) {
                        $unithundredonly_output = $ten_output . "-" . $one_output;
                        array_push($all_number_words_array, $unithundredonly_output);
                    }
                    if ($ten_value == 0 && $hundred_value && $one_value) {
                        $unit_noten_output = $hundred_output . " hundred and " . $one_output;
                        array_push($all_number_words_array, $unit_noten_output);
                    }
                    if ($one_value == 0 && $hundred_value && $ten_value) {
                        $unit_noone_output = $hundred_output . " hundred and " . $ten_output;
                        array_push($all_number_words_array, $unit_noone_output);
                    }
                    if ($hundred_value && $ten_value && $one_value) {
                        $unit_all_output = $hundred_output . " hundred and " . $ten_output . "-" . $one_output;
                        array_push($all_number_words_array, $unit_all_output);
                    }
                }
                //end foreach

                if (count($all_number_words_array) == 1)
                {
                    $output = $all_number_words_array[0];
                }
                if (count($all_number_words_array) == 2)
                {
                    if ($all_number_words_array[1] === "zero") {
                        $output = $all_number_words_array[0] . " thousand";
                    } else {
                        $output = $all_number_words_array[0] . " thousand " . $all_number_words_array[1];
                    }
                }
                elseif (count($all_number_words_array) == 3)
                {
                    if ($all_number_words_array[1] === "zero" && $all_number_words_array[2] === "zero") {
                        $output = $all_number_words_array[0] . " million";
                    } elseif ($all_number_words_array[2] === "zero") {
                        $output = $all_number_words_array[0] . " million " . $all_number_words_array[1] . " thousand";
                    } elseif ($all_number_words_array[1] === "zero") {
                        $output = $all_number_words_array[0] . " million " . $all_number_words_array[2];
                    } else {
                        $output = $all_number_words_array[0] . " million " . $all_number_words_array[1] . " thousand " . $all_number_words_array[2];
                    }
                }
                elseif (count($all_number_words_array) == 4)
                {
                    if ($all_number_words_array[1] === "zero" && $all_number_words_array[2] === "zero" && $all_number_words_array[3] === "zero") {
                        $output = $all_number_words_array[0] . " billion";
                    } elseif ($all_number_words_array[2] === "zero" && $all_number_words_array[3] === "zero") {
                        $output = $all_number_words_array[0] . " billion " . $all_number_words_array[1] . " million";
                    } elseif ($all_number_words_array[1] === "zero" && $all_number_words_array[2] === "zero") {
                        $output = $all_number_words_array[0] . " billion " . $all_number_words_array[3];
                    } elseif ($all_number_words_array[1] === "zero" && $all_number_words_array[3] === "zero") {
                        $output = $all_number_words_array[0] . " billion " . $all_number_words_array[2] . " thousand";
                    } elseif ($all_number_words_array[3] === "zero") {
                        $output = $all_number_words_array[0] . " billion " . $all_number_words_array[1] . " million, " . $all_number_words_array[2] . " thousand";
                    } elseif ($all_number_words_array[2] === "zero") {
                        $output = $all_number_words_array[0] . " billion " . $all_number_words_array[1] . " million, " . $all_number_words_array[3];
                    } elseif ($all_number_words_array[1] === "zero") {
                        $output = $all_number_words_array[0] . " billion " . $all_number_words_array[2] . " thousand " . $all_number_words_array[3];
                    }  else {
                        $output = $all_number_words_array[0] . " billion " . $all_number_words_array[1] . " million, " . $all_number_words_array[2] . " thousand " . $all_number_words_array[3];
                    }
                }

            } elseif ($input == 0) {
                $output = "zero";
            } elseif ($input == 100000000000) {
                $output = "one trillion";
            }

            return $output;

        }
    }
?>
