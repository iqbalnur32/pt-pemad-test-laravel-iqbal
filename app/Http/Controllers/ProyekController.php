<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProyekRequest;
use App\Interfaces\ProyekInterface;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    protected $proyekInterface;
    public function __construct(ProyekInterface $proyekInterface)
    {
        $this->proyekInterface = $proyekInterface;
        $this->middleware('auth:user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->proyekInterface->getAll();
        $klien  = $this->proyekInterface->getAllKlien();
        
        return view('proyek.index', compact('result', 'klien'));
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
    public function store(ProyekRequest $request)
    {
        return $this->proyekInterface->requestUser($request) == true ? redirect()->route('proyek.index') : redirect()->back();
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
    public function update(ProyekRequest $request, $id)
    {
        return $this->proyekInterface->requestUser($request, $id) == true ? redirect()->route('proyek.index') : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->proyekInterface->delete($id) == true ? redirect()->back() : redirect()->back();
    }
}
