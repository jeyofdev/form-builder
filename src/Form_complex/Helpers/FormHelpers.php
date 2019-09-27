<?php

    namespace App\Form\Builder\Form_complex\Helpers;


    use App\Form\Builder\Form_complex\Exception\RuntimeException;


    class FormHelpers
    {
        /**
         * Check that an attribute is allowed for a form element
         *
         * @param  array $options
         * @param        $class   The class corresponding to the type of the field (TextType, PasswordType...)
         * @return void
         */
        public static function checkOptionIsAllowed (array $options, $class) : void
        {
            foreach ($options as $k => $v) {
                if (!in_array($k, $class->getAllowedOptions())) {
                    throw new RuntimeException("The attribute '$k' is not allowed for this field");
                }
            }
        }
    }