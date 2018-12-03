<?php
class TechnicianRequest
{
    private $request = "SELECT id_technician, name, surname, group_id FROM technicians";
    private function checkInput($input)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $input, $matches, PREG_SET_ORDER, 0);
        
        return boolval($matches);
    }
    private function checkAllInput($name, $surname)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $name, $matches1, PREG_SET_ORDER, 0);
        preg_match_all($re, $surname, $matches2, PREG_SET_ORDER, 0);
        
        return (boolval($matches1) or boolval($matches2));
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
    public function __construct($name, $surname)
    {
        if ($this->checkAllInput($name, $surname))
        {
            $and = false;
            $this->request = $this->request . " WHERE";
            if ($this->checkInput($name))
            {
                $name = $this->transform($name);
                $this->addCondition($this->request, "technicians.name LIKE '$name'", $and);
                $and = true;
            }
            if ($this->checkInput($surname))
            {
                $surname = $this->transform($surname);
                $this->addCondition($this->request, "technicians.surname LIKE '$surname'", $and);
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