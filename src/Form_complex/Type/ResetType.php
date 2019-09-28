<?php

    namespace App\Form\Builder\Form_complex\Type;


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