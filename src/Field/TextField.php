<?php

    namespace App\Form\Builder\Field;


    use App\Form\Builder\Exception\TextFieldException;


    /**
     * Manage the text form fields
     */
    class TextField extends Field
    {
        /**
         * The allowed types for the input form fields
         */
        const INPUT_TYPES_ALLOWED = ["text", "password"];



        /**
         * The allowed types for radio buttons and checkboxes
         */
        const CASE_TYPES_ALLOWED = ["radio", "checkbox"];



        /**
         * The Form Field Attributes allowed with Boolean Values
         */
        const ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED = ["autofocus", "readonly", "required"];
        const ATTRIBUTES_CASE_WITH_BOOLEAN_VALUES_ALLOWED = ["autofocus", "readonly", "required", "checked"];



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
         * @param  string|null $label              The label of the field
         * @param  string      $inputName          The name attribute of the field
         * @param  string|null $inputType          The type attribute of the field
         * @param  array       $inputAttributes    The attributes of the field
         * @param  string|null $surround           The tag that surrounds the field
         * @param  array       $surroundAttributes The attributes of the tag that surrounds the field
         * @return void
         */
        public static function setInput (?string $label = null, string $inputName, ?string $inputType, array $inputAttributes = [], ?string $surround = null, array $surroundAttributes = []) : void
        {
            $inputType = !is_null($inputType) ? $inputType : "text";

            if (in_array($inputType, self::INPUT_TYPES_ALLOWED)) {
                $attr = self::listAttributes($inputAttributes, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED);

                $input = '';
                if (!is_null($label)) {
                    $input .= '<label for="' . $inputName . '">' . $label . ' :</label>';
                }

                $input .= '<input type="' . $inputType . '" name="' . $inputName . '" ' . $attr . '>';
    
                self::$field = self::setSurround($input, $surround, $surroundAttributes, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED);
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
         * @param  string|null $surround           The tag that surrounds the textarea
         * @param  array       $surroundAttributes The attributes of the tag that surrounds the textarea
         * @return void
         */
        public static function setTextarea (?string $label, string $textareaName, array $textareaAttributes = [], ?string $surround = null, array $surroundAttributes = []) : void
        {
            $attr = self::listAttributes($textareaAttributes, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED);

            $textarea = '';
            if (!is_null($label)) {
                $textarea = '<label for="' . $textareaName . '">' . $label . ' :</label>';
            }

            $textarea .= '<textarea name="' . $textareaName . '" ' . $attr . '></textarea>';

            self::$field = self::setSurround($textarea, $surround, $surroundAttributes, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED);
        }



        /**
         * Set a radio button or checkbox
         *
         * @param  string      $label              The label of the radio button or checkbox
         * @param  string      $caseName           The name attribute of the radio button or checkbox
         * @param  string      $caseType           The type attribute of the radio button or checkbox
         * @param  string      $caseValue          The value attribute of the radio button or checkbox
         * @param  array       $caseAttributes     The attributes of the radio button or checkbox
         * @param  string|null $surround           The tag that surrounds the radio button or checkbox
         * @param  array       $surroundAttributes The attributes of the tag that surrounds the radio button or checkbox
         * @return void
         */
        public static function setCase (string $label, string $caseName, string $caseType, string $caseValue, array $caseAttributes = [], ?string $surround = null, array $surroundAttributes = []) : void
        {
            if (in_array($caseType, self::CASE_TYPES_ALLOWED)) {
                $attr = self::listAttributes($caseAttributes, self::ATTRIBUTES_CASE_WITH_BOOLEAN_VALUES_ALLOWED);

                $case = '<input type="' . $caseType . '" id="' . $caseValue . '" name="' . $caseName . '" value="' . $caseValue . '" ' . $attr . '>';
                $case .= '<label for="' . $caseValue . '">' . $label . ' :</label>';
                
                self::$field = self::setSurround($case, $surround, $surroundAttributes, self::ATTRIBUTES_CASE_WITH_BOOLEAN_VALUES_ALLOWED);
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
         * @param  string|null  $surround           The tag that surrounds the select
         * @param  array        $surroundAttributes The attributes of the tag that surrounds the select
         * @return void
         */
        public static function setSelect (?string $label = null, string $selectName, array $selectAttributes = [], array $options = [], ?int $optionsSelected = null, ?string $surround = null, array $surroundAttributes = []) : void
        {
            $attr = self::listAttributes($selectAttributes, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED);

            $select = '';
            if (!is_null($label)) {
                $select .= '<label for="' . $selectName . '">' . $label . ' :</label>';
            }

            $selectOptions = [];
            foreach ($options as $k => $v) {
                $selected = ($k === $optionsSelected) ? "selected" : null;
                $selectOptions[] = '<option value="' . $k . '" ' . $selected . '>' . $v . '</option>';
            }

            $selectOptions = implode('', $selectOptions);

            $select .= '<select name="' . $selectName . '" ' . $attr . '>';
            $select .= $selectOptions;
            $select .= '</select>';

            self::$field = self::setSurround($select, $surround, $surroundAttributes, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED);
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
            $hidden = '<input type="hidden" name="' . $hiddenName . '" ' . $attr . '>';
    
            self::$field = $hidden;
        }
    }