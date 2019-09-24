<?php
    namespace App\Form\Builder\Form_complex;


    class FormBuilder
    {
    private $datas;



    public function __construct ($datas)
    {
        $this->datas = $datas;
    }



    public function createFormBuilder (array $options = []) : string
    {
        $attr = [];
        foreach ($options as $k => $v) {
            $v = ($k === "action") ? "$v.php" : $v;
            $attr[] = $k . '=' . $v;
        }

        $attr = implode(" ", $attr);

        $form = "<form $attr>";
        $form .= "</form>";

        return $form;
    }



    public function add (string $name, string $classType, array $attributes = []) : string
    {
        $lastBackslashPos = strrpos($classType, "\\");
        $class = substr($classType, ($lastBackslashPos + 1));

        $class = new $classType();
        $type = $class->getAttrType();
        $attr = $class->getAttributes($attributes);


        return '<input type="' . $type . '" name="' . $name . '"' . $attr . '>';
    }
}