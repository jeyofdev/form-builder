<?php

    namespace App\Form\Builder\Form_complex\Type;


    class FormType extends AbstractType
    {
        /**
         * {@inheritdoc}
         */
        public function setTag() : string
        {
            return "form";
        }



        /**
         * {@inheritdoc}
         */
        public function configureOptions () : array
        {
            $this->allowedOptions = $this
                ->setAllowedOptions("class", "id", "accept-charset", "action", "autocomplete", "enctype", "method", "name", "novalidate", "target")
                ->getAllowedOptions();

            $this->allowedOptionsBool = $this
                ->setAllowedOptionsBool("novalidate")
                ->getAllowedOptionsBool();

            $this->defaultOptions = $this
                ->setDefaults([
                    "action" => null,
                    "method" => "post"
                ])
                ->getDefaults();

            return $this->defaultOptions;
        }
    }

