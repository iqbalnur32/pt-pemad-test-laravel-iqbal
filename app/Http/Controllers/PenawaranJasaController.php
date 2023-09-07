<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenawaranJasaRequest;
use App\Interfaces\PenawaranJasaInterface;
use Illuminate\Http\Request;

class PenawaranJasaController extends Controller
{
    protected $penwaranJasaInterface;
    public function __construct(PenawaranJasaInterface $penwaranJasaInterface)
    {
        $this->penwaranJasaInterface = $penwaranJasaInterface;
        $this->middleware('auth:user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result     = $this->penwaranJasaInterface->getAll();
        $pekerjaan  = $this->penwaranJasaInterface->getPekerjaan();
        $proyek     = $this->penwaranJasaInterface->getProyek(); 
        return view('penawaranjasa.index', compact('result', 'pekerjaan', 'proyek'));
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
    public function store(PenawaranJasaRequest $request)
    {
        return $this->penwaranJasaInterface->requestUser($request) == true ? redirect()->route('penawaranjasa.index') : redirect()->back();
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
    public function update(PenawaranJasaRequest $request, $id)
    {
        // dd($this->penwaranJasaInterface->requestUser($request, $id)); die;
        return $this->penwaranJasaInterface->requestUser($request, $id) == true ? redirect()->route('penawaranjasa.index') : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->penwaranJasaInterface->delete($id) == true ? redirect()->back() : redirect()->back();
    }
}
