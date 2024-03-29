<?php

    namespace App\Form\Builder\Type;


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
                    "checked" => false
                ])
                ->getDefaults();

            return $this->defaultOptions;
        }
    }