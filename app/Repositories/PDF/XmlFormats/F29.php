<?php
namespace acempresarial\Repositories\PDF\XmlFormats;

use acempresarial\Helpers\PHPhelpers;

class F29
{
    private $helper;

    public function __construct(PHPhelpers $helper)
    {
        $this->helper = $helper;
    }

    private $fields =
    [
        'C07' => [
                    'name'=>'folio',
                    'labels'=>[
                        [
                            'label'=>'FOLIO',
                            'code_offset'=>1,
                            'value_offset'=>2,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C03' => [
                    'name'=>'rut',
                    'labels'=>[
                        [
                            'label'=>'RUT',
                            'code_offset'=>-1,
                            'value_offset'=>2,
                            'next_label'=>''
                        ]

                    ]
                ],
        'C15' => [
                    'name'=>'period',
                    'labels'=>[
                        [
                            'label'=>'PERIODO',
                            'code_offset'=>1,
                            'value_offset'=>2,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C062' => [
                    'name'=>'net_ppm_det',
                    'labels'=>[
                        [
                            'label'=>'PPM NETO DET.',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C089' => [
                    'name'=>'iva_tax_det',
                    'labels'=>[
                        [
                            'label'=>'IMP. DETERM. IVA DETERM.',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C110' => [
                   'name'=>'qty_receipt_documents',
                    'labels'=>[
                        [
                            'label'=>'CANT. DE DCTOS. BOLETAS',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C111' => [
                    'name'=>'debits_receipts',
                    'labels'=>[
                        [
                            'label'=>'DÉBITOS / BOLETAS',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C115' => [
                    'name'=>'first_category_ppm_rate',
                    'labels'=>[
                        [
                            'label'=>'TASA PPM 1RA. CATEGORIA',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C142' => [
                    'name'=>'sells_or_services_exempt_or_not',
                    'labels'=>[
                        [
                            'label'=>'VENTAS Y/O SERV. EXENTOS O NO',
                            'code_offset'=>-1,
                            'value_offset'=>2,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C151' => [
                    'name'=>'10_percent_rate_retention_over_rent',
                    'labels'=>[
                        [
                            'label'=>'RET, TASAS DE 10 % SOBRE LAS RENT.',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C502' => [
                    'name'=>'debt_issued_invoices',
                    'labels'=>[
                        [
                            'label'=>'DÉBITOS FACTURAS EMITIDAS',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C503' => [
                    'name'=>'qty_issued_invoices',
                    'labels'=>[
                        [
                            'label'=>'CANTIDAD FACTURAS EMITIDAS',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C509' => [
                    'name'=>'qty_credit_memo',
                    'labels'=>[
                        [
                            'label'=>'CANT. DCTOS. NOTAS DE CRÉDITOS',
                            'code_offset'=>-1,
                            'value_offset'=>2,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C510' => [
                   'name'=>'debt_issued_credit_memo',
                    'labels'=>[
                        [
                            'label'=>'DÉBITOS NOTAS DE CRÉDITOS EMITIDAS',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C511' => [
                   'name'=>'credit_iva_tax_electronic_documents',
                    'labels'=>[
                        [
                            'label'=>'CRÉD. IVA POR DCTOS. ELECTRONICOS',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C515' => [
                    'name'=>'qty_buy_invoice_rec_ret_tot_e',
                    'labels'=>[
                        [
                            'label'=>'N° FACT. COMPRAS REC. RET. TOT. E',
                            'code_offset'=>-1,
                            'value_offset'=>2,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C519' => [
                    'name'=>'qty_invoices_received_from_activity',
                    'labels'=>[
                        [
                            'label'=>'CANT. DE DCTOS. FACT. RECIB. DEL GIRO',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C520' => [
                    'name'=>'credit_rec_reint_fact_from_activity',
                    'labels'=>[
                        [
                            'label'=>'CRÉDITO REC. Y REINT./FACT. DEL GIRO',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C527' => [
                    'name'=>'qty_received_credit_memo',
                    'labels'=>[
                        [
                            'label'=>'CANT. NOTAS DE CRÉDITO RECIBIDAS',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C528' => [
                    'name'=>'credit_recup_reint_credit_memo',
                    'labels'=>[
                        [
                            'label'=>'CRÉDITO RECUP. Y REINT NOTAS DE CRÉD',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                            
                    ]
                ],
        'C537' => [
                   'name'=>'total_credits',
                    'labels'=>[
                        [
                            'label'=>'TOTAL CRÉDITOS',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                            
                    ]
                ],
        'C538' => [
                   'name'=>'total_debits',
                    'labels'=>[
                        [
                            'label'=>'TOTAL DÉBITOS',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C547' => [
                   'name'=>'determined_total',
                    'labels'=>[
                        [
                            'label'=>'TOTAL DETERMINADO',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C563' => [
                    'name'=>'taxable_income',
                    'labels'=>[
                        [
                            'label'=>'BASE IMPONIBLE',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C573' => [
                   'name'=>'previous_remainder_change_suj_per',
                    'labels'=>[
                        [
                            'label'=>'REMANENTE ANT. CAMBIO SUJ. PER.',
                            'code_offset'=>-1,
                            'value_offset'=>2,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C587' => [
                    'name'=>'net_amount_buy_invoices_received',
                    'labels'=>[
                        [
                            'label'=>'MONTO NETO, FACT. DE COMP. RECIBIDAS',
                            'code_offset'=>-1,
                            'value_offset'=>2,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C595' => [
                    'name'=>'sub_total_determined_tax_front',
                    'labels'=>[
                        [
                            'label'=>'SUB TOTAL IMP. DETERMINADO ANVERSO',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C598' => [
                   'name'=>'imputable_changable_advances_suj',
                    'labels'=>[
                        [
                            'label'=>'ANTICIPO A IMPUTAR / CAMBIO DE SUJ.',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C723' => [
                    'name'=>'total_imputable_catch_credit',
                    'labels'=>[
                        [
                            'label'=>'TOTAL CREDITO CAPACITACION A',
                            'code_offset'=>-1,
                            'value_offset'=>2,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C724' => [
                    'name'=>'rem_catch_credit_pediod',
                    'labels'=>[
                        [
                            'label'=>'REM CRED CAPACITACION, PERIODO',
                            'code_offset'=>-1,
                            'value_offset'=>2,
                            'next_label'=>''
                        ]
                    ]
                ],
        'C020' => [
                    'name'=>'exportations',
                    'labels'=>[
                        [
                            'label'=>'EXPORTACIONES MES',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''

                        ]
                    ]
        ],
        'C504' => [
                    'name'=>'rem_tax_credit_previous_month',
                    'labels'=>[
                        [
                            'label'=>'REMANENTE CREDITO MES ANTERIOR',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''

                        ]
                    ]
        ],
        'C514' => [
                    'name'=>'IVA_elect_doc_no_credit',
                    'labels'=>[
                        [
                            'label'=>'SIN DERECHO CRÉD. POR DCTOS.',
                            'code_offset'=>-1,
                            'value_offset'=>2,
                            'next_label'=>'ELECTRON.'

                        ]
                    ]
        ],
        'C525' => [
                    'name'=>'cred_recovered_reintegred_fixed_assets',
                    'labels'=>[
                        [
                            'label'=>'CRÉD. RECUP. Y REINT. FACT. ACTIVO FIJO',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''

                        ]
                    ]
        ],
        'C532' => [
                    'name'=>'debit_memo_cred_recup_reint',
                    'labels'=>[
                        [
                            'label'=>'NOTAS DE DÉBITO CRÉD, RECUP. Y REINT.',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''

                        ]
                    ]
        ],
        'C535' => [
                    'name'=>'cred_rec_reint_tax_payment',
                    'labels'=>[
                        [
                            'label'=>'CRÉD, RECUP. Y REINT. PAGO IMP. DEL',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''

                        ]
                    ]
        ],
        'C547' => [
                    'name'=>'determ_total',
                    'labels'=>[
                        [
                            'label'=>'TOTAL DETERMINADO',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''

                        ]
                    ]
        ],        
        'C077' => [
                    'name'=>'fiscal_credit_rem',
                    'labels'=>[
                        [
                            'label'=>'REMANENTE DE CRÉDITO FISC.',
                            'code_offset'=>-1,
                            'value_offset'=>1,
                            'next_label'=>''

                        ]
                    ]
        ]




        
    ];

    /**
     * Extracts all the information contained
     * in the F29 forms of the CTE document
     * @return array Parsed F29 Forms
     */
    public function extract($xml)
    {
        $this->fields = $this->helper->order_fields_labels_by_length($this->fields);
        $result = [];
        $pages = $this->getF29Pages($xml);

        foreach ($pages as $key => $pageNumber) {
            foreach ($xml['page'][$pageNumber]['text'] as $position => $content) {
                $content = $this->helper->extract_value($content);

                foreach ($this->fields as $label => $field) {
                    foreach ($field['labels'] as $key => $option) {                         
                        if ($this->helper->startsWith(strtoupper($content), $option['label'])) {
                            if ($option['next_label']!='') {
                                $next_label = $this->helper->extract_value($xml['page'][$pageNumber]['text'][$position + 1]);
                                if ($this->helper->startsWith($next_label, $option['next_label'])) {
                                    
                                    $value = $this->helper->extract_value($xml['page'][$pageNumber]['text'][$position + $option['value_offset']]);
                                    $result[$pageNumber][$label] =$value;
                                    break;
                                }
                            } else {
                               
                                $value = $this->helper->extract_value($xml['page'][$pageNumber]['text'][$position + $option['value_offset']]);
                                $result[$pageNumber][$label] =$value;
                                break;
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
    private function getF29Pages($xml)
    {
        $F29Pages = [];
        foreach ($xml['page'] as $number => $page) {
            foreach ($page['text'] as $position => $content) {
                if (is_array($content)) {
                    $content = $content['b'];
                }
                if ($content == 'FORMULARIO 29') {
                    array_push($F29Pages, $number);
                }
            }
        }

        return $F29Pages;
    }
}
