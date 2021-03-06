<?php
class Application 
{
    private $total; 
    private $numPeople;
    private $tax;
    private $tip;
    private $tipType;

    function __construct()
    {
        $this->total = (double)$_POST["totalBill"];
        $this->numPeople = (double)$_POST["numPeople"];
        $this->tax = (double)$_POST["tax"];
        $this->tip = (double)$_POST["tip"];
        $this->tipType = $_POST["tipType"];
    }
 
    function compute()
    {
        $result = 0;

        if($this->numPeople > 0) // Avoiding division by zero when form is empty when app is launched
        {
            if($this->tipType === 'percentage')
            {
                $result = ( $this->total * (($this->tax/100) + 1) + $this->total * (($this->tip/100) + 1) ) / $this->numPeople ;
            }
            else // Tip is in dollars, also default when user doesn't select anything in dropdown and just enters amount
            {
                $result = ( $this->total * (($this->tax/100) + 1) + $this->tip ) / $this->numPeople ;
            }
        }

        return round($result, 1);
    } 
}

?>