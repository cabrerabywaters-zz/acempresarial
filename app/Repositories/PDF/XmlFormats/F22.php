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
                                    'name'=>'C18_first_category_tax_rent_taxable_base',
                                    'offset'=>2
                                ],
                    'total_assets' => [
                        'label'=>'Total Activo',
                        'type'=>'single',
                        'name'=>'C122_total_assets',
                        'offset'=>1
                    ],
                    'total_liabilities' => [
                        'label'=>'Total Pasivo',
                        'type'=>'single',
                        'name'=>'C123_total_liabilities',
                        'offset'=>1
                    ],
                    'perceived_or_accrued_income' => [
                        'label'=>'Ingresos Percibidos O Devengados',
                        'type'=>'single',
                        'name'=>'C628_perceived_or_accrued_income',
                        'offset'=>1
                    ],
                    'direct_cost_of_goods_and_services' => [
                        'label'=>'Costo Directo de Bienes Y Servicios',
                        'type'=>'single',
                        'name'=>'C630_direct_cost_of_goods_and_services',
                        'offset'=>1
                    ],
                    'remuneration' => [
                        'label'=>'Remuneraciones',
                        'type'=>'single',
                        'name'=>'C631_remuneration',
                        'offset'=>1
                    ],
                    'depreciation' => [
                        'label'=>'Depreciación',
                        'type'=>'single',
                        'name'=>'C632_depreciation',
                        'offset'=>1
                    ],
                    'other_deductible_expenses_gross_income' => [
                        'label'=>'Otros Gastos Deduc. de Ingresos Brutos',
                        'type'=>'single',
                        'name'=>'C635_other_deductible_expenses_gross_income',
                        'offset'=>1
                    ],
                    'debtor_balance_restatement' => [
                        'label'=>'Corrección Monetaria Saldo Deudor',
                        'type'=>'single',
                        'name'=>'C637_debtor_balance_restatement',
                        'offset'=>1
                    ],
                    'credit_balance_restatement' => [
                        'label'=>'Corrección Monetaria Saldo Acreedor',
                        'type'=>'single',
                        'name'=>'C638_credit_balance_restatement',
                        'offset'=>1
                    ],
                    'net_taxable_income_or_tax_loss' => [
                        'label'=>'Renta Liquida Imponible O Perdida Tribut',
                        'type'=>'single',
                        'name'=>'C643_net_taxable_income_or_tax_loss',
                        'offset'=>1
                    ],
                    'positive_tax_equity' => [
                        'label'=>'Capital Propio Tributario Positivo',
                        'type'=>'single',
                        'name'=>'C645_positive_tax_equity',
                        'offset'=>1
                    ],
                     'fixed_assets' => [
                        'label'=>'Activo Inmovilizado',
                        'type'=>'single',
                        'name'=>'C647_fixed_assets',
                        'offset'=>1
                    ],
                     'credit_assets_of_physical_property_exercise' => [
                        'label'=>'Crédito por bienes físicos del activo inmovilizado del ejercicio',
                        'type'=>'single',
                        'name'=>'C366_credit_assets_of_physical_property_exercise',
                        'offset'=>1
                    ],
                     'interest_received_or_accrued' => [
                        'label'=>'Intereses Percibidos O Devengados',
                        'type'=>'single',
                        'name'=>'C629_interest_received_or_accrued',
                        'offset'=>1
                    ],
                     'interest_paid_or_owed' => [
                        'label'=>'Intereses Pagados O Adeudados',
                        'type'=>'single',
                        'name'=>'C633_interest_paid_or_owed',
                        'offset'=>1
                    ],
                     'other_interest_paid_or_owed' => [
                        'label'=>'Otros Ingresos Percibidos O Devengados',
                        'type'=>'single',
                        'name'=>'C651_other_interest_paid_or_owed',
                        'offset'=>1
                    ],
                     'credit_for_training_expenses' => [
                        'label'=>'Crédito por Gastos de Capacitación',
                        'type'=>'single',
                        'name'=>'C82_credit_for_training_expenses',
                        'offset'=>1
                    ],
                    'credit_remaining_physical_assets_of_property_from_investments' => [
                        'label'=>'Remanente de Crédito por bienes físicos del activo inmovilizado proveniente de inversiones',
                        'type'=>'single',
                        'name'=>'C839_credit_remaining_physical_assets_of_property_from_investments',
                        'offset'=>1
                    ],
                    'capital_increase' => [
                        'label'=>'Aumento de Capital',
                        'type'=>'single',
                        'name'=>'C893_capital_increase',
                        'offset'=>1
                    ],
                    'capital_decrease' => [
                        'label'=>'Disminuciones de Capital',
                        'type'=>'single',
                        'name'=>'C894_capital_decrease',
                        'offset'=>1
                    ]



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
                        if ($this->helper->startsWith($content, $field['label'])) {
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
