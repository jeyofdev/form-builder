<?php

    namespace App\Form\Builder;


    use App\Form\Builder\Field\TextField;
    use App\Form\Builder\Form\Form;


    /**
     * Manage a form
     */
    class FormBuilder
    {
        /**
         * Set the start tag of a form
         *
         * @param  string|null $action the action attribute
         * @param  string|null $method the method attribute
         * @return string
         */
        public function formStart (?string $action = null, ?string $method = null) : string
        {
            Form::setFormStart($action, $method);
            return Form::getFormStart();
        }



        /**
         * Set the end tag of a form
         *
         * @return string
         */
        public function formEnd () : string
        {
            return Form::getFormEnd();
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
         * @return string
         */
        public function input (?string $label, string $inputName, ?string $inputType, array $inputAttributes = [], ?string $surround = null, array $surroundAttributes = []) : string
        {
            TextField::setInput($label, $inputName, $inputType, $inputAttributes, $surround, $surroundAttributes);
            return TextField::getField();
        }



        /**
         * Set a textarea
         *
         * @param  string|null $label              The label of the textarea
         * @param  string      $textareaName       The name attribute of the textarea
         * @param  array       $textareaAttributes The attributes of the textarea
         * @param  string|null $surround           The tag that surrounds the textarea
         * @param  array       $surroundAttributes The attributes of the tag that surrounds the textarea
         * @return string
         */
        public function textarea (?string $label, string $textareaName, array $textareaAttributes = [], ?string $surround = null, array $surroundAttributes = []) : string
        {
            TextField::setTextarea($label, $textareaName, $textareaAttributes, $surround, $surroundAttributes);
            return TextField::getField();
        }



        /**
         * Set a radio button
         *
         * @param  string      $label              The label of the radio button or checkbox
         * @param  string      $caseName           The name attribute of the radio button or checkbox
         * @param  array       $caseAttributes     The attributes of the radio button or checkbox
         * @param  string      $caseValue          The value attribute of the radio button or checkbox
         * @param  string|null $surround           The tag that surrounds the radio button or checkbox
         * @param  array       $surroundAttributes The attributes of the tag that surrounds the radio button or checkbox
         * @return string
         */
        public function radio (string $label, string $caseName, string $caseValue, array $caseAttributes = [], ?string $surround = null, array $surroundAttributes = []) : string
        {
            TextField::setCase($label, $caseName, "radio", $caseValue, $caseAttributes, $surround, $surroundAttributes);
            return TextField::getField();
        }



        /**
         * Set a checkbox
         *
         * @param  string      $label              The label of the radio button or checkbox
         * @param  string      $caseName           The name attribute of the radio button or checkbox
         * @param  array       $caseAttributes     The attributes of the radio button or checkbox
         * @param  string      $caseValue          The value attribute of the radio button or checkbox
         * @param  string|null $surround           The tag that surrounds the radio button or checkbox
         * @param  array       $surroundAttributes The attributes of the tag that surrounds the radio button or checkbox
         * @return string
         */
        public function checkbox (string $label, string $caseName, string $caseValue, array $caseAttributes = [], ?string $surround = null, array $surroundAttributes = []) : string
        {
            TextField::setCase($label, $caseName, "checkbox", $caseValue, $caseAttributes, $surround, $surroundAttributes);
            return TextField::getField();
        }



        /**
         * Set a select
         *
         * @param  string|null  $label              The label of the select
         * @param  string       $selectName         The name attribute of the select
         * @param  array        $selectAttributes   The attributes of the select
         * @param  array        $options            The options of the select
         * @param  integer|null $optionsSelected    The selected option of the select
         * @param  string|null  $surround           The tag that surrounds the select
         * @param  array        $surroundAttributes The attributes of the tag that surrounds the select
         * @return string
         */
        public function select (?string $label, string $selectName, array $selectAttributes = [], array $options = [], ?int $optionsSelected = null, ?string $surround = null, array $surroundAttributes = []) : string
        {
            TextField::setSelect($label, $selectName, $selectAttributes, $options, $optionsSelected, $surround, $surroundAttributes);
            return TextField::getField();
        }



        /**
         * Set a hidden field
         *
         * @param  string $hiddenName       The name attribute of the hidden field
         * @param  array  $hiddenAttributes The attributes of the hidden field
         * @return string
         */
        public function hidden (string $hiddenName, array $hiddenAttributes = []) : string
        {
            TextField::setHidden($hiddenName, $hiddenAttributes);
            return TextField::getField();
        }



        /**
         * set a file field
         *
         * @param  string|null $label              The label of the field
         * @param  string      $inputName          The name attribute of the field
         * @param  string|null $inputType          The type attribute of the field
         * @param  array       $inputAttributes    The attributes of the field
         * @param  string|null $surround           The tag that surrounds the field
         * @param  array       $surroundAttributes The attributes of the tag that surrounds the field
         * @return string
         */
        public function file (?string $label, string $inputName, array $inputAttributes = [], ?string $surround = null, array $surroundAttributes = []) : string
        {
            TextField::setInput($label, $inputName, "file", $inputAttributes, $surround, $surroundAttributes);
            return TextField::getField();
        }



        /**
         * Set a submit button
         *
         * @param  string       $label               The label of the button
         * @param  string       $buttonType          The button type (submit or reset)
         * @param  array        $buttonAttributes    The attributes of the button
         * @param  string|null  $surround            The tag that surrounds the select
         * @param  array        $surroundAttributes  The attributes of the tag that surrounds the select
         * @return string
         */
        public function submit (string $label, array $buttonAttributes = [], ?string $surround = null, array $surroundAttributes = []) : string
        {
            TextField::setButton($label, "submit", $buttonAttributes, $surround, $surroundAttributes);
            return TextField::getField();
        }



        /**
         * Set a reset button
         *
         * @param  string       $label               The label of the button
         * @param  string       $buttonType          The button type (submit or reset)
         * @param  array        $buttonAttributes    The attributes of the button
         * @param  string|null  $surround            The tag that surrounds the select
         * @param  array        $surroundAttributes The attributes of the tag that surrounds the select
         * @return string
         */
        public function reset (string $label, array $buttonAttributes = [], ?string $surround = null, array $surroundAttributes = []) : string
        {
            TextField::setButton($label, "reset", $buttonAttributes, $surround, $surroundAttributes);
            return TextField::getField();
        }
    }