<?php
namespace acempresarial\Repositories\PDF\XmlFormats;

use acempresarial\Helpers\PHPhelpers;

class CteFormatter
{
    private $helper;

    public function __construct(PHPhelpers $helper)
    {
        $this->helper = $helper;
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
        $CTE['primary_information']['economic_activities'] =
        $this->F_economic_activities($CTE['primary_information']['economic_activities']);

        $CTE['primary_information']['lasts_stamped_documents'] =
        $this->F_lasts_stamped_documents($CTE['primary_information']['lasts_stamped_documents']);

        $CTE['primary_information']['legal_representative'] =
        $this->F_legal_representative($CTE['primary_information']['legal_representative']);

        $CTE['primary_information']['company_conformation'] =
        $this->F_company_conformation($CTE['primary_information']['company_conformation']);      
        return $CTE;
    }

    /**
     * It separates the number of the economic activity
     * from the name of the activity and puts them on
     * separate position of an array
     * @param array $ecActivities
     */
    private function F_economic_activities($ecActivities)
    {
        $result = [];
        $result[0] = $ecActivities[0];
        foreach ($ecActivities as $key => $activity) {
            if ($key != 0) {
                $exploded = explode("  ", $activity);
                $result[$key] =
                [
                    'code'=>trim($exploded[0]),
                    'description'=>trim($exploded[2]),

                ];
            }
        }
        return $result;
    }

    /**
     * It combines the type of document with it corresponding
     * date of issue and place them on an array
     * @param array $documents
     */
    private function F_lasts_stamped_documents($documents)
    {
        $result = [];
        $cantidad = count($documents);
        $chunked = array_chunk($documents, $cantidad/2);
       
        for ($i = 0 ; $i<$cantidad/2; $i++) {
            $result[]=
                    [
                        'type'=>trim($chunked[0][$i]),
                        'date'=>trim($chunked[1][$i])
                    ];
        }
        return $result;
    }

    /**
     * It combines the name of the legal representative and his
     * rut, then it places them on an array
     * @param array $legalRepresentative 
     */
    private function F_legal_representative($legalRepresentative)
    {
        $result = [];
        $cantidad = count($legalRepresentative);
        $chunked = array_chunk($legalRepresentative,2);
       
        foreach ($chunked as $representative) {
            $result[]=
                    [
                        'name'=>trim($representative[0]),
                        'rut'=>trim($representative[1])
                    ];            
        }
        return $result;

    }

     /**
     * It combines the name of the members involved in the company, their
     * rut and the date joined, then it places them on an array
     * @param array $members 
     */
    private function F_company_conformation($members)
    {
        $result = [];
        $cantidad = count($members);
        $chunked = array_chunk($members,3);
       
        foreach ($chunked as $member) {
            $result[]=
                    [
                        'name'=>trim($member[0]),
                        'rut'=>trim($member[1]),
                        'date'=>trim($member[2])
                    ];            
        }
        return $result;

    }
}
