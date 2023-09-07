<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ReferensiPerusahaanRequest;
use App\Interfaces\ReferensiPerusahaanInterface;

class ReferensiPerusahaan extends Controller
{
    protected $referensiPerusahaanInterface;

    public function __construct(ReferensiPerusahaanInterface $referensiPerusahaanInterface)
    {
        $this->referensiPerusahaanInterface = $referensiPerusahaanInterface;
        $this->middleware('auth:user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->referensiPerusahaanInterface->getAll();
        return view('perusahaan.index', compact('result'));
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
    public function store(ReferensiPerusahaanRequest $request)
    {
        return $this->referensiPerusahaanInterface->requestUser($request) == true ? redirect()->route('perusahaan.index') : redirect()->back();
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
    public function update(ReferensiPerusahaanRequest $request, $id)
    {
        return $this->referensiPerusahaanInterface->requestUser($request, $id) == true ? redirect()->route('perusahaan.index') : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->referensiPerusahaanInterface->delete($id) == true ? redirect()->route('perusahaan.index') : redirect()->back();
    }
}

