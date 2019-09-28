<?php

    namespace App\Form\Builder\Form_complex\Type;


    class ButtonType extends AbstractType
    {
        /**
         * {@inheritdoc}
         */
        public function setTag () : string
        {
            return "button";
        }



        /**
         * {@inheritdoc}
         */
        public function configureOptions () : array
        {
            $this->allowedOptions = $this
                ->setAllowedOptions(
                    "class", "id", "autofocus", "disabled", "form", "formaction", "formenctype",
                    "formmethod", "formnovalidate", "formtarget", "name", "value"
                )
                ->getAllowedOptions();

            $this->allowedOptionsBool = $this
                ->setAllowedOptionsBool("autofocus", "disabled")
                ->getAllowedOptionsBool();

            $this->defaultOptions = $this
                ->setDefaults([
                    "class" => "btn"
                ])
                ->getDefaults();

            return $this->defaultOptions;
        }



        /**
         * Add attributes to those already present
         *
         * @param  string ...$attributes
         * @return void
         */
        public function AddOptions (string ...$attributes) : void
        {
            $parentOption = parent:: getAllowedOptions();
            $options = $this
            ->setAllowedOptions($attributes)
            ->getAllowedOptions();
            $this->allowedOptions = array_merge($parentOption, $options[0]);
        }



        /**
         * Add attributes with a Boolean value to those already present
         *
         * @param string ...$attributes
         * @return void
         */
        public function AddOptionsBool (...$attributes) : void
        {
            $parentOptionBool = parent:: getAllowedOptionsBool();
            $optionsBool = $this
                ->setAllowedOptionsBool($attributes)
                ->getAllowedOptionsBool();
            $this->allowedOptionsBool = array_merge($parentOptionBool, $optionsBool[0]);
        }
    }

