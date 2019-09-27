<?php

    namespace App\Form\Builder\Form_complex\Type;


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
                    "class", "id", "autocomplete", "autofocus", "cols", "disable", "form", 
                    "label", "label_attr", "maxlength", "minlength", "name", "placeholder", "readonly", "required", 
                    "rows", "spellcheck", "wrap"
                )
                ->getAllowedOptions();

            $this->allowedOptionsBool = $this
                ->setAllowedOptionsBool("autofocus", "disable", "readonly", "required", "spellcheck")
                ->getAllowedOptionsBool();

            $this->defaultOptions = $this
                ->setDefaults([
                    "required" => false
                ])
                ->getDefaults();

            return $this->defaultOptions;
        }
    }

