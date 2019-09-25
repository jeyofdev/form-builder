<?php

    namespace App\Form\Builder\Form_complex;


    use App\Form\Builder\Form_complex\Type\FormType;


    interface FormBuilderInterface
    {
        /**
         * Generate the form
         *
         * @return string
         */
        public function generateForm ();



        /**
         * Build the form
         *
         * @return string
         */
        public function buildForm(FormType $formType, array $fields = [], array $formAttributes = []);



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
        public function add (string $name, string $type, array $attributes = [], array $attributesLabel = [], ?string $surround = null, array $surroundAttributes = [], $selectOptions = []);



        /**
         * Generate the form field tags
         *
         * @return string
         */
        public function generateFormElement (?string $label, string $tag, ?string $type, string $name, ?string $attributes, $selectOptions);



        /**
         * Surround a form field with HTML tags
         *
         * @return string
         */
        public function surround (string $field, ?string $surround = null, array $attributes = []);
    }