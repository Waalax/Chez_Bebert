<?php
class CarRequest
{
    private $request = "SELECT cars.registration, cars.brand, cars.model, cars.year, cars.kilometerage, cars.id_customer
                        FROM cars";
    private function checkInput($input)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $input, $matches, PREG_SET_ORDER, 0);
        
        return boolval($matches);
    }
    private function checkAllInput($customer_id, $registration, $brand, $model, $year, $kilometerage)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $customer_id, $matches1, PREG_SET_ORDER, 0);
        preg_match_all($re, $registration, $matches2, PREG_SET_ORDER, 0);
        preg_match_all($re, $brand, $matches3, PREG_SET_ORDER, 0);
        preg_match_all($re, $model, $matches4, PREG_SET_ORDER, 0);
        preg_match_all($re, $year, $matches5, PREG_SET_ORDER, 0);
        preg_match_all($re, $kilometerage, $matches6, PREG_SET_ORDER, 0);
        
        return (boolval($matches1) or boolval($matches2) or boolval($matches3) or boolval($matches4) or boolval($matches5) or boolval($matches6));
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
    public function __construct($customer_id, $registration, $brand, $model, $year, $kilometerage)
    {
        if ($this->checkAllInput($customer_id, $registration, $brand, $model, $year, $kilometerage))
        {
            $and = false;
            $this->request = $this->request . " WHERE";
            if ($this->checkInput($customer_id))
            {
                $this->addCondition($this->request, "cars.id_customer = $customer_id", $and);
                $and = true;
            }
            if ($this->checkInput($registration))
            {
                $registration = $this->transform($registration);
                $this->addCondition($this->request, "cars.registration LIKE '$registration'", $and);
                $and = true;
            }
            if ($this->checkInput($brand))
            {
                $brand = $this->transform($brand);
                $this->addCondition($this->request, "cars.brand LIKE '$brand'", $and);
                $and = true;
            }
            if ($this->checkInput($model))
            {
                $model = $this->transform($model);
                $this->addCondition($this->request, "cars.model LIKE '$model'", $and);
                $and = true;
            }
            if ($this->checkInput($year))
            {
                $this->addCondition($this->request, "cars.year = $year", $and);
                $and = true;
            }
            if ($this->checkInput($kilometerage))
            {
                $this->addCondition($this->request, "cars.kilometerage > $kilometerage", $and);
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