<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembayaranRequest;
use App\Interfaces\PembayaranInterface;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    protected $pembayaranInterface;
    public function __construct(PembayaranInterface $pembayaranInterface)
    {
        $this->pembayaranInterface = $pembayaranInterface;
        $this->middleware('auth:user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result     = $this->pembayaranInterface->getAll();
        $tagihan    = $this->pembayaranInterface->getAllTagihan();
        return view('pembayaran.index', compact('result', 'tagihan'));
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
    public function store(PembayaranRequest $request)
    {
        return $this->pembayaranInterface->requestUser($request) == true ? redirect()->route('pembayaran.index') : redirect()->route('pembayaran.index');
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
    public function update(PembayaranRequest $request, $id)
    {
        return $this->pembayaranInterface->requestUser($request, $id) == true ? redirect()->route('pembayaran.index') : redirect()->route('pembayaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->pembayaranInterface->delete($id) == true ? redirect()->back() : redirect()->back();
    }
}
