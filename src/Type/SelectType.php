<?php

    namespace App\Form\Builder\Type;


    class SelectType extends AbstractType
    {
        /**
         * {@inheritdoc}
         */
        public function setTag()
        {
            return "select";
        }



        /**
         * {@inheritdoc}
         */
        public function configureOptions () : array
        {
            $this->allowedOptions = $this
                ->setAllowedOptions(
                    "class", "id", "autocomplete", "autofocus", "disabled", "form", 
                    "label", "label_attr", "multiple", "name", "required", "size"
                )
                ->getAllowedOptions();

            $this->allowedOptionsBool = $this
                ->setAllowedOptionsBool("autofocus", "disabled", "multiple", "required")
                ->getAllowedOptionsBool();

            $this->defaultOptions = $this
                ->setDefaults([
                    "multiple" => false
                ])
                ->getDefaults();

            return $this->defaultOptions;
        }
    }

