<?php
class PartRequest
{
    private $request = "SELECT id_part, name, brand, model, year, price FROM parts";
    private function checkInput($input)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $input, $matches, PREG_SET_ORDER, 0);
        
        return boolval($matches);
    }
    private function checkAllInput($brand, $name, $year, $model, $id_part)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $brand, $matches1, PREG_SET_ORDER, 0);
        preg_match_all($re, $name, $matches2, PREG_SET_ORDER, 0);
        preg_match_all($re, $year, $matches3, PREG_SET_ORDER, 0);
        preg_match_all($re, $model, $matches4, PREG_SET_ORDER, 0);
        preg_match_all($re, $id_part, $matches5, PREG_SET_ORDER, 0);
        
        return (boolval($matches1) or boolval($matches2) or boolval($matches3) or boolval($matches4) or boolval($matches5));
    }
    private function addCondition($request, $condition, $and)
    {
        if ($and)
        {
            $this->request = $request . ' AND ' . $condition;
        }
        else
        {
            $this->request = $request . ' ' . $condition;
        }
    }
    private function transform($string)
    {
        $string = '%' . $string . '%';
        return $string;
    }
    public function __construct($brand, $name, $year, $model, $id_part)
    {
        if ($this->checkAllInput($brand, $name, $year, $model, $id_part))
        {
            $and = false;
            $this->request = $this->request . " WHERE";
            if ($this->checkInput($brand))
            {
                $brand = $this->transform($brand);
                $this->addCondition($this->request, "parts.brand LIKE '$brand'", $and);
                $and = true;
            }
            if ($this->checkInput($name))
            {
                $name = $this->transform($name);
                $this->addCondition($this->request, "parts.name LIKE '$name'", $and);
                $and = true;
            }
            if ($this->checkInput($year))
            {
                $year = $this->transform($year);
                $this->addCondition($this->request, "parts.year LIKE '$year'", $and);
                $and = true;
            }
            if ($this->checkInput($model))
            {
                $model = $this->transform($model);
                $this->addCondition($this->request, "parts.model LIKE '$model'", $and);
                $and = true;
            }
            if ($this->checkInput($id_part))
            {
                $id_part = $this->transform($id_part);
                $this->addCondition($this->request, "parts.id_part LIKE '$id_part'", $and);
                $and = true;
            }
        }
    }
    public function getRequest()
    {
        return $this->request;
    }
}

?>