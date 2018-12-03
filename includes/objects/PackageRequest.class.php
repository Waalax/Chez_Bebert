<?php
class PackageRequest
{
    private $request = 'SELECT id_package, name, year, kilometerage, price FROM packages';
    private function checkInput($input)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $input, $matches, PREG_SET_ORDER, 0);
        
        return boolval($matches);
    }
    private function checkAllInput($id_package, $name, $year, $kilometerage)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $id_package, $matches1, PREG_SET_ORDER, 0);
        preg_match_all($re, $name, $matches2, PREG_SET_ORDER, 0);
        preg_match_all($re, $year, $matches3, PREG_SET_ORDER, 0);
        preg_match_all($re, $kilometerage, $matches4, PREG_SET_ORDER, 0);
        
        return (boolval($matches1) or boolval($matches2) or boolval($matches3) or boolval($matches4));
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
    public function __construct($id_package, $name, $year, $kilometerage)
    {
        if ($this->checkAllInput($id_package, $name, $year, $kilometerage))
        {
            $and = false;
            $this->request = $this->request . " WHERE";
            if ($this->checkInput($id_package))
            {
                $this->addCondition($this->request, "packages.id_package = $id_package", $and);
                $and = true;
            }
            if ($this->checkInput($name))
            {
                $name = $this->transform($name);
                $this->addCondition($this->request, "packages.name LIKE '$name'", $and);
                $and = true;
            }
            if ($this->checkInput($year))
            {
                $this->addCondition($this->request, "packages.year = $year", $and);
                $and = true;
            }
            if ($this->checkInput($kilometerage))
            {
                $this->addCondition($this->request, "packages.kilometerage > $kilometerage", $and);
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