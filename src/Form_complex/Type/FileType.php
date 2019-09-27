<?php

    namespace App\Form\Builder\Form_complex\Type;


    class FileType extends InputType
    {
        /**
         * {@inheritdoc}
         */
        public function configureOptions () : array
        {
            parent::configureOptions();

            $this->addOptions("accept", "capture", "files", "multiple", "required");
            $this->addOptionsBool("multiple", "required");

            $this->defaultOptions = $this
                ->setDefaults([
                    "required" => false,
                    "multiple" => false
                ])
                ->getDefaults();

            return $this->defaultOptions;
        }
    }
