<?php

    namespace App\Form\Builder;

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
        public function FormStart (?string $action = null, ?string $method = null) : string
        {
            Form::setFormStart($action, $method);
            return Form::getFormStart();
        }



        /**
         * Set the end tag of a form
         *
         * @return string
         */
        public function FormEnd () : string
        {
            return Form::getFormEnd();
        }
    }