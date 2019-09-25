<?php
    
    namespace App\Form\Builder\Form_complex;


    use App\Form\Builder\Form_complex\Options\FormOption;
    use App\Form\Builder\Form_complex\Type\FormType;


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