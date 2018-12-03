<?php
class RepairRequest
{
    private $request = 'SELECT id_rep, id_technician, registration, type, comments, date_arrival FROM repairs';
    private function checkInput($input)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $input, $matches, PREG_SET_ORDER, 0);
        
        return boolval($matches);
    }
    private function checkAllInput($id_technician, $registration, $type, $date_arrival)
    {
        $re = '/[a-zA-Z0-9]+/';
        preg_match_all($re, $id_technician, $matches1, PREG_SET_ORDER, 0);
        preg_match_all($re, $registration, $matches2, PREG_SET_ORDER, 0);
        preg_match_all($re, $type, $matches3, PREG_SET_ORDER, 0);
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
    public function __construct($id_technician, $registration, $type, $date_arrival)
    {
        if ($this->checkAllInput($id_technician, $registration, $type, $date_arrival))
        {
            $and = false;
            $this->request = $this->request . " WHERE";
            if ($this->checkInput($id_technician))
            {
                $this->addCondition($this->request, "repairs.id_technician = $id_technician", $and);
                $and = true;
            }
            if ($this->checkInput($registration))
            {
                $this->addCondition($this->request, "repairs.registration = '$registration'", $and);
                $and = true;
            }
            if ($this->checkInput($type))
            {
                $type = $this->transform($type);
                $this->addCondition($this->request, "repairs.type LIKE '$type'", $and);
                $and = true;
            }
            if ($this->checkInput($date_arrival))
            {
                $this->addCondition($this->request, "repairs.date_arrival = '$date_arrival'", $and);
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