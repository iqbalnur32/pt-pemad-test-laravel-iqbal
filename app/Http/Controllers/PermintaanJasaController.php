<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermintaanJasaRequest;
use App\Interfaces\PermintaanJasaInterface;
use Illuminate\Http\Request;

class PermintaanJasaController extends Controller
{
    protected $permintaanJasaInterface;
    public function __construct(PermintaanJasaInterface $permintaanJasaInterface)
    {
        $this->permintaanJasaInterface = $permintaanJasaInterface;
        $this->middleware('auth:user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result     = $this->permintaanJasaInterface->getAll();
        $pekerjaan  = $this->permintaanJasaInterface->getPekerjaan();
        $proyek     = $this->permintaanJasaInterface->getProyek(); 
        return view('permintaanjasa.index', compact('result', 'pekerjaan', 'proyek'));
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
    public function store(PermintaanJasaRequest $request)
    {
        return $this->permintaanJasaInterface->requestUser($request) == true ? redirect()->route('permintaanjasa.index') : redirect()->back();
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
    public function update(PermintaanJasaRequest $request, $id)
    {
        return $this->permintaanJasaInterface->requestUser($request, $id) == true ? redirect()->route('permintaanjasa.index') : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->permintaanJasaInterface->delete($id) == true ? redirect()->route('permintaanjasa.index') : redirect()->back();
    }
}
