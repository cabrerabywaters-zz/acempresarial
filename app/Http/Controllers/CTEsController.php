<?php

namespace acempresarial\Http\Controllers;

use Illuminate\Http\Request;
use acempresarial\Http\Requests;
use acempresarial\Repositories\CTE\CteUploaderRepository;
use acempresarial\Repositories\CTE\CteSaverRepository;
use acempresarial\Models\Cte;
use Auth;
use acempresarial\Repositories\CTE\CteEvaluationRepository;
use acempresarial\Repositories\CTE\CteValidators\CteArrayValidator;
use acempresarial\Repositories\CTE\CteRepository;

class CTEsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    	
        $ctes = Cte::where('user_id','=',Auth::user()->id)
                ->orderBy('created_at','DESC')->get();

        $f29_count = 0;
        $f22_count = 0;
        foreach ($ctes as $cte) {
           
           $f29_count = $f29_count + $cte->f29s->count();
           $f22_count = $f22_count + $cte->f22s->count();
        }    

        return view('cte.index', compact('ctes','f29_count','f22_count'));
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
    public function show(CteRepository $cte,$id)
    {       
        $cte = $cte->getRelevantInfo($id);             

        return view('cte.show',compact('cte'));
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
     * @param  int  $user_id User's ID
     * @return json           success/fail
     */
    public function upload(Request $request, $user_id,
    	CteUploaderRepository $uploadManager, CteSaverRepository $cte, CteArrayValidator $validator)
    {     
        $file = $request->file('file'); 
            
        $CTE = $uploadManager->upload($file,"uploads/ctes/$user_id/");

       // $validator->validate($CTE);

        $CTE = $cte->store($CTE);
     
        return 'Done';
    }

    public function uploader()
    {
    	return view('cte.upload');
    }
}
