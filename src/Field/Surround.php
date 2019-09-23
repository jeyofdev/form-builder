<?php

    namespace App\Form\Builder\Field;


    /**
     * Manage the tag that surrounds a form field
     */
    class Surround extends Field
    {
        /**
         * Generate the form fields with the surround
         *
         * @param  string $surround  The tag that surrounds the field
         * @param  array $attributes The attributes of the surround
         * @param  mixed ...$inputs The fields to surround
         * @return string
         */
        public static function row (string $surround, array $attributes = [], ...$inputs) : string
        {
            if (is_array($inputs[0])) {
                $inputs = implode("\n", $inputs[0]);
            } else {
                $inputs = implode("\n", $inputs);
            }
            $surroundBloc = self::setSurround($inputs, $surround, $attributes, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED);

            return $surroundBloc;
        }



        /**
         * Surround a form field with HTML tags
         *
         * @param  string|null $input      The form field to surround
         * @param  string|null $surround   The tag that surrounds the field
         * @param  array       $attributes The attributes of the surround
         * @param  array       $compare    The comparison array
         * @return string
         */
        private static function setSurround(?string $input, ?string $surround = null, array $attributes = [], array $compare): string
        {
            $attr = null;

            if($surround != null){
                if (!empty($attributes)) {
                    $attr = self::listAttributes($attributes, $compare);
                }

                $surroundInput = '<' . $surround . ' ' . $attr . '>';
                $surroundInput .= $input;
                $surroundInput .= '</' . $surround . '>';
            } else{
                $surroundInput = $input;
            }

            return $surroundInput;
        }
    }