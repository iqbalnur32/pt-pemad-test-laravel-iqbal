<?php

namespace App\Repositories;

use App\Http\Requests\PenawaranJasaRequest;
use App\Interfaces\PenawaranJasaInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\{PenawaranJasa, Pekerjaan, Proyek};
use DB;

class PernawaranJasaRepository implements PenawaranJasaInterface
{

    public function getPekerjaan()
    {
        try {
            $pekerjaan = Pekerjaan::all();
            return $pekerjaan;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getProyek() 
    {
        try {
            $proyek = Proyek::all();
            return $proyek;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAll()
    {
        try {
            $penawaranjasa = PenawaranJasa::with(['pekerjaan', 'proyek'])->get();
            return $penawaranjasa;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getById($id)
    {
        try {
            $penawaranjasa = PenawaranJasa::find($id);
            
            // Check the penawaranjasa
            if(!$penawaranjasa) return "No penawaranjasa with ID $id";
            return $penawaranjasa;

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function requestUser(PenawaranJasaRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            $penawaranjasa = $id ? PenawaranJasa::find($id) : new PenawaranJasa;

            // Check the penawaranjasa  
            if($id && !$penawaranjasa) return  "No user with ID $id";

            // Save the penawaranjasa
            $penawaranjasa->pekerjaan_id = $request->pekerjaan_id;
            $penawaranjasa->proyek_id    = $request->proyek_id;
            $penawaranjasa->harga        = $request->harga;
            $penawaranjasa->save();
            
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $penawaranjasa = PenawaranJasa::find($id);
            if(!$penawaranjasa) return "No penawaranjasa with ID $id";
            $penawaranjasa->delete();
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
