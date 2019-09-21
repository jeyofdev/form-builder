<?php

    namespace App\Form\Builder;


    use App\Form\Builder\Form\Form;
    use App\Form\Builder\Form\TextField;


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
    }