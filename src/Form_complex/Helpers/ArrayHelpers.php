<?php

    namespace App\Form\Builder\Form_complex\Helpers;


    class ArrayHelpers
    {
        /**
         * get the list of keys and values ​​of an array
         * and recover them as a string of characters
         *
         * @param array $attributes
         * @return string
         */
        public static function listAttributes (array $attributes) : string
        {
            $attr = [];

            foreach ($attributes as $k => $v) {
                $attr[] = $k . '="' . $v . '"';
            }

            return implode(" ", $attr);
        }



        /**
         * Check that a key exists in an array and get its value
         *
         * @param  string $key
         * @param  array  $compare
         * @return mixed
         */
        public static function checkKeyExistsAndGetValue ($key, array $compare)
        {
            $value = null;

            if (array_key_exists($key, $compare)) {
                $value = $compare[$key];
            }

            return $value;
        }
    }