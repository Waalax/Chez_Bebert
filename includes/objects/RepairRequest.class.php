<?php
class RepairRequest
{
    private $request = '';
    private function checkInput($input)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $input, $matches, PREG_SET_ORDER, 0);
        
        return boolval($matches);
    }
    private function checkAllInput($name, $surname, $registration, $date_arrival)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $name, $matches1, PREG_SET_ORDER, 0);
        preg_match_all($re, $surname, $matches2, PREG_SET_ORDER, 0);
        preg_match_all($re, $registration, $matches3, PREG_SET_ORDER, 0);
        preg_match_all($re, $date_arrival, $matches4, PREG_SET_ORDER, 0);
        
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
    public function __construct($name, $surname, $registration, $date_arrival)
    {
        if ($this->checkAllInput($name, $surname, $registration, $date_arrival))
        {
            $and = false;
            $this->request = $this->request . " WHERE";
            if ($this->checkInput($name))
            {
                $name = $this->transform($name);
                $this->addCondition($this->request, "customers.name LIKE '$name'", $and);
                $and = true;
            }
            if ($this->checkInput($surname))
            {
                $surname = $this->transform($surname);
                $this->addCondition($this->request, "customers.surname LIKE '$surname'", $and);
                $and = true;
            }
            if ($this->checkInput($registration))
            {
                $registration = $this->transform($registration);
                $this->addCondition($this->request, "cars.registration LIKE '$registration'", $and);
                $and = true;
            }
            if ($this->checkInput($date_arrival))
            {
                $date_arrival = $this->transform($date_arrival);
                $this->addCondition($this->request, "repairs.date_arrival LIKE '$date_arrival'", $and);
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