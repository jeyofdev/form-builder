<?php

    namespace App\Form\Builder\Form_complex;


    interface FormOptionInterface
    {
        /**
         * Initialize the attributes on the html elements of the form
         *
         * @return array
         */
        public function configureOptions();



        /**
         * Set the defaults attributes for each element of the form
         *
         * @return self
         */
        public function setDefaults (array $options = []);



        /**
         * Set the allowed attributes for a form element
         *
         * @return self
         */
        public function setAllowedOptions (...$options);



        /**
         * Set the allowed attributes for a form element that has a boolean value
         *
         * @return self
         */
        public function setAllowedOptionsBool (...$options);


        // public function setMethodName (string $name);


        //les options pour chaques champs de formulaire
    }