<?php

namespace acempresarial\Http\Controllers;

use Illuminate\Http\Request;
use acempresarial\Http\Requests;

//use Htmldom;

class CTEsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cte.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * PDF upload for the CTE
     * @param  Request $request PDF
     * @param  [type]  $user_id User's ID
     * @return json           success/fail
     */
    public function upload(Request $request, $user_id)
    {
        function extract_value($content)
        {
            if (is_array($content)) {
                $content = $content['b'];
            }
            return $content;
        }

        function startsWith($haystack, $needle)
        {
            // search backwards starting from haystack length characters from the end
   			 return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
        }
        $file = $request->file('file');

        ////////////////////////////////////////////
       //Format File Name and Save IT
       ////////////////////////////////////////////

       $name = time() . $file->getClientOriginalName();

        $raw_name = pathinfo($name, PATHINFO_FILENAME);

        $path = "uploads/ctes/$user_id/";

        $file->move($path, $name);
        ////////////////////////////////////////////
        //Unluck the PDF
        ////////////////////////////////////////////
         $cmmd_unlock = "gs -dSAFER -dBATCH -dNOPAUSE -sDEVICE=pdfwrite -sPDFPassword= -DFSETTINGS=/prepress -dPassThroughJPEGImages=true -sOutputFile=".$path."unlock_".$name." ".$path.$name;

        $exec_unluck = exec($cmmd_unlock, $out, $err);
         ////////////////////////////////////////////
         //Extract XML from PDF
         ///////////////////////////////////////////

        $cmmd_extract = "pdftohtml -xml -enc UTF-8 ".$path."unlock_".$name." ".$path.$raw_name.".xml";
        $exec_parse = exec($cmmd_extract, $out, $err);

        ////////////////////////////////////////////
        //Parse XML
        ////////////////////////////////////////////

        $xml = simplexml_load_file($path.$raw_name.".xml");
        $xml = json_decode(json_encode((array)$xml), true);


        $Cte = [];
            ////////////////////////////////////////////
            //Parses the first Page of the CTE
            ////////////////////////////////////////////
                
            foreach ($xml['page'][0]['text'] as $position => $content) {
                if ($content == "Nombre del emisor:") {
                    $Cte['primary_information']['issuer'] = $xml['page'][0]['text'][$position + 1];
                }
                if ($content == 'RUT del emisor:') {
                    $Cte['primary_information']['issuer_rut'] = $xml['page'][0]['text'][$position + 1];
                }
                if ($content == 'Fecha de generación de la carpeta:') {
                    $Cte['primary_information']['folder_issue_date'] = $xml['page'][0]['text'][$position + 1];
                }
                if ($content == 'Fecha de Inicio de Actividades:') {
                    $Cte['primary_information']['activities_start_date'] = $xml['page'][0]['text'][$position + 1];
                }
                if ($content == 'Actividades Económicas:') {
                    $next = 1;
                    while ($xml['page'][0]['text'][$position + $next] != "Categoría tributaria:") {
                        $Cte['primary_information']['economic_activities'][] = $xml['page'][0]['text'][$position + $next];
                        $next++;
                    }
                }
                if ($content == 'Categoría tributaria:') {
                    $Cte['primary_information']['tax_category'] = $xml['page'][0]['text'][$position + 1];
                }
                if ($content == 'Domicilio:') {
                    $Cte['primary_information']['address'] = $xml['page'][0]['text'][$position + 1];
                }
                if ($content == 'Últimos documentos timbrados:') {
                    $next = 1;
                    while ($xml['page'][0]['text'][$position + $next] != "Observaciones tributarias:") {
                        $Cte['primary_information']['lasts_stamped_documents'][] = $xml['page'][0]['text'][$position + $next];
                        $next++;
                    }
                }
            }

            ////////////////////////////////////////////
            //Parses All F29 FORMS
            ////////////////////////////////////////////
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
        foreach ($F29Pages as $key => $pageNumber) {
            foreach ($xml['page'][$pageNumber]['text'] as $position => $content) {
                $content = extract_value($content);
                
                if ($content == 'FOLIO') {
                    $Cte['forms']['f29'][$pageNumber]['folio'] =

                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 2])

                   ] ;
                }
                if ($content == 'RUT') {
                    $Cte['forms']['f29'][$pageNumber]['rut'] =

                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 2])

                   ] ;
                }
                  if (startsWith($content, 'PERIODO') ) {
                    $Cte['forms']['f29'][$pageNumber]['period'] =

                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 2])

                   ] ;
                }

                if (strtoupper($content) == 'PPM NETO DET.') {
                    $Cte['forms']['f29'][$pageNumber]['net_ppm_det'] =

                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                    if (strtoupper($content) == 'IMP. DETERM. IVA DETERM.') {
                    $Cte['forms']['f29'][$pageNumber]['iva_tax_det'] =

                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                 if (strtoupper($content) == 'CANT. DE DCTOS. BOLETAS') {
                    $Cte['forms']['f29'][$pageNumber]['qty_receipt_documents'] =

                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                if (strtoupper($content) == 'DÉBITOS / BOLETAS') {
                    $Cte['forms']['f29'][$pageNumber]['debits_receipts'] =

                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                   if (strtoupper($content) == 'TASA PPM 1RA. CATEGORIA') {
                    $Cte['forms']['f29'][$pageNumber]['first_category_ppm_rate'] =

                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                  if (strtoupper($content) == 'VENTAS Y/O SERV. EXENTOS O NO') {
                    $Cte['forms']['f29'][$pageNumber]['sells_or_services_exempt_or_not'] =

                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 2])

                   ] ;
                }
                 if (strtoupper($content) == 'RET, TASAS DE 10 % SOBRE LAS RENT.') {
                    $Cte['forms']['f29'][$pageNumber]['10_percent_rate_retention_over_rent'] =

                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                 if (strtoupper($content) == 'DÉBITOS FACTURAS EMITIDAS') {
                    $Cte['forms']['f29'][$pageNumber]['debt_issued_invoices'] =

                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                  if (strtoupper($content) == 'CANTIDAD FACTURAS EMITIDAS') {
                    $Cte['forms']['f29'][$pageNumber]['qty_issued_invoices'] =

                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                if (strtoupper($content) == 'CANT. DCTOS. NOTAS DE CRÉDITOS') {
                    $Cte['forms']['f29'][$pageNumber]['qty_credit_memo'] =

                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 2])

                   ] ;
                }
                 if (strtoupper($content) == 'DÉBITOS NOTAS DE CRÉDITOS EMITIDAS') {
                    $Cte['forms']['f29'][$pageNumber]['debt_issued_credit_memo'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                if (strtoupper($content) == 'CRÉD. IVA POR DCTOS. ELECTRONICOS') {
                    $Cte['forms']['f29'][$pageNumber]['credit_iva_tax_electronic_documents'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }

                if (strtoupper($content) == 'N° FACT. COMPRAS REC. RET. TOT. E') {
                    $Cte['forms']['f29'][$pageNumber]['qty_buy_invoice_rec_ret_tot_e'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 2])

                   ] ;
                }
                 if (strtoupper($content) == 'CANT. DE DCTOS. FACT. RECIB. DEL GIRO') {
                    $Cte['forms']['f29'][$pageNumber]['qty_invoices_received_from_activity'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                if (strtoupper($content) == 'CRÉDITO REC. Y REINT./FACT. DEL GIRO') {
                    $Cte['forms']['f29'][$pageNumber]['credit_rec_reint_fact_from_activity'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                if (strtoupper($content) == 'CANT. NOTAS DE CRÉDITO RECIBIDAS') {
                    $Cte['forms']['f29'][$pageNumber]['qty_received_credit_memo'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                 if (strtoupper($content) == 'CRÉDITO RECUP. Y REINT NOTAS DE CRÉD') {
                    $Cte['forms']['f29'][$pageNumber]['credit_recup_reint_credit_memo'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                if (strtoupper($content) == 'TOTAL CRÉDITOS') {
                    $Cte['forms']['f29'][$pageNumber]['total_credits'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                if (strtoupper($content) == 'TOTAL DÉBITOS') {
                    $Cte['forms']['f29'][$pageNumber]['total_debits'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                 if (strtoupper($content) == 'TOTAL DETERMINADO') {
                    $Cte['forms']['f29'][$pageNumber]['determined_total'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                if (strtoupper($content) == 'TOTAL DETERMINADO') {
                    $Cte['forms']['f29'][$pageNumber]['determined_total'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                if (strtoupper($content) == 'BASE IMPONIBLE') {
                    $Cte['forms']['f29'][$pageNumber]['taxable_income'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                if (strtoupper($content) == 'REMANENTE ANT. CAMBIO SUJ. PER.') {
                    $Cte['forms']['f29'][$pageNumber]['previous_remainder_change_suj_per'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 2])

                   ] ;
                }
                  if (strtoupper($content) == 'MONTO NETO, FACT. DE COMP. RECIBIDAS') {
                    $Cte['forms']['f29'][$pageNumber]['net_amount_buy_invoices_received'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 2])

                   ] ;
                }
                if (strtoupper($content) == 'SUB TOTAL IMP. DETERMINADO ANVERSO') {
                    $Cte['forms']['f29'][$pageNumber]['sub_total_determined_tax_front'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                if (strtoupper($content) == 'ANTICIPO A IMPUTAR / CAMBIO DE SUJ.') {                	
                    $Cte['forms']['f29'][$pageNumber]['imputable_changable_advances_suj'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 1])

                   ] ;
                }
                 if (strtoupper($content) == 'TOTAL CREDITO CAPACITACION A') {                	
                    $Cte['forms']['f29'][$pageNumber]['total_imputable_catch_credit'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 2])

                   ] ;
                }
                if (strtoupper($content) == 'REM CRED CAPACITACION, PERIODO') {                	
                    $Cte['forms']['f29'][$pageNumber]['rem_catch_credit_pediod'] =
                   [
                           'code'=>extract_value($xml['page'][$pageNumber]['text'][$position - 1]),
                           'value'=>extract_value($xml['page'][$pageNumber]['text'][$position + 2])

                   ] ;
                }


            }
        }
        ////////////////////////////////////////////
        //Parses All F22 FORMS
        ////////////////////////////////////////////
       
        dd($Cte);
       

     
        return 'Done';
    }
}
