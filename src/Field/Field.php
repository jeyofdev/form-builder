<?php

    namespace App\Form\Builder\Field;


    /**
     * Manage the form fields
     */
    abstract class Field
    {
        /**
         * The allowed types for the input form fields
         */
        const INPUT_TYPES_ALLOWED = ["text", "password", "file"];



        /**
         * The allowed types for radio buttons and checkboxes
         */
        const CASE_TYPES_ALLOWED = ["radio", "checkbox"];



        /**
         * The Field Attributes allowed with Boolean Values
         */
        const ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED = [
            "autofocus", "disabled", "readonly", "required", "checked", "multiple"
        ];



        /**
         * Get the list of attributes of a form field
         *
         * @param  array $attributes The attributes of a form field
         * @param  array $compare    The comparison array
         * @return string
         */
        protected static function listAttributes (array $attributes, array $compare) : string
        {
            $attr = [];

            foreach ($attributes as $k => $v) {
                if (in_array($v, $compare)) {
                    $attr[] = $k;
                } else {
                    $attr[] = $k . '="' . $v . '"';
                }
            }

            $attr = implode(" ", $attr);

            return $attr;
        }
    }
