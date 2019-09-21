<?php

    namespace App\Form\Builder;

    use App\Form\Builder\Form\Form;
    use App\Form\Builder\Form\Inputs;


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
         * @param  string      $label              The label of the field
         * @param  string      $inputName          The name attribute of the field
         * @param  string|null $inputType          The type attribute of the field
         * @param  array       $inputAttributes    The attributes of the field
         * @param  string|null $surround           The tag that surrounds the field
         * @param  array       $surroundAttributes The attributes of the tag that surrounds the field
         * @return string
         */
        public function input (string $label, string $inputName, ?string $inputType, array $inputAttributes = [], ?string $surround = null, array $surroundAttributes = []) : string
        {
            Inputs::setInput($label, $inputName, $inputType, $inputAttributes, $surround, $surroundAttributes);
            return Inputs::getInput();
        }
    }