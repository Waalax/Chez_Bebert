<?php
class CustomerRequest
{
    private $request = "SELECT customers.id_customer, customers.name, customers.surname, customers.city  
                        FROM customers";
    private function checkInput($input)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $input, $matches, PREG_SET_ORDER, 0);
        
        return boolval($matches);
    }
    private function checkAllInput($customer_id, $name, $surname, $city)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $customer_id, $matches0, PREG_SET_ORDER, 0);
        preg_match_all($re, $name, $matches1, PREG_SET_ORDER, 0);
        preg_match_all($re, $surname, $matches2, PREG_SET_ORDER, 0);
        preg_match_all($re, $city, $matches3, PREG_SET_ORDER, 0);
        
        return (boolval($matches0) or boolval($matches1) or boolval($matches2) or boolval($matches3));
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
    public function __construct($customer_id, $name, $surname, $city)
    {
        if ($this->checkAllInput($customer_id, $name, $surname, $city))
        {
            $and = false;
            $this->request = $this->request . " WHERE";
            if ($this->checkInput($customer_id))
            {
                $this->addCondition($this->request, "customers.id_customer = $customer_id", $and);
                $and = true;
            }
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
            if ($this->checkInput($city))
            {
                $city = $this->transform($city);
                $this->addCondition($this->request, "customers.city LIKE '$city'", $and);
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