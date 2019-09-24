<?php

    namespace App\Form\Builder\Form_complex\Type;


    use App\Form\Builder\Form_complex\FormTypeInterface;
    use App\Form\Builder\Form_complex\Helpers\ArrayHelpers;


    abstract class AbstractType implements FormTypeInterface
    {
        /**
         * The Field Attributes allowed with Boolean Values
         */
        const ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED = [
            "autofocus", "disabled", "readonly", "required", "checked", "multiple"
        ];



        /**
         * {@inheritdoc}
         */
        public function setAttributeType(string $type) : ?string
        {
            $lastBackslashPos = strrpos($type, "\\");

            $type = substr($type, 0, -4);
            $type = substr($type, $lastBackslashPos + 1);

            if ($type === "Textarea") {
                return null;
            }

            return strtolower($type);
        }


        /**
         * {@inheritdoc}
         */
        public function setAttributes (array $attributes = []) : ?string
        {
            if (!empty($attributes)) {
                $attr = [];
                foreach ($attributes as $k => $v) {
                    if ($k != "label") {
                        if (in_array($k, self::ATTRIBUTES_FIELD_WITH_BOOLEAN_VALUES_ALLOWED)) {
                            if ($v === true) {
                                $attr[] = $k;
                            }
                        } else {
                            $attr[] = $k . '="' . $v . '"';
                        }
                    }
                }

                return implode(" ", $attr);
            }

            return (isset($attr)) ? implode(" ", $attr) : null;
        }



        /**
         * {@inheritdoc}
         */
        public function setTag ()
        {
            
        }



        /**
         * {@inheritdoc}
         */
        public function setLabel (?string $label = null, array $attributes = []) : ?string
        {
            $attr = ArrayHelpers::listAttributes($attributes);

            if (!is_null($label)) {
                $label = '<label ' . $attr . '>' . $label . ' :</label>';
            }
            return $label;
        }



        /**
         * {@inheritdoc}
         */
        public function setTagOptions (array $selectOptions = []) : ?string
        {
            if (!empty($selectOptions)) {
                $options = [];

                foreach ($selectOptions as $k => $v) {
                    $options[] = '<option value="' . $k . '">' . $v . '</option>';
                }

                return implode(" ", $options);
            } 
            
            return null;
        }



        /**
         * {@inheritdoc}
         */
        public function setType (string $type) : ?string
        {
            if (!is_null($this->setAttributeType($type))) {
                return 'type="' . $this->setAttributeType($type) . '"';
            }
            return null;
        }
    }

