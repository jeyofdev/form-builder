<?php

    namespace App\Form\Builder\Form_complex;


    interface FormFieldOptionInterface
    {
        /**
         * Set the action attribute on the form tag
         *
         * @return string|null
         */
        public function setAction (string $key, string $value);



        /**
         * Set a booleen attribute
         *
         * @return string|null
         */
        public function setAttrBool (string $key, array $attributes = []);



        /**
         * Set the checked attribute on a checkbox or radio button
         *
         * @return string|null
         */
        public function setChecked (string $fieldsValue, string $key, array $datas = [], array $attributes = [], array $mergeAttributes = []);



        /**
         * Set the selected attribute on an option in a select field
         *
         * @return string|null
         */
        public function setSelected (string $keyOption, string $key, array $datas = []);



        /**
         * Get the value of a form field
         *
         * @return string|null
         */
        public function getValue (array $datas = [], string $name);
    }