<?php

    namespace App\Form\Builder\Form_complex\Form;


    use App\Form\Builder\Form_complex\Exception\RuntimeException;
    use App\Form\Builder\Form_complex\FormBuilderInterface;
    use App\Form\Builder\Form_complex\FormFactory;
    use App\Form\Builder\Form_complex\Helpers\ArrayHelpers;
    use App\Form\Builder\Form_complex\Helpers\FormHelpers;
    use App\Form\Builder\Form_complex\Type\FormType;
    use App\Form\Builder\Form_complex\Type\SubmitType;
    use App\Form\Builder\Form_complex\Type\ResetType;


    abstract class AbstractForm extends AbstractOptions implements FormBuilderInterface
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
         * The forms buttons
         *
         * @var array
         */
        protected $buttons = [];



        /**
         * The data sent to the form
         *
         * @var array
         */
        protected $datas = [];



        /**
         * {@inheritdoc}
         */
        public function generateForm (array $datas = [])
        {
            $this->datas = $datas;
        }



        /**
         * {@inheritdoc}
         */
        public function buildForm(FormType $formType, array $formAttributes = []) : string
        {
            $mergeAttributes = $this->mergeDefaultsAttributesWithFieldAttributes($formType, $formAttributes);

            $novalidate = $this->setAttrBool("novalidate", $mergeAttributes);
            $mergeAttributes = $this->unsetAttr($formType->getAllowedOptionsBool(), $mergeAttributes);

            $attr = $this->setFormAttributes($formType, $mergeAttributes);
            $attr .= $novalidate;

            return $this->addForm(FormFactory::createFormType(), $attr);
        }



        /**
         * {@inheritdoc}
         */
        public function addForm (FormType $formType, string $attributes) : string
        {
            $tag = $formType->setTag();

            $form = '<' . $tag . $attributes . '>';
            $form .= implode(" ", $this->fields);
            $form .= implode(" ", $this->buttons);
            $form .= '</' . $tag . '>';

            return $form;
        }



        /**
         * {@inheritdoc}
         */
        public function add (string $name, string $type, array $attributes = [], ?string $surround = null, array $surroundAttributes = [], $selectOptions = []) : self
        {
            $class = new $type();

            $mergeAttributes = $this->mergeDefaultsAttributesWithFieldAttributes($class, $attributes);
            if (array_key_exists("checked", $mergeAttributes)) {
                unset($mergeAttributes["checked"]);
            }

            $label = '';
            if (array_key_exists("label", $mergeAttributes)) {
                $labelValue = $mergeAttributes["label"];

                if (array_key_exists("label_attr", $mergeAttributes)) {
                    if (!empty($mergeAttributes["label_attr"])) {
                        $label = $class->setLabel($labelValue, $mergeAttributes["label_attr"]);
                    } else {
                        throw new RuntimeException("The label_attr array is empty");
                    }
                } else {
                    throw new RuntimeException("The label_attr is not defined");
                }
            }

            $tag = $class->setTag();
            $type = $class->setType($type)->getType();
            $options = $class->setTagOptions($name, $selectOptions, $this->datas);

            $checked = null;
            $typeValue = substr($type, 6, -1);

            if (in_array($typeValue, ["radio", "checkbox"])) {
                $checked = $this->setChecked($mergeAttributes["value"], $name, $this->datas, $attributes, $mergeAttributes);
            }

            $value = null;
            if (!in_array($type, ["radio", "checkbox", "hidden"])) {
                unset($mergeAttributes["value"]);
                $value = isset($attributes["value"]) ? $attributes["value"] : null;
            }

            $autofocus = $this->setAttrBool("autofocus", $mergeAttributes);
            $disabled = $this->setAttrBool("disabled", $mergeAttributes);
            $required = $this->setAttrBool("required", $mergeAttributes);
            $spellcheck = $this->setAttrBool("spellcheck", $mergeAttributes);
            $readonly = $this->setAttrBool("readonly", $mergeAttributes);
            $multiple = $this->setAttrBool("multiple", $mergeAttributes);

            $mergeAttributes = $this->unsetAttr($class->getAllowedOptionsBool(), $mergeAttributes);

            $attr = $class->setAttributes($mergeAttributes);
            $attr .= $autofocus . $disabled . $multiple . $readonly . $required . $spellcheck;

            $fields = $this->generateFormElement($label, $tag, $type, $name, $attr, $checked, $value, $options);
            $surroundField = $this->surround($fields, $surround, $surroundAttributes);
            $this->fields[] = $surroundField;

            return $this;
        }



        /**
         * {@inheritdoc}
         */
        public function submit (string $label, array $attributes = [], ?string $surround = null, array $surroundAttributes = []) : self
        {
            $submit = new SubmitType();
            $this->buttons["submit"] = $this->addButton($submit, $label, $attributes, $surround, $surroundAttributes);

            return $this;
        }



        /**
         * {@inheritdoc}
         */
        public function reset (string $label, array $attributes = [], ?string $surround = null, array $surroundAttributes = []) : self
        {
            $reset = new ResetType();
            $this->buttons["reset"] = $this->addButton($reset, $label, $attributes, $surround, $surroundAttributes);

            return $this;
        }



        /**
         * Set the attributes of the form tag
         *
         * @param FormType $formType
         * @return string|null
         */
        private function setFormAttributes (FormType $formType, array $attributes) : ?string
        {
            $attr = [];
            foreach ($attributes as $k => $v) {
                if (in_array($k, $formType->getAllowedOptions())) {
                    if (!is_null($v) && $v !== "#") {
                        $this->setAction($k, $v);
                        $attr[] = $k . '=' . $v;
                    } else if ($v === "#") {
                        $attr[] = $k . '=' . $v;
                    }
                } else {
                    throw new RuntimeException("The attribute '$k' is not allowed");
                }
            }

            $attr = ' ' . implode(" ", $attr);

            return $attr;
        }



        /**
         * Delete the indexes from the array of attributes whose value is a booleen
         *
         * @return array
         */
        private function unsetAttr (array $optionsBool, array $attributes) : array
        {
            foreach ($optionsBool as $k => $v) {
                if (array_key_exists($v, $attributes)) {
                    unset($attributes[$v]);
                }
            }

            return $attributes;
        }



        /**
         * Generate the form field tags
         *
         * @return string
         */
        private function generateFormElement (?string $label, string $tag, ?string $type, string $name, ?string $attributes, $checked, $value, $selectOptions) : string
        {
            $typeValue = substr($type, 6, -1);
            $fields = ($typeValue !== "radio" && $typeValue !== "checkbox") ? $label : null;

            if ($tag !== "textarea") {
                $value = ($value !== null) ? ' value="' . $value . '"' : null;
            }

            if ($tag === "input") {
                $fields .= '<' . $tag . ' ' . $type . ' name="' . $name . '"' . $attributes . $checked . $value . '>';
            } else if ($tag === "textarea") {
                $fields .= '<' . $tag . ' name="' . $name . '"' . $attributes . '>' . $value . '</' . $tag . '>';
            } else if ($tag === "select") {
                $fields .= '<' . $tag . ' name="' . $name . '"' . $attributes . '>';
                $fields .= $selectOptions;
                $fields .= '</' . $tag . '>';
            }

            if ($typeValue === "radio" || $typeValue === "checkbox") {
                $fields .= $label;
            }
            
            return $fields;
        }



        /**
         * add a button to the form
         *
         * @param SubmitType|ResetType $class
         * @return string
         */
        private function addButton ($classType, string $label, array $attributes = [], ?string $surround = null, array $surroundAttributes = []) : string
        {
            $attributes = $this->mergeDefaultsAttributesWithFieldAttributes($classType, $attributes);

            $attr = $classType->setAttributes($attributes);
            $tag = $classType->setTag();
            $type = $classType->setType(get_class($classType))->getType();

            $button = $this->generateFormButton($label, $tag, $type, $attr,);

            $surroundButton = $this->surround($button, $surround, $surroundAttributes);

            return $surroundButton;
        }



        /**
         * generate a form button
         *
         * @return string
         */
        private function generateFormButton (?string $label, string $tag, ?string $type, ?string $attributes) : string
        {
            if ($tag === "button") {
                $button = '<' . $tag . ' ' . $type . ' ' . $attributes . '>' . $label . '</button>';
            }

            return $button;
        }



        /**
         * Surround a form field with HTML tags
         *
         * @return string
         */
        private function surround (string $field, ?string $surround = null, array $attributes = []) : string
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



        /**
         * Merge the default attributes with the attributes of the form field
         *
         * @return array
         */
        private function mergeDefaultsAttributesWithFieldAttributes ($classType, array $attributes = []) : array
        {
            $attrDefaults = $classType->configureOptions();

            FormHelpers::checkOptionIsAllowed($attributes, $classType);
            FormHelpers::checkOptionIsAllowed($attrDefaults, $classType);

            return array_merge($attrDefaults, $attributes);
        }
    }