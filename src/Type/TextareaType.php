<?php

    namespace App\Form\Builder\Type;


    class TextareaType extends AbstractType
    {
        /**
         * {@inheritdoc}
         */
        public function setTag()
        {
            return "textarea";
        }



        /**
         * {@inheritdoc}
         */
        public function configureOptions () : array
        {
            $this->allowedOptions = $this
                ->setAllowedOptions(
                    "class", "id", "autocomplete", "autofocus", "cols", "disabled", "form", 
                    "label", "label_attr", "maxlength", "minlength", "name", "placeholder", "readonly", "required", 
                    "rows", "spellcheck", "value", "wrap"
                )
                ->getAllowedOptions();

            $this->allowedOptionsBool = $this
                ->setAllowedOptionsBool("autofocus", "disabled", "readonly", "required", "spellcheck")
                ->getAllowedOptionsBool();

            $this->defaultOptions = $this
                ->setDefaults([
                    "required" => false
                ])
                ->getDefaults();

            return $this->defaultOptions;
        }
    }

