<?php

    namespace App\Form\Builder;


    interface FormTypeInterface
    {
        /**
         * Set the type attribute of a form field
         *
         * @return string|null
         */
        public function setAttributeType(string $type);



        /**
         * Set the attributes of the form field to add
         * 
         * @return string|null
         */
        public function setAttributes (array $attributes = []);



        /**
         * Set the tag of the form field to be added
         *
         * @return void
         */
        public function setTag ();



        /**
         * Set the label tag of the form field to add
         *
         * @return string|null
         */
        public function setLabel (?string $label = null, array $attributes = []);



        /**
         * Set the options tags for a select field
         *
         * @return string|null
         */
        public function setTagOptions (string $name, array $selectOptions = [], array $datas = []);



        /**
         * get the type attribute of the form field to add
         *
         * @return string|null
         */
        public function getType ();



        /**
         * Set the type attribute of the form field to add
         *
         * @return self
         */
        public function setType (string $type);
    }

