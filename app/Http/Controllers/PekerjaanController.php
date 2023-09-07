<?php

namespace App\Http\Controllers;
use App\Http\Requests\PekerjaanRequest;
use App\Interfaces\PekerjaanInterface;

use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    protected $pekerjaanInterface;
    public function __construct(PekerjaanInterface $pekerjaanInterface)
    {
        $this->pekerjaanInterface = $pekerjaanInterface;
        $this->middleware('auth:user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->pekerjaanInterface->getAll();
        $tipekerjaan = $this->pekerjaanInterface->getAllTipePekerjaan();
        return view('pekerjaan.index', compact('result', 'tipekerjaan'));
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
    public function store(PekerjaanRequest $request)
    {
        return $this->pekerjaanInterface->requestUser($request) == true ? redirect()->route('pekerjaan.index') : redirect()->back();
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
    public function update(PekerjaanRequest $request, $id)
    {
        return $this->pekerjaanInterface->requestUser($request, $id) == true ? redirect()->back() : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->pekerjaanInterface->delete($id) == true ? redirect()->back() : redirect()->back();
    }
}
