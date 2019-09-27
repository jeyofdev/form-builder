<?php

    namespace App\Form\Builder\Form_complex\Type;


    class CheckboxType extends InputType
    {
        /**
         * {@inheritdoc}
         */
        public function configureOptions () : array
        {
            parent::configureOptions();

            $this->addOptions("checked");
            $this->addOptionsBool("checked");

            $this->defaultOptions = $this
                ->setDefaults([
                    "checked" => false,
                    "readonly" => true
                ])
                ->getDefaults();

            return $this->defaultOptions;
        }
    }