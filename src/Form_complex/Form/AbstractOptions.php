<?php

    namespace App\Form\Builder\Form_complex\Form;


    use App\Form\Builder\Form_complex\FormFieldOptionInterface;


    class AbstractOptions implements FormFieldOptionInterface
    {
        /**
         * {@inheritDoc}
         */
        public function setChecked (string $fieldsValue, string $key, array $datas = [], array $attributes = [], array $mergeAttributes = []) : ?string
        {
            $checked = null;

            if (!empty($this->datas)) {
                if (isset($fieldsValue)) {
                    if (array_key_exists($key, $datas)) {
                        if ($datas[$key] === $fieldsValue) {
                            $checked = " checked";
                            return $checked;
                        }
                    }
                }
            } else {
                if (isset($attributes["checked"]) && $attributes["checked"] === true) {
                    $checked = " checked";
                    return $checked;
                }
            }

            return $checked;
        }



        /**
         * {@inheritDoc}
         */
        public function setSelected (string $keyOption, string $key, array $datas = []) : ?string
        {
            $selected = null;
            $selected = (isset($datas[$key]) && $datas[$key] === $keyOption) ? " selected" : null;

            return $selected;
        }



        /**
         * {@inheritDoc}
         */
        public function getValue (array $datas = [], string $name)
        {
            if (isset($datas[$name])) {
                $value = !empty($datas) ? $datas[$name] : null;
                return $value;
            }
        }
    }