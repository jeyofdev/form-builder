<?php

    namespace App\Form\Builder\Form_complex\Type;


    class PasswordType extends InputType
    {
        /**
         * {@inheritdoc}
         */
        public function configureOptions () : array
        {
            parent::configureOptions();

            $this->addOptions("maxlength", "minlength", "pattern", "placeholder", "required", "size");
            $this->addOptionsBool("required");

            $this->defaultOptions = $this
                ->setDefaults([
                    "required" => false
                ])
                ->getDefaults();

            return $this->defaultOptions;
        }
    }

