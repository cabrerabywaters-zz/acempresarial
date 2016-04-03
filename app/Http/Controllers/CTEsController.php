<?php

namespace acempresarial\Http\Controllers;

use Illuminate\Http\Request;
use acempresarial\Http\Requests;
use acempresarial\Repositories\CTE\CteUploaderRepository;
use acempresarial\Repositories\PDF\XmlExtractorRepository;

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
    public function upload(Request $request, $user_id,
    	CteUploaderRepository $uploadManager,XmlExtractorRepository $extractor)
    {
      
        $file = $request->file('file');      
        $Cte = $uploadManager->upload($file,"uploads/ctes/$user_id/");            

     
        return 'Done';
    }
}
