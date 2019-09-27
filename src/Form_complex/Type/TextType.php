<?php

    namespace App\Form\Builder\Form_complex\Type;


    class TextType extends InputType
    {
        /**
         * {@inheritdoc}
         */
        public function configureOptions () : array
        {
            parent::configureOptions();

            $this->addOptions(
                "maxlength", "minlength", "pattern", "placeholder", "required", 
                "readonly", "size", "spellcheck"
            );
            $this->addOptionsBool("required", "spellcheck");

            $this->defaultOptions = $this
                ->setDefaults([
                    "required" => false,
                    "readonly" => true
                ])
                ->getDefaults();

            return $this->defaultOptions;
        }
    }