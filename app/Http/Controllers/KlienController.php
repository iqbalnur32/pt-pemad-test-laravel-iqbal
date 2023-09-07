<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\klienRequest;
use App\Interfaces\KlienInterface;

class KlienController extends Controller
{
    protected $klienInterface;
    public function __construct(KlienInterface $klienInterface)
    {
        $this->klienInterface = $klienInterface;
        $this->middleware('auth:user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klien = $this->klienInterface->getAll();
        return view('klien.index')->with('klien', $klien);
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
    public function store(klienRequest $request)
    {
        return $this->klienInterface->requestUser($request) == true ? redirect()->back() : redirect()->back();
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
    public function update(KlienRequest $request, $id)
    {
        return $this->klienInterface->requestUser($request, $id) == true ? redirect()->back() : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->klienInterface->delete($id) == true ? redirect()->back() : redirect()->back();
    }
}
