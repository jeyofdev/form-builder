<?php

    namespace App\Form\Builder;


    use App\Form\Builder\Type\FormType;


    interface FormBuilderInterface
    {
        /**
         * Generate the form
         *
         * @return string
         */
        public function generateForm (array $datas = []);



        /**
         * Build the form
         *
         * @return string
         */
        public function buildForm(FormType $formType, array $formAttributes = []);



        /**
         * Add a form tag
         *
         * @return void
         */
        public function addForm (FormType $formType, string $attributes);



        /**
         * Add a form field
         * 
         * @return self
         */
        public function add (string $name, string $type, array $attributes = [], ?string $surround = null, array $surroundAttributes = [], $selectOptions = []);



        /**
         * Add a submit button to the form
         *
         * @return self
         */
        public function submit (string $label, array $attributes = [], ?string $surround = null, array $surroundAttributes = []);



        /**
         * Add a reset button to the form
         *
         * @return self
         */
        public function reset (string $label, array $attributes = [], ?string $surround = null, array $surroundAttributes = []);
    }