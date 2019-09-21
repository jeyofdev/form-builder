<?php

    namespace App\Form\Builder\Form;


    use App\Form\Builder\Exception\InputsException;


    /**
     * Manage the input form field
     */
    class Inputs
    {
        /**
         * The types of allowed form fields
         */
        const INPUT_TYPES_ALLOWED = ["text", "password"];



        /**
         * The Form Field Attributes allowed with Boolean Values
         */
        const ATTRIBUTES_WITH_BOOLEAN_VALUES_ALLOWED = ["autofocus", "readonly", "required"];



        /**
         * The form field generated
         *
         * @var string
         */
        private static $input;



        /**
         * Get the form field generated
         *
         * @return string
         */
        public static function getInput () : string
        {
            return self::$input;
        }



        /**
         * Set the form field generated
         *
         * @param  string      $label              The label of the field
         * @param  string      $inputName          The name attribute of the field
         * @param  string|null $inputType          The type attribute of the field
         * @param  array       $inputAttributes    The attributes of the field
         * @param  string|null $surround           The tag that surrounds the field
         * @param  array       $surroundAttributes The attributes of the tag that surrounds the field
         * @return void
         */
        public static function setInput (string $label, string $inputName, ?string $inputType, array $inputAttributes = [], ?string $surround = null, array $surroundAttributes = []) : void
        {
            $inputType = !is_null($inputType) ? $inputType : "text";

            if (in_array($inputType, self::INPUT_TYPES_ALLOWED)) {
                $attr = self::listAttributes($inputAttributes);

                $input = '<label for="' . $inputName . '">' . $label . ' :</label>';
                $input .= '<input type="' . $inputType . '" name="' . $inputName . '" ' . $attr . '>';
    
                self::$input = self::setSurround($input, $surround, $surroundAttributes);
            } else {
                throw new InputsException("The type of the form field is not allowed");
            }
        }



        /**
         * Surround a form field with HTML tags
         *
         * @param  string      $input      The form field to surround
         * @param  string|null $surround   The tag of the surround
         * @param  array       $attributes The attributes of the surround
         * @return string
         */
        private static function setSurround(string $input, ?string $surround = null, array $attributes = []): string
        {
            $attr = null;

            if($surround != null){
                if (!empty($attributes)) {
                    $attr = self::listAttributes($attributes);
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
         * @return string
         */
        private static function listAttributes (array $attributes) : string
        {
            $attr = [];

            foreach ($attributes as $k => $v) {
                if (in_array($v, self::ATTRIBUTES_WITH_BOOLEAN_VALUES_ALLOWED)) {
                    $attr[] = $k;
                } else {
                    $attr[] = $k . '="' . $v . '"';
                }
            }

            $attr = implode(" ", $attr);

            return $attr;
        }
    }