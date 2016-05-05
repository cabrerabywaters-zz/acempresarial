<?php
namespace acempresarial\Repositories\CTE;

use acempresarial\Models\Cte;

/**
*
*/
class CteRepository
{
    /**
     * Gets the information that is relevant for the
     * Evaluation
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
     public function getRelevantInfo($id)
     {
         $f22Fields =
         [
            'C18' ,'C82' ,'C122' ,
            'C123' ,'C366','C628' ,
            'C629','C630' ,'C631' ,
            'C632' ,'C633' ,'C635' ,
            'C637' ,'C638' ,'C643' ,
            'C645' ,'C647' ,'C651' ,
            'C839' ,'C893' ,'C894',
            'cte_id','id','tax_year'
            
         ];

         $f29Fields=
         [
	        'C111','C142','C020',
	        'C502','C504','C510',
	        'C514','C520','C525',
	        'C527','C532','C535',
	        'C547','C077','C15',
	        'cte_id','id'
         ];

         $cte = Cte::findOrFail($id);
         $cte->load(
             [
                 'f29s' => function ($query) use($f29Fields) {
                    $query->select($f29Fields);
                },
            
                 'f22s' => function ($query) use($f22Fields){
                    $query->select($f22Fields);
                },
            
                 'company' => function ($query) {
                    $query->select(['id']);
                }
            ]

        );
         
         return $cte;
     }
}
