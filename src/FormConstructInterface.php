<?php

    namespace App\Form\Builder;


    interface FormConstructInterface
    {
        /**
         * Surround one or more fields of an HTML element
         *
         * @return string|null
         */
        public function row (string $surround, array $attributes = [], ...$fields);



        /**
         * Get the differents parts of the form
         *
         * @return array
         */
        public function getView ();



        /**
         * Set the differents parts of the form
         *
         * @return self
         */
        public function setView ();



        /**
         * Get the opening tag of the form
         *
         * @return string
         */
        public function getFormStart();



        /**
         * Set the opening tag of the form
         *
         * @return self
         */
        public function setFormStart();



        /**
         * Get the fields of the form
         *
         * @return array
         */
        public function getFormFields();



        /**
         * Set the fields of the form
         *
         * @return self
         */
        public function setFormFields();



        /**
         * Get the form buttons
         *
         * @return string
         */
        public function getFormButtons();



        /**
         * Set the form buttons
         *
         * @return self
         */
        public function setFormButtons();



        /**
         * Get the closing tag of the form
         *
         * @return string
         */
        public function getFormEnd();



        /**
         * Get the closing tag of the form
         *
         * @return self
         */
        public function setFormEnd();
    }