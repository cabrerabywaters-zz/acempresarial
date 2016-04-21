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
                        'type'=>'single',
                        'name'=>'email',
                        'labels'=>[
                            [
                                'label'=>'Correo Electrónico',
                                'offset'=>1,
                                'next_label'=>''
                            ]
                        ]
                    ],
        'folio' => [
                        'name'=>'folio',
                        'type'=>'single',
                        'labels'=>[
                            [
                                'label'=>'Folio Nº',
                                'offset'=>0,
                                'next_label'=>''
                            ]
                            
                        ]
                    ],
        'tax_year' => [
                        'name'=>'tax_year',
                        'type'=>'single',
                        'labels'=>[
                            [
                                'label'=>'Año Tributario',
                                'offset'=>0,
                                'next_label'=>''
                            ]
                        ]
                    ],
        'rut' => [
                        'name'=>'rut',
                        'type'=>'single',
                        'labels'=>[
                            [
                                'label'=>'03',
                                'offset'=>1,
                                'next_label'=>''
                            ]
                            
                        ]
                ],
        'first_category_tax_rent_determ' => [
                        
                        'name'=>'C20',
                        'type'=>'single',
                        'labels'=>[
                            [
                                'label'=>'Impuesto de Primera Categoría sobre rentas efectivas. (Determinado)',
                                'offset'=>1,
                                'next_label'=>''
                            ],
                            [
                                'label'=>'Impuesto de Primera Categoría sobre rentas efectivas.',
                                'offset'=>2,
                                'next_label'=>'(Determinado)'

                            ],
                            [

                                'label'=>'Impuesto de Primera Categoría sobre rentas',
                                'offset'=>2,
                                'next_label'=>'efectivas. (Determinado)'
                            ],
                            [
                                'label'=>'Impuesto de Primera Categoría sobre',
                                'offset'=>2,
                                'next_label'=>'rentas efectivas. (Determinado)'
                            ],
                            [

                                'label'=>'1a Categ. Sobre Rentas Efectivas',
                                'offset'=>1,
                                'next_label'=>''
                            ],
                            [
                                'label'=>'Impuesto 1a Categ. Sobre Rentas Efectivas',
                                'offset'=>1,
                                'next_label'=>''
                            ]
                            
                        ]
                    ],
        'first_category_tax_rent_taxable_base' => [
                        'name'=>'C18',
                        'type'=>'single',
                        'labels'=>[
                            [
                                'label'=>'Impuesto Primera Categoría sobre rentas efectivas. (Base Imponible)',
                                'offset'=>1,
                                'next_label'=>''
                            ],
                            [
                                'label'=>'Impuesto Primera Categoría sobre rentas efectivas. (Base',
                                'offset'=>2,
                                'next_label'=>'Imponible)'
                            ],
                            [
                                'label'=>'Impuesto Primera Categoría sobre rentas efectivas.',
                                'offset'=>2,
                                'next_label'=>'(Base Imponible)'
                            ]
                            
                        ]
                   ],
        'total_assets' => [
            'name'=>'C122',
            'type'=>'single',
            'labels'=>[
                        [
                            'label'=>'Total Activo',
                            'offset'=>1,
                            'next_label'=>''
                        ]
                    ]
        ],
        'total_liabilities' => [
            'name'=>'C123',
            'type'=>'single',
            'labels'=>[
                            [
                                'label'=>'Total Pasivo',
                                'offset'=>1,
                                'next_label'=>''
                            ]
                        ]
        ],
        'perceived_or_accrued_income' => [
            'name'=>'C628',
            'type'=>'single',
            'labels'=>[
                        [
                            'label'=>'Ingresos Percibidos O Devengados',
                            'offset'=>1,
                            'next_label'=>''
                        ]
                            
                ]
        ],
        'direct_cost_of_goods_and_services' => [
            'name'=>'C630',
            'type'=>'single',
            'labels'=>[
                        [
                            'label'=>'Costo Directo de Bienes Y Servicios',
                            'offset'=>1,
                            'next_label'=>''
                        ]
                            
                ]
        ],
        'remuneration' => [
            'name'=>'C631',
            'type'=>'single',
            'labels'=>[
                        [
                            'label'=>'Remuneraciones',
                            'offset'=>1,
                            'next_label'=>''
                        ]
                ]
        ],
        'depreciation' => [
            'name'=>'C632',
            'type'=>'single',
            'labels'=>[
                        [
                            'label'=>'Depreciación',
                            'offset'=>1,
                            'next_label'=>''
                        ]
                ]
        ],
        'other_deductible_expenses_gross_income' => [
            'name'=>'C635',
            'type'=>'single',
            'labels'=>[
                        [
                            'label'=>'Otros Gastos Deduc. de Ingresos Brutos',
                            'offset'=>1,
                            'next_label'=>''
                        ]
                ]
            
        ],
        'debtor_balance_restatement' => [
            'name'=>'C637',
            'type'=>'single',
            'labels'=>[
                    [
                        'label'=>'Corrección Monetaria Saldo Deudor',
                        'offset'=>1,
                        'next_label'=>''
                    ]
            ]
        ],
        'credit_balance_restatement' => [
            'name'=>'C638',
            'type'=>'single',
            'labels'=>[
                        [
                            'label'=>'Corrección Monetaria Saldo Acreedor',
                            'offset'=>1,
                            'next_label'=>''
                        ]
                            
                ]
        ],
        'net_taxable_income_or_tax_loss' => [
            'name'=>'C643',
            'type'=>'single',
            'labels'=>[
                        [
                            'label'=>'Renta Liquida Imponible O Perdida Tribut',
                            'offset'=>1,
                            'next_label'=>''
                        ]
                            
                ]
        ],
        'positive_tax_equity' => [
            'name'=>'C645',
            'type'=>'single',
            'labels'=>[
                        [
                            'label'=>'Capital Propio Tributario Positivo',
                            'offset'=>1,
                            'next_label'=>''
                        ]
                ]
        ],
         'fixed_assets' => [
            'name'=>'C647',
            'type'=>'single',
            'labels'=>[
                        [
                            'label'=>'Activo Inmovilizado',
                            'offset'=>1,
                            'next_label'=>''
                        ]
                ]
        ],
         'credit_assets_of_physical_property_exercise' => [
            'name'=>'C366',
            'type'=>'single',
            'labels'=>[
                        [
                            'label'=>'Crédito por bienes físicos del activo inmovilizado del ejercicio',
                            'offset'=>1,
                            'next_label'=>''
                        ],
                        [
                            'label'=>'Crédito por bienes físicos del activo',
                            'offset'=>2,
                            'next_label'=>''
                        ],
                        [
                            'label'=>'Crédito Por Bienes Físicos Del Activo In',
                            'offset'=>1,
                            'next_label'=>''
                        ],
                        [
                            'label'=>'Crédito por bienes físicos del activo inmovilizado del',
                            'offset'=>2,
                            'next_label'=>''
                        ]
                ]
        ],
         'interest_received_or_accrued' => [
            'name'=>'C629',
            'type'=>'single',
            'labels'=>[
                [
                    'label'=>'Intereses Percibidos O Devengados',
                    'offset'=>1,
                    'next_label'=>''
                ]
            ]
        ],
        'interest_paid_or_owed' => [
            'name'=>'C633',
            'type'=>'single',
            'labels'=>[
                    [
                        'label'=>'Intereses Pagados O Adeudados',
                        'offset'=>1,
                        'next_label'=>''
                    ]
                ]
        ],
         'other_interest_paid_or_owed' => [
            'name'=>'C651',
            'type'=>'single',
            'labels'=>[
                [
                    'label'=>'Otros Ingresos Percibidos O Devengados',
                    'offset'=>1,
                    'next_label'=>''
                ]
            ]
        ],
        'credit_for_training_expenses' => [
            'name'=>'C82',
            'type'=>'single',
            'labels'=>[
                [
                    'label'=>'Crédito por Gastos de Capacitación',
                    'offset'=>1,
                    'next_label'=>''
                ]
            ]
        ],
        'credit_remaining_physical_assets_of_property_from_investments' => [
            'name'=>'C839',
            'type'=>'single',
            'labels'=>[
                [
                    'label'=>'Remanente de Crédito por bienes físicos del activo inmovilizado proveniente de inversiones',
                    'offset'=>1,
                    'next_label'=>''
                ]
            ]
        ],
        'capital_increase' => [
            'name'=>'C893',
            'type'=>'single',
            'labels'=>[
                [
                    'label'=>'Aumento de Capital',
                    'offset'=>1,
                    'next_label'=>''
                ]
            ]
        ],
        'capital_decrease' => [
            'name'=>'C894',
            'type'=>'single',
            'labels'=>[
                [
                    'label'=>'Disminuciones de Capital',
                    'offset'=>1,
                    'next_label'=>''
                ]
            ]
        ]
    ];

    /**
     * Extracts all the information contained
     * in the F22 forms of the CTE document
     * @return array Parsed F29 Forms
     */
    public function extract($xml)
    {        
        $this->fields = $this->helper->order_fields_labels_by_length($this->fields);       
        $result = [];
        $pages = $this->getF22Pages($xml);

        foreach ($pages as $key => $pageNumber) {
            foreach ($xml['page'][$pageNumber]['text'] as $position => $content) {
                $content = $this->helper->extract_value($content);

                foreach ($this->fields as $label => $field) {

                    //Single fields
                    if ($field['type']=="single") {
                        foreach ($field['labels'] as $key => $option) {
                            if ($this->helper->startsWith($content, $option['label'])) {
                                if($option['next_label']!='')
                                {
                                    $next_label = $this->helper->extract_value($xml['page'][$pageNumber]['text'][$position + 1]);
                                    if($this->helper->startsWith($next_label, $option['next_label']))
                                    {
                                        $result[$pageNumber][$field['name']] =  $this->helper->extract_value($xml['page'][$pageNumber]['text'][$position + $option['offset']]);
                                        break;

                                    }

                                }else{
                                    $result[$pageNumber][$field['name']] =  $this->helper->extract_value($xml['page'][$pageNumber]['text'][$position + $option['offset']]);
                                    break;
                                }
                                
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
