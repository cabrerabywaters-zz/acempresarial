<?php
namespace acempresarial\Repositories\PDF\XmlFormats;

use acempresarial\Repositories\PDF\DatabaseFormatters\PrimaryInformationFormatter;
use acempresarial\Repositories\PDF\DatabaseFormatters\F22Formatter;
use acempresarial\Repositories\PDF\DatabaseFormatters\F29Formatter;

class CteFormatter
{
    
    private $primaryInformation;
    private $F22;
    private $F29;

    public function __construct(PrimaryInformationFormatter $primaryInformation, F22Formatter $F22,F29Formatter $F29)
    {
       
        $this->primaryInformation = $primaryInformation;
        $this->F22 = $F22;
        $this->F29 = $F29;
    }

    /**
     * Takes the array formatted CTE and applies transformations
     * to some fields that didn't properly format during Xml
     * extraction
     * @param  array $CTE [description]
     * @return array $CTE  formatted CTE
     */
    public function format($CTE)
    {
        $CTE['primary_information'] = $this->primaryInformation->format($CTE['primary_information']);
        $CTE['Forms']['F29'] = $this->F29->format($CTE['Forms']['F29']);
        $CTE['Forms']['F22'] = $this->F22->format($CTE['Forms']['F22']);
        
        return $CTE;
    }

   
}
