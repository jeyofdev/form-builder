<?php

    namespace App\Form\Builder\Type;


    class HiddenType extends InputType
    {
        /**
         * {@inheritdoc}
         */
        public function configureOptions () : array
        {
            parent::configureOptions();
            return $this->defaultOptions;
        }
    }