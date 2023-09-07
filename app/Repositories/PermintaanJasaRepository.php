<?php

namespace App\Repositories;

use App\Http\Requests\PermintaanJasaRequest;
use App\Interfaces\PermintaanJasaInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\{PermintaanJasa, Pekerjaan, Proyek};
use DB;

class PermintaanJasaRepository implements PermintaanJasaInterface
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
            $permintaanjasa = PermintaanJasa::with(['pekerjaan', 'proyek'])->get();
            return $permintaanjasa;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getById($id)
    {
        try {
            $permintaanjasa = PermintaanJasa::find($id);
            
            // Check the permintaanjasa
            if(!$permintaanjasa) return "No permintaanjasa with ID $id";
            return $permintaanjasa;

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function requestUser(PermintaanJasaRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            $permintaanjasa = $id ? PermintaanJasa::find($id) : new PermintaanJasa;

            // Check the permintaanjasa  
            if($id && !$permintaanjasa) return  "No user with ID $id";

            // Save the permintaanjasa
            $permintaanjasa->pekerjaan_id = $request->pekerjaan_id;
            $permintaanjasa->proyek_id    = $request->proyek_id;
            $permintaanjasa->save();
            
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
            $permintaanjasa = PermintaanJasa::find($id);
            if(!$permintaanjasa) return "No permintaanjasa with ID $id";
            $permintaanjasa->delete();
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
