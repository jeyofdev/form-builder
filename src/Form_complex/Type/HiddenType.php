<?php

    namespace App\Form\Builder\Form_complex\Type;


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