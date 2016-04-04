<?php
namespace acempresarial\Repositories\CTE;

use Illuminate\Http\UploadedFile;
use acempresarial\Helpers\UploadHelpers;
use acempresarial\Repositories\PDF\PdfParserRepository;
use acempresarial\Repositories\PDF\XmlExtractorRepository;

class CteUploaderRepository
{
    private $pdf;
    private $xml;

    public function __construct(PdfParserRepository $pdf, XmlExtractorRepository $xml)
    {
        $this->pdf = $pdf;
        $this->xml = $xml;
    }
   
    /**
     * Formats the File and Uploads it to the correct project folder.
     * Then It Unlocks, Parse the PDF to XML and Formats it to array.
     * @param  UploadedFile $file
     * @return [type]             [description]
     */
    public function upload(UploadedFile $file, $path)
    {
        $file = new UploadHelpers($file, $path);
        $file->move();
        $file = $this->pdf->parseToXml($file);
        $CTE = $this->xml->parse($file);
        return $CTE;
    }
}
