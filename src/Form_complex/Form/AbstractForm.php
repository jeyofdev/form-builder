<?php

    namespace App\Form\Builder\Form_complex\Form;

    use App\Form\Builder\Form_complex\Exception\RuntimeException;
    use App\Form\Builder\Form_complex\FormBuilderInterface;
    use App\Form\Builder\Form_complex\FormFactory;
    use App\Form\Builder\Form_complex\Helpers\ArrayHelpers;
    use App\Form\Builder\Form_complex\Type\FormType;


    abstract class AbstractForm implements FormBuilderInterface
    {
        /**
         * The generated form
         *
         * @var string
         */
        protected $form;



        /**
         * The forms fields
         *
         * @var array
         */
        protected $fields = [];



        /**
         * {@inheritdoc}
         */
        public function generateForm ()
        {
        }



        /**
         * {@inheritdoc}
         */
        public function buildForm(FormType $formType, array $fields = [], array $formAttributes = []) : string
        {
            $defaultAttributes = $formType->configureOptions();
            $formAttributes = array_merge($defaultAttributes, $formAttributes);

            $attr = [];
            foreach ($formAttributes as $k => $v) {
                if (in_array($k, $formType->getAllowedOptions())) {
                    if (!in_array($k, $formType->getAllowedOptionsBool())) {
                        if (!is_null($v) && $v !== "#") {
                            if ($k === "action") {
                                $v = "$v.php";
                            }
                            $attr[] = $k . '=' . $v;
                        } else if ($v === "#") {
                            $attr[] = $k . '=' . $v;
                        }
                    } else {
                        if ($v === true) {
                            $attr[] = $k;
                        }
                    }
                } else {
                    throw new RuntimeException("The attribute '$k' is not allowed");
                }
            }

            $attr = ' ' . implode(" ", $attr);

            $form = $this->addForm(FormFactory::createFormType(), $attr);

            return $form;
        }



        /**
         * {@inheritdoc}
         */
        public function addForm (FormType $formType, string $attributes) : string
        {
            $tag = $formType->setTag();

            $form = '<' . $tag . $attributes . '>';
            $form .= implode(" ", $this->fields);
            $form .= '</' . $tag . '>';

            return $form;
        }



        /**
         * {@inheritdoc}
         */
        public function add (string $name, string $type, array $attributes = [], array $attributesLabel = [], ?string $surround = null, array $surroundAttributes = [], $selectOptions = []) : self
        {
            $class = new $type();

            $attrDefaults = $class->configureOptions();
            $attributes = array_merge($attrDefaults, $attributes);

            $labelValue = ArrayHelpers::checkKeyExistsAndGetValue("label", $attributes);
            $label = $class->setLabel($labelValue, $attributesLabel);

            $tag = $class->setTag();
            $type = $class->setType($type)->getType();
            $attr = $class->setAttributes($attributes);
            $options = $class->setTagOptions($selectOptions);

            $fields = $this->generateFormElement($label, $tag, $type, $name, $attr, $options);
            $surroundField = $this->surround($fields, $surround, $surroundAttributes);
            $this->fields[] = $surroundField;

            return $this;
        }



        /**
         * {@inheritdoc}
         */
        public function generateFormElement (?string $label, string $tag, ?string $type, string $name, ?string $attributes, $selectOptions) : string
        {
            $typeValue = substr($type, 6, -1);
            $fields = ($typeValue !== "radio" && $typeValue !== "checkbox") ? $label : null;

            if ($tag === "input") {
                $fields .= '<' . $tag . ' ' . $type . ' name="' . $name . '"' . $attributes . '>';
            } else if ($tag === "textarea") {
                $fields .= '<' . $tag . ' name="' . $name . '"' . $attributes . '></' . $tag . '>';
            } else if ($tag === "select") {
                $fields = '<' . $tag . ' name="' . $name . '"' . $attributes . '>';
                $fields .= $selectOptions;
                $fields .= '</' . $tag . '>';
            }

            if ($typeValue === "radio" || $typeValue === "checkbox") {
                $fields .= $label;
            }
            
            return $fields;
        }



        /**
         * {@inheritdoc}
         */
        public function surround (string $field, ?string $surround = null, array $attributes = []) : string
        {
            $attr = null;

            if($surround != null){
                if (!empty($attributes)) {
                    $attr = ArrayHelpers::listAttributes($attributes);
                }

                $surroundField = '<' . $surround . ' ' . $attr . '>';
                $surroundField .= $field;
                $surroundField .= '</' . $surround . '>';
            } else{
                $surroundField = $field;
            }

            return $surroundField;
        }
    }