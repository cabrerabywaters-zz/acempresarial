<?php
namespace acempresarial\Repositories\PDF;

use acempresarial\Repositories\PDF\XmlFormats\PrimaryInformation;

class XmlExtractorRepository 
{
	private $primaryInfo; 

    public function __construct(PrimaryInformation $primaryInfo)
    {
        $this->primaryInfo = $primaryInfo;       
    }

	/**
	 * Extracts all the Information contained
	 * in the PDF, including F29 and F22 forms
	 * @return array CTE (Carpeta Tributaria)
	 */
	public function parse($xml)
	{	
        $xml = simplexml_load_file($xml->xml_path);
        $xml = json_decode(json_encode((array)$xml), true);     
        $Cte['primary_information'] = $this->primaryInfo->extract($xml);
		dd($Cte);
	}
	
}