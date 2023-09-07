<?php

namespace App\Http\Controllers;

use App\Http\Requests\PesananRequest;
use App\Interfaces\PesananInterface;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    protected $pesananInterface;
    public function __construct(PesananInterface $pesananInterface)
    {
        $this->pesananInterface = $pesananInterface;
        $this->middleware('auth:user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result         = $this->pesananInterface->getAll();
        $tipePekerjaan  = $this->pesananInterface->getAllTipePekerjaan();
        return view('pesanan.index', compact('result', 'tipePekerjaan'));
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
    public function store(PesananRequest $request)
    {
        return $this->pesananInterface->requestUser($request) == true ? redirect()->route('pesanan.index') : redirect()->route('pesanan.index');
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
    public function update(PesananRequest $request, $id)
    {
        return $this->pesananInterface->requestUser($request, $id) == true ? redirect()->route('pesanan.index') : redirect()->route('pesanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->pesananInterface->delete($id) == true ? redirect()->back() : redirect()->back();
    }
}

