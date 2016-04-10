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
                    'folio' => [
                                    'label'=>'FOLIO',
                                    'code_offset'=>1,
                                    'value_offset'=>2,
                                    'name'=>'folio'
                                ],
                    'rut' => [
                                    'label'=>'RUT',
                                    'code_offset'=>1,
                                    'value_offset'=>2,
                                    'name'=>'rut'
                                ],
                    'period' => [
                                    'label'=>'PERIODO',
                                    'code_offset'=>1,
                                    'value_offset'=>2,
                                    'name'=>'period'
                                ],
                    'net_ppm_det' => [
                                    'label'=>'PPM NETO DET.',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'net_ppm_det'
                                ],
                    'iva_tax_det' => [
                                    'label'=>'IMP. DETERM. IVA DETERM.',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'iva_tax_det'
                                ],
                    'qty_receipt_documents' => [
                                    'label'=>'CANT. DE DCTOS. BOLETAS',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'qty_receipt_documents'
                                ],
                    'debits_receipts' => [
                                    'label'=>'DÉBITOS / BOLETAS',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'debits_receipts'
                                ],
                    'first_category_ppm_rate' => [
                                    'label'=>'TASA PPM 1RA. CATEGORIA',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'first_category_ppm_rate'
                                ],
                    'sells_or_services_exempt_or_not' => [
                                    'label'=>'VENTAS Y/O SERV. EXENTOS O NO',
                                    'code_offset'=>-1,
                                    'value_offset'=>2,
                                    'name'=>'sells_or_services_exempt_or_not'
                                ],
                    '10_percent_rate_retention_over_rent' => [
                                    'label'=>'RET, TASAS DE 10 % SOBRE LAS RENT.',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'10_percent_rate_retention_over_rent'
                                ],
                    'debt_issued_invoices' => [
                                    'label'=>'DÉBITOS FACTURAS EMITIDAS',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'debt_issued_invoices'
                                ],
                    'qty_issued_invoices' => [
                                    'label'=>'CANTIDAD FACTURAS EMITIDAS',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'qty_issued_invoices'
                                ],
                    'qty_credit_memo' => [
                                    'label'=>'CANT. DCTOS. NOTAS DE CRÉDITOS',
                                    'code_offset'=>-1,
                                    'value_offset'=>2,
                                    'name'=>'qty_credit_memo'
                                ],
                    'debt_issued_credit_memo' => [
                                    'label'=>'DÉBITOS NOTAS DE CRÉDITOS EMITIDAS',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'debt_issued_credit_memo'
                                ],
                    'credit_iva_tax_electronic_documents' => [
                                    'label'=>'CRÉD. IVA POR DCTOS. ELECTRONICOS',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'credit_iva_tax_electronic_documents'
                                ],
                    'qty_buy_invoice_rec_ret_tot_e' => [
                                    'label'=>'N° FACT. COMPRAS REC. RET. TOT. E',
                                    'code_offset'=>-1,
                                    'value_offset'=>2,
                                    'name'=>'qty_buy_invoice_rec_ret_tot_e'
                                ],
                    'qty_invoices_received_from_activity' => [
                                    'label'=>'CANT. DE DCTOS. FACT. RECIB. DEL GIRO',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'qty_invoices_received_from_activity'
                                ],
                    'credit_rec_reint_fact_from_activity' => [
                                    'label'=>'CRÉDITO REC. Y REINT./FACT. DEL GIRO',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'credit_rec_reint_fact_from_activity'
                                ],
                    'qty_received_credit_memo' => [
                                    'label'=>'CANT. NOTAS DE CRÉDITO RECIBIDAS',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'qty_received_credit_memo'
                                ],
                    'credit_recup_reint_credit_memo' => [
                                    'label'=>'CRÉDITO RECUP. Y REINT NOTAS DE CRÉD',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'credit_recup_reint_credit_memo'
                                ],
                    'total_credits' => [
                                    'label'=>'TOTAL CRÉDITOS',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'total_credits'
                                ],
                    'total_debits' => [
                                    'label'=>'TOTAL DÉBITOS',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'total_debits'
                                ],
                    'determined_total' => [
                                    'label'=>'TOTAL DETERMINADO',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'determined_total'
                                ],
                    'taxable_income' => [
                                    'label'=>'BASE IMPONIBLE',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'taxable_income'
                                ],
                    'previous_remainder_change_suj_per' => [
                                    'label'=>'REMANENTE ANT. CAMBIO SUJ. PER.',
                                    'code_offset'=>-1,
                                    'value_offset'=>2,
                                    'name'=>'previous_remainder_change_suj_per'
                                ],
                    'net_amount_buy_invoices_received' => [
                                    'label'=>'MONTO NETO, FACT. DE COMP. RECIBIDAS',
                                    'code_offset'=>-1,
                                    'value_offset'=>2,
                                    'name'=>'net_amount_buy_invoices_received'
                                ],
                    'sub_total_determined_tax_front' => [
                                    'label'=>'SUB TOTAL IMP. DETERMINADO ANVERSO',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'sub_total_determined_tax_front'
                                ],
                    'imputable_changable_advances_suj' => [
                                    'label'=>'ANTICIPO A IMPUTAR / CAMBIO DE SUJ.',
                                    'code_offset'=>-1,
                                    'value_offset'=>1,
                                    'name'=>'imputable_changable_advances_suj'
                                ],
                    'total_imputable_catch_credit' => [
                                    'label'=>'TOTAL CREDITO CAPACITACION A',
                                    'code_offset'=>-1,
                                    'value_offset'=>2,
                                    'name'=>'total_imputable_catch_credit'
                                ],
                    'rem_catch_credit_pediod' => [
                                    'label'=>'REM CRED CAPACITACION, PERIODO',
                                    'code_offset'=>-1,
                                    'value_offset'=>2,
                                    'name'=>'rem_catch_credit_pediod'
                                ]

                ];

    /**
     * Extracts all the information contained
     * in the F29 forms of the CTE document
     * @return array Parsed F29 Forms
     */
    public function extract($xml)
    {
        $result = [];
        $pages = $this->getF29Pages($xml);

        foreach ($pages as $key => $pageNumber) {
            foreach ($xml['page'][$pageNumber]['text'] as $position => $content) {
                $content = $this->helper->extract_value($content);

                foreach ($this->fields as $label => $field) {
                    if (strtoupper($content) == $field['label']) {
                        $code = $this->helper->extract_value($xml['page'][$pageNumber]['text'][$position + $field['code_offset']]);
                        $value = $this->helper->extract_value($xml['page'][$pageNumber]['text'][$position + $field['value_offset']]);

                        $result[$pageNumber]['C'.$code.'_'.$field['name']] =$value;
                       
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
