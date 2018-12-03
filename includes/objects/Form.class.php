<?php
class FormObject
{
    private $action;
    private $htmlForm;
    private function addField($label, $input)
    {
        $this->htmlForm = $this->htmlForm . "
<div class='form-bebert'>
    <label label='$label'>$label</label>
    <input type='text' name='$input' id='$input'>
</div>";
    }
    private function closeForm()
    {
        $this->htmlForm = $this->htmlForm . "<input type='submit' value='Envoyer'>";
    }
    public function __construct($action, $array)
    {
        $this->action = $action;
        $this->htmlForm = "<form action='$action' method='POST' class='form-bebert'>";
        foreach ( $array as $a )
        {
            $this->addField($a [0], $a [1]);
        }
        $this->closeForm('Envoyer');

    }
    public function getHTML()
    {
        return $this->htmlForm;
    }
}

?>