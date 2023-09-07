<?php
namespace App\Http\Controllers;

use App\Http\Requests\TagihanRequest;
use App\Interfaces\TagihanInterface;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    protected $tagihanJasaInterface;
    public function __construct(TagihanInterface $tagihanJasaInterface)
    {
        $this->tagihannJasaInterface = $tagihanJasaInterface;
        $this->middleware('auth:user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result         = $this->tagihannJasaInterface->getAll();   
        $penawaranJasa  = $this->tagihannJasaInterface->getAllPenwaranJasa(); 

        return view('tagihan.index', compact('result', 'penawaranJasa'));
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
    public function store(TagihanRequest $request)
    {
        return $this->tagihannJasaInterface->requestUser($request) == true ? redirect()->route('tagihan.index') : redirect()->back();
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
    public function update(TagihanRequest $request, $id)
    {
        return $this->tagihannJasaInterface->requestUser($request, $id) == true ? redirect()->route('tagihan.index') : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->tagihannJasaInterface->delete($id) == true ? redirect()->route('tagihan.index') : redirect()->back();
    }
}
