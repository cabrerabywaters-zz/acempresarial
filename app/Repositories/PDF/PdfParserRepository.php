<?php
namespace acempresarial\Repositories\PDF;

use acempresarial\Helpers\UploadHelpers;

class PdfParserRepository
{
    /**
     * Parses the unlocked PDF to XML using
     * Linux's PDFTOHML library
     * @param  UploadHelpers $pdf [description]
     * @return [type]             [description]
     */
    public function parseToXml(UploadHelpers $pdf)
    {
    	$unlocked_pdf = $this->unlock($pdf);


        $cmmd_extract = 
        "pdftohtml -xml -i -enc UTF-8 ".$unlocked_pdf->unlocked_path." ".$unlocked_pdf->path.$unlocked_pdf->raw_name.".xml";

        $exec_parse = exec($cmmd_extract, $out, $err);
        dd('YOLO');
        $unlocked_pdf->xml_path = $unlocked_pdf->path.$unlocked_pdf->raw_name.".xml";

        return $unlocked_pdf;
    }

    /**
     * Makes a copy of the locked PDF
     * using Ghostscript
     * @return [type] [description]
     */
    private function unlock(UploadHelpers $pdf)
    {
        $cmmd_unlock = "gs -dSAFER -dBATCH -dNOPAUSE -sDEVICE=pdfwrite -sPDFPassword= -DFSETTINGS=/prepress -dPassThroughJPEGImages=true -sOutputFile=".$pdf->path."unlock_".$pdf->name." ".$pdf->path.$pdf->name;

        $exec_unluck = exec($cmmd_unlock, $out, $err);

        $pdf->unlocked_path = $pdf->path."unlock_".$pdf->name;

        return $pdf;
    }
}
