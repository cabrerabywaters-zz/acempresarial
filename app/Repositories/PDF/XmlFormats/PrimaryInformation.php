<?php
namespace acempresarial\Repositories\PDF\XmlFormats;

use acempresarial\Helpers\PHPhelpers;

class PrimaryInformation
{
    private $helper;

    public function __construct(PHPhelpers $helper)
    {
        $this->helper = $helper;
    }
    private $fields =
                [
                    'issuer' => [
                                    'label'=>"Nombre del emisor:",
                                    'type'=>'single',
                                    'name'=>'issuer'
                                ],
                    'issuer_rut' => [
                                    'label'=>'RUT del emisor:',
                                    'type'=>'single',
                                    'name'=>'issuer_rut'
                                ],
                    'folder_issue_date' => [
                                    'label'=>'Fecha de generación de la carpeta:',
                                    'type'=>'single',
                                    'name'=>'folder_issue_date'
                                ],
                    'activities_start_date' => [
                                    'label'=>'Fecha de Inicio de Actividades:',
                                    'type'=>'single',
                                    'name'=>'activities_start_date'
                                ],
                    'economic_activities'=> [
                                    'label'=>'Actividades Económicas:',
                                    'type'=>'multiple',
                                    'name'=>'economic_activities',
                                    'next_label'=>'Categoría tributaria:'
                                ],
                    'tax_category' => [
                                    'label'=>'Categoría tributaria:',
                                    'type'=>'single',
                                    'name'=>'tax_category'
                                ],
                    'address' => [
                                    'label'=>'Domicilio:',
                                    'type'=>'single',
                                    'name'=>'address'
                                ],
                    'lasts_stamped_documents' => [
                                    'label'=>'Últimos documentos timbrados:',
                                    'type'=>'multiple',
                                    'name'=>'lasts_stamped_documents',
                                    'next_label'=>'Observaciones tributarias:'
                                ],
                    'legal_representative' => [
                                    'label'=>'Representante(s) Legal(es)',
                                    'type'=>'multiple',
                                    'name'=>'legal_representative',
                                    'next_label'=>'Conformación de la sociedad'
                                ],
                    'company_conformation' => [
                                    'label'=>'Conformación de la sociedad',
                                    'type'=>'multiple',
                                    'name'=>'company_conformation',
                                    'next_label'=>'Participación en sociedades'
                                ],


                ];

    /**
     * Extracts all the information contained
     * in the first page of the CTE document
     * @return array First Page Information
     */
    public function extract($xml)
    {
        $result = [];

        dd($xml);
    
        //Iterates over the Xml
        foreach ($xml['page'][0]['text'] as $position => $content) {
            
            //Iterates over the fields
            foreach ($this->fields as $label => $field) {
                //Single fields
                if ($field['type']=="single") {
                    if ($content == $field['label']) {
                        $result[$field['name']] =  $xml['page'][0]['text'][$position + 1];
                    }
                }
                //Multiple fields
                elseif ($field['type']=="multiple") {
                    if ($content == $field['label']) {
                        $next = 1;
                        if ($field['label'] == "Conformación de la sociedad" &&
                            $this->helper->startsWith(
                                $this->helper->extract_value($xml['page'][0]['text'][$position + $next]),
                                 $field['next_label'])
                            ) {
                            $result[$field['name']][] = [];
                            break;
                        }
                     
                        while (!$this->helper->startsWith(
                            $this->helper->extract_value($xml['page'][0]['text'][$position + $next]),
                            $field['next_label'])) {

                            if($field['label']=="Representante(s) Legal(es)" && $xml['page'][0]['text'][$position + $next]=="Participación en sociedades vigentes (2)")
                            {
                                break;
                            }

                            $result[$field['name']][] = $xml['page'][0]['text'][$position + $next];
                            $next++;
                           
                        }
                    }
                }
            }
        }
        return $result;
    }
}
