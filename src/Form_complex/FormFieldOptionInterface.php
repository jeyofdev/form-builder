<?php

    namespace App\Form\Builder\Form_complex;


    interface FormFieldOptionInterface
    {
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