<?php
namespace acempresarial\Repositories\PDF;

use acempresarial\Repositories\PDF\XmlFormats\PrimaryInformation;
use acempresarial\Repositories\PDF\XmlFormats\F29;
use acempresarial\Repositories\PDF\XmlFormats\F22;
use acempresarial\Repositories\PDF\XmlFormats\CteFormatter;

class XmlExtractorRepository
{
    private $primaryInfo;
    private $f29;
    private $f22;
    private $cteFormatter;

    public function __construct(PrimaryInformation $primaryInfo, F29 $f29, F22 $f22, CteFormatter $cteFormatter)
    {
        $this->primaryInfo = $primaryInfo;
        $this->f29 = $f29;
        $this->f22 = $f22;
        $this->cteFormatter = $cteFormatter;
    }

    /**
     * Extracts all the Information contained in
     * the PDF, including F29 and F22 forms
     * @return array CTE (Carpeta Tributaria)
     */
    public function parse($xml)
    {
        $xml = simplexml_load_file($xml->xml_path);

        $xml = json_decode(json_encode((array)$xml), true);
        $Cte['primary_information'] = $this->primaryInfo->extract($xml);
        $Cte['Forms']['F29'] = $this->f29->extract($xml);
        $Cte['Forms']['F22'] = $this->f22->extract($xml);
        $Cte =  $this->cteFormatter->format($Cte);
        
        return $Cte;
    }
}
