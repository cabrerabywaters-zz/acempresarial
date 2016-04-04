<?php
namespace acempresarial\Repositories\PDF\XmlFormats;

use acempresarial\Helpers\PHPhelpers;

class F22
{
    private $helper;

    public function __construct(PHPhelpers $helper)
    {
        $this->helper = $helper;
    }

    private $fields =
                [
                    'email' => [
                                    'label'=>'Correo Electrónico',
                                    'type'=>'single',
                                    'name'=>'email',
                                    'offset'=>1
                                ],
                    'folio' => [
                                    'label'=>'Folio Nº',
                                    'type'=>'single',
                                    'name'=>'folio',
                                    'offset'=>0
                                ],    
                    'tax_year' => [
                                    'label'=>'Año Tributario',
                                    'type'=>'single',
                                    'name'=>'tax_year',
                                    'offset'=>0
                                ],
                    'rut' => [
                                    'label'=>'03',
                                    'type'=>'single',
                                    'name'=>'rut',
                                    'offset'=>1
                                ], 
                    'first_category_tax_rent_determ' => [
                                    'label'=>'Impuesto de Primera Categoría sobre rentas efectivas. (Determinado)',
                                    'type'=>'single',
                                    'name'=>'first_category_tax_rent_determ',
                                    'offset'=>1
                                ], 
                    'first_category_tax_rent_taxable_base' => [
                                    'label'=>'Impuesto Primera Categoría sobre rentas efectivas. (Base',
                                    'type'=>'single',
                                    'name'=>'first_category_tax_rent_taxable_base',
                                    'offset'=>2
                                ], 


                ];

    /**
     * Extracts all the information contained
     * in the F22 forms of the CTE document
     * @return array Parsed F29 Forms
     */
    public function extract($xml)
    {
        $result = [];
        $pages = $this->getF22Pages($xml);       

        foreach ($pages as $key => $pageNumber) {
            foreach ($xml['page'][$pageNumber]['text'] as $position => $content) {
                $content = $this->helper->extract_value($content);

                foreach ($this->fields as $label => $field) {

                    //Single fields
                    if ($field['type']=="single") {
                        if ($this->helper->startsWith($content,$field['label'])) {
                            $result[$pageNumber][$field['name']] =  $this->helper->extract_value($xml['page'][$pageNumber]['text'][$position + $field['offset']]);
                        }
                    }
                    //Multiple fields
                    elseif ($field['type']=="multiple") {
                        if ($content == $field['label']) {
                            $next = 1;
                            while (!$this->helper->startsWith($xml['page'][0]['text'][$position + $next], $field['next_label'])) {
                                $result[$pageNumber][$field['name']][] = $xml['page'][0]['text'][$position + $next];
                                $next++;
                            }
                        }
                    }
                }
            }
        }        
        return $result;
    }

    /**
     * Gets all the page numbers where there is
     * an F29 form to extract
     * @param  [type] $xml [description]
     * @return [type]      [description]
     */
    private function getF22Pages($xml)
    {
        $F22Pages = [];
        foreach ($xml['page'] as $number => $page) {
            foreach ($page['text'] as $position => $content) {
                if (is_array($content)) {
                    $content = $content['b'];
                }
                if ($content == 'FORM. 22') {
                    array_push($F22Pages, $number);
                }
            }
        }

        return $F22Pages;
    }
}
