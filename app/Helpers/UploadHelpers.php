<?php
namespace acempresarial\Helpers;

use Illuminate\Http\UploadedFile;

/**
*
*/
class UploadHelpers
{
    public function __construct(UploadedFile $file, $uploadPath)
    {
        $this->name = time() . $file->getClientOriginalName();
        $this->raw_name = pathinfo($this->name, PATHINFO_FILENAME);
        $this->path = $uploadPath ;
        $this->file = $file;
    }

    /**
     * Moves the file to the desire path
     * @return [type] [description]
     */
    public function move()
    {
    	$this->file->move($this->path, $this->name);    	
    }
}
