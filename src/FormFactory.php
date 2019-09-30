<?php
    
    namespace App\Form\Builder;


    use App\Form\Builder\Options\FormOption;
    use App\Form\Builder\Type\FormType;


    class FormFactory implements FormInterfaceFactory
    {
        /**
         * {@inheritDoc}
         */
        public static function createFormType () : FormType
        {
            return new FormType();
        }



        /**
         * {@inheritDoc}
         */
        public static function createFormOption () : FormOption
        {
            return new FormOption();
        }
    }