<?php

    namespace App\Form\Builder\Type;


    class ResetType extends ButtonType
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