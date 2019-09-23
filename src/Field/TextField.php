<?php

    namespace App\Form\Builder\Field;


    use App\Form\Builder\Exception\TextFieldException;


    /**
     * Manage the form fields
     */
    class TextField extends Field
    {
        /**
         * The form field generated
         *
         * @var string
         */
        private static $field;



        /**
         * Get the form field generated
         *
         * @return string
         */
        public static function getfield () : string
        {
            return self::$field;
        }



        /**
         * Set an input form field
         *
         * @param  string|null $label              The label of the input
         * @param  string      $inputName          The name attribute of the input
         * @param  string|null $inputType          The type attribute of the input
         * @param  array       $inputAttributes    The attributes of the input
         * @param  string      $surround           The tag that surrounds the input
         * @param  array       $surroundAttributes The attributes of the surround
         * @return void
         */
        public static function setInput (?string $label = null, string $inputName, ?string $inputType, array $inputAttributes = [], ?string $surround = null, array $surroundAttributes = []) : void
        {
            $inputType = !is_null($inputType) ? $inputType : "text";

            if (in_array($inputType, self::INPUT_TYPES_ALLOWED)) {
                $attr = self::listAttributes($inputAttributes, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED);

                $field = '';
                if (!is_null($label)) {
                    $field .= '<label for="' . $inputName . '">' . $label . ' :</label>';
                }
                $field .= '<input type="' . $inputType . '" name="' . $inputName . '" ' . $attr . '>';

                self::$field = self::setField($field, $surround, $surroundAttributes);
            } else {
                throw new TextFieldException("The type of the form field is not allowed");
            }
        }



        /**
         * Set a textarea form field
         *
         * @param  string|null $label              The label of the textarea
         * @param  string      $textareaName       The name attribute of the textarea
         * @param  array       $textareaAttributes The attributes of the textarea
         * @param  string      $surround           The tag that surrounds the textarea
         * @param  array       $surroundAttributes The attributes of the surround
         * @return void
         */
        public static function setTextarea (?string $label, string $textareaName, array $textareaAttributes = [], ?string $surround = null, array $surroundAttributes = []) : void
        {
            $attr = self::listAttributes($textareaAttributes, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED);

            $field = '';
            if (!is_null($label)) {
                $field = '<label for="' . $textareaName . '">' . $label . ' :</label>';
            }
            $field .= '<textarea name="' . $textareaName . '" ' . $attr . '></textarea>';

            self::$field = self::setField($field, $surround, $surroundAttributes);
        }



        /**
         * Set a radio button or checkbox
         *
         * @param  string  $label              The label of the radio button or checkbox
         * @param  string  $caseName           The name attribute of the radio button or checkbox
         * @param  string  $caseType           The type attribute of the radio button or checkbox
         * @param  string  $caseValue          The value attribute of the radio button or checkbox
         * @param  array   $caseAttributes     The attributes of the radio button or checkbox
         * @param  string  $surround           The tag that surrounds the radio button or checkbox
         * @param  array   $surroundAttributes The attributes of the surround
         * @return void
         */
        public static function setCase (string $label, string $caseName, string $caseType, string $caseValue, array $caseAttributes = [], ?string $surround = null, array $surroundAttributes = []) : void
        {
            if (in_array($caseType, self::CASE_TYPES_ALLOWED)) {
                $attr = self::listAttributes($caseAttributes, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED);

                $field = '<input type="' . $caseType . '" id="' . $caseValue . '" name="' . $caseName . '" value="' . $caseValue . '" ' . $attr . '>';
                $field .= '<label for="' . $caseValue . '">' . $label . ' :</label>';

                self::$field = self::setField($field, $surround, $surroundAttributes);
            } else {
                throw new TextFieldException("The type must be radio or checkbox");
            }
        }



        /**
         * Set a select field
         *
         * @param  string|null  $label              The label of the select
         * @param  string       $selectName         The name attribute of the select
         * @param  array        $selectAttributes   The attributes of the select
         * @param  array        $options            The options of the select
         * @param  integer|null $optionsSelected    The selected option of the select
         * @param  string       $surround           The tag that surrounds the select
         * @param  array        $surroundAttributes The attributes of the surround
         * @return void
         */
        public static function setSelect (?string $label = null, string $selectName, array $selectAttributes = [], array $options = [], ?int $optionsSelected = null, ?string $surround = null, array $surroundAttributes = []) : void
        {
            $attr = self::listAttributes($selectAttributes, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED);

            $field = '';
            if (!is_null($label)) {
                $field .= '<label for="' . $selectName . '">' . $label . ' :</label>';
            }

            $selectOptions = [];
            foreach ($options as $k => $v) {
                $selected = ($k === $optionsSelected) ? "selected" : null;
                $selectOptions[] = '<option value="' . $k . '" ' . $selected . '>' . $v . '</option>';
            }

            $selectOptions = implode('', $selectOptions);

            $field .= '<select name="' . $selectName . '" ' . $attr . '>';
            $field .= $selectOptions;
            $field .= '</select>';

            self::$field = self::setField($field, $surround, $surroundAttributes);
        }



        /**
         * Set a hidden field
         *
         * @param  string $hiddenName       The name attribute of the hidden field
         * @param  array  $hiddenAttributes The attributes of the hidden field
         * @return void
         */
        public static function setHidden (string $hiddenName, array $hiddenAttributes = []) : void
        {
            $attr = self::listAttributes($hiddenAttributes, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED);
            $field = '<input type="hidden" name="' . $hiddenName . '" ' . $attr . '>';

            self::$field = self::setField($field);
        }



        /**
         * Set a button
         *
         * @param  string  $label               The label of the button
         * @param  string  $buttonType          The button type (submit or reset)
         * @param  array   $buttonAttributes    The attributes of the button
         * @param  string  $surround            The tag that surrounds the button
         * @param  array   $surroundAttributes  The attributes of the surround
         * @return void
         */
        public static function setButton (string $label, string $buttonType, array $buttonAttributes = [], ?string $surround = null, array $surroundAttributes = []) : void
        {
            $attr = self::listAttributes($buttonAttributes, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED);
            $field = '<button type="' . $buttonType . '" ' . $attr . '>' . $label . '</button>';

            self::$field = self::setField($field, $surround, $surroundAttributes);
        }



        /**
         * Set an input form field
         *
         * @param  string      $field              The field to surround
         * @param  string|null $surround           The tag that surrounds the button
         * @param  array       $surroundAttributes The attributes of the surround
         * @return string
         */
        private static function setField (string $field, ?string $surround = null, array $surroundAttributes = []) : string
        {
            if (!is_null($surround)) {
                $field = Surround::row($surround, $surroundAttributes, $field);
            }

            return $field;
        }
    }