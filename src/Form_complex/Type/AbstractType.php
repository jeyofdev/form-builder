<?php

    namespace App\Form\Builder\Form_complex\Type;

    use App\Form\Builder\Form_complex\FormOptionInterface;
    use App\Form\Builder\Form_complex\FormTypeInterface;
    use App\Form\Builder\Form_complex\Helpers\ArrayHelpers;


    abstract class AbstractType implements FormTypeInterface, FormOptionInterface
    {
        /**
         * The type attribute for form fields
         *
         * @var string
         */
        private $type;



        /**
         * The default attributes for form fields
         *
         * @var array
         */
        protected $defaultOptions;



        /**
         * The allowed attributes for each form field
         *
         * @var array
         */
        protected $allowedOptions;



        /**
         * The attributes with a Boolean value allowed for each form field
         *
         * @var array
         */
        protected $allowedOptionsBool;



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
                        if (in_array($k, $this->getAllowedOptionsBool())) {
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
        public function getType () : ?string
        {
            return $this->type;
        }



        /**
         * {@inheritdoc}
         */
        public function setType (string $type) : self
        {
            if (!is_null($this->setAttributeType($type))) {
                $this->type = 'type="' . $this->setAttributeType($type) . '"';
            }

            return $this;
        }



        /**
         * {@inheritdoc}
         */
        public function configureOptions() : array
        {
            return [];
        }



        /**
         * Set the defaults attributes for each element of the form
         * 
         * @return array
         */
        public function getDefaults () : array
        {
            return $this->defaultOptions;
        }



        /**
         * {@inheritdoc}
         */
        public function setDefaults (array $options = []) : self
        {
            $this->defaultOptions = $options;
            return $this;
        }



        /**
         * Set the allowed attributes for a form element
         * 
         * @return array|null
         */
        public function getAllowedOptions () : ?array
        {
            return $this->allowedOptions;
        }



        /**
         * {@inheritdoc}
         */
        public function setAllowedOptions (...$options) : self
        {
            $this->allowedOptions = $options;
            return $this;
        }



        /**
         * Set the allowed attributes for a form element that has a boolean value
         * 
         * @return array
         */
        public function getAllowedOptionsBool () : ?array
        {
            return $this->allowedOptionsBool;
        }



        /**
         * {@inheritdoc}
         */
        public function setAllowedOptionsBool (...$options) : self
        {
            $this->allowedOptionsBool = $options;
            return $this;
        }
    }