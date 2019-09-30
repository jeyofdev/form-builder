<?php

    namespace App\Form\Builder\Type;


    class SubmitType extends ButtonType
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