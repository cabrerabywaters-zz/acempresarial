<?php
namespace acempresarial\Repositories\PDF\DatabaseFormatters;

use acempresarial\Helpers\PHPhelpers;

class PrimaryInformationFormatter
{
    private $helper;

    public function __construct(PHPhelpers $helper)
    {
        $this->helper = $helper;
    }

    /**
     * Takes the array formatted CTE's Primary Information and applies transformations
     * to some fields that didn't properly format during Xml extraction
     * @param  array $CTE [description]
     * @return array $CTE  formatted CTE
     */
    public function format($primaryInformation)
    {
        $primaryInformation['economic_activities'] =
        $this->F_economic_activities($primaryInformation['economic_activities']);

        $primaryInformation['lasts_stamped_documents'] =
        $this->F_lasts_stamped_documents($primaryInformation['lasts_stamped_documents']);

        $primaryInformation['legal_representative'] =
        $this->F_legal_representative($primaryInformation['legal_representative']);


        if (isset($primaryInformation['company_conformation'])) {
            $primaryInformation['company_conformation'] =
            $this->F_company_conformation($primaryInformation['company_conformation']);
        } else {
            $primaryInformation['company_conformation'] = [];
        }
        

        $primaryInformation['issuer_rut'] =
        $this->F_issuer_rut($primaryInformation['issuer_rut']);

        $primaryInformation['folder_issue_date'] =
        $this->helper->CHL_datetime_to_DB($primaryInformation['folder_issue_date']);

        return $primaryInformation;
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

        $validator = explode("  ", $ecActivities[0]);
        $formatCero = true;

        if (count($ecActivities) > 1 && !is_numeric($validator[0])) {
            $result[0] = $ecActivities[0];
            $formatCero = false;
        }

        foreach ($ecActivities as $key => $activity) {
            $exploded = explode("  ", $activity);
            if ($formatCero) {
                $result[$key] =
                    [
                        'code'=>trim($exploded[0]),
                        'description'=>trim($exploded[2]),
                    ];
            } else {
                if ($key!=0) {
                    $result[$key] =
                    [
                        'code'=>trim($exploded[0]),
                        'description'=>trim($exploded[2]),
                    ];
                }
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
        
        if (empty($legalRepresentative[0]) || $legalRepresentative[0]=="− No existe(n) representante(s) legal(es) para este RUT −") {
            return [];
        }

        
        $result = [];
        $cantidad = count($legalRepresentative);
        $chunked = array_chunk($legalRepresentative, 2);
        
        if (isset($legalRepresentative[2])) {
            if (is_numeric($legalRepresentative[2][1])) {
                $chunked = array_chunk($legalRepresentative, 3);
            }
        }
      
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
        if (empty($members[0]) || $members[0]=="− No existen socios para este RUT −") {
            return [];
        }

        $result = [];
        $cantidad = count($members);
        $chunked = array_chunk($members, 3);
       
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

    /**
     * Receives a RUT with the verification digitil separated
     * from the dash, returns the rut correctly formated.     *
     * @param String $rut
     */
    private function F_issuer_rut($rut)
    {
        $rut = explode(" ", $rut);
        $rut = $rut[0].$rut[1].$rut[2];
        return $rut;
    }
}
