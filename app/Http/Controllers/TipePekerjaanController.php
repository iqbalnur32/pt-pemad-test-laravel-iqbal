<?php

namespace App\Http\Controllers;
use App\Http\Requests\TipePekerjaanRequest;
use App\Interfaces\TipePekerjaanInterface;

use Illuminate\Http\Request;

class TipePekerjaanController extends Controller
{
    protected $tipePekerjaanInterface;
    public function __construct(TipePekerjaanInterface $tipePekerjaanInterface)
    {
        $this->tipePekerjaanInterface = $tipePekerjaanInterface;
        $this->middleware('auth:user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->tipePekerjaanInterface->getAll();
        return view('tipepekerjaan.index', compact('result')); 
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
    public function store(TipePekerjaanRequest $request)
    {
        return $this->tipePekerjaanInterface->requestUser($request) == true ? redirect()->route('tipepekerjaan.index') : redirect()->back();
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
    public function update(TipePekerjaanRequest $request, $id)
    {
        return $this->tipePekerjaanInterface->requestUser($request, $id) == true ? redirect()->route('tipepekerjaan.index') : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->tipePekerjaanInterface->delete($id) == true ? redirect()->route('tipepekerjaan.index') : redirect()->back();
    }
}
