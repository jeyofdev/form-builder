<?php

    namespace App\Form\Builder\Field;


    /**
     * Manage the form fields
     */
    abstract class Field
    {
        /**
         * Surround a form field with HTML tags
         *
         * @param  string      $input      The form field to surround
         * @param  string|null $surround   The tag of the surround
         * @param  array       $attributes The attributes of the surround
         * @param  array       $compare    The comparison array
         * @return string
         */
        protected static function setSurround(string $input, ?string $surround = null, array $attributes = [], array $compare): string
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
