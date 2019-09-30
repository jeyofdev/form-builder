<?php

    namespace App\Form\Builder\Helpers;


    use App\Form\Builder\Exception\RuntimeException;


    class ArrayHelpers
    {
        /**
         * get the list of keys and values ​​of an array
         * and recover them as a string of characters
         *
         * @param array $attributes
         * @return string
         */
        public static function listAttributes (array $attributes, array $compare = []) : string
        {
            $attr = [];

            foreach ($attributes as $k => $v) {
                if (!empty($compare)) {
                    if (in_array($k, $compare)) {
                        $attr[] = $k . '="' . $v . '"';
                    } else {
                        throw new RuntimeException("The attribute '$k' is not allowed for Html label element");
                    }
                } else {
                    $attr[] = $k . '="' . $v . '"';
                }
            }

            return implode(" ", $attr);
        }
    }