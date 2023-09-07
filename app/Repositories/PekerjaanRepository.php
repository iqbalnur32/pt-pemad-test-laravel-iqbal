<?php

namespace App\Repositories;

use App\Http\Requests\PekerjaanRequest;
use App\Interfaces\PekerjaanInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Pekerjaan, TipePekerjaan};
use DB;

class PekerjaanRepository implements PekerjaanInterface
{

    public function getAllTipePekerjaan()
    {
        try {
            $tipework = TipePekerjaan::all();
            return $tipework;
        } catch(\Exception $e) {
            return $e->getMessage();
        }   
    }

    public function getAll()
    {
        try {
            $tipework = Pekerjaan::all();
            return $tipework;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getById($id)
    {
        try {
            $tipework = Pekerjaan::find($id);
            
            // Check the tipework
            if(!$tipework) return "No tipework with ID $id";
            return $tipework;

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function requestUser(PekerjaanRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            $tipework = $id ? Pekerjaan::find($id) : new Pekerjaan;

            // Check the tipework  
            if($id && !$tipework) return  "No user with ID $id";

            // Save the tipework
            $tipework->nama                 = $request->nama;
            $tipework->tipe_pekerjaan_id    = $request->tipe_pekerjaan_id;
            $tipework->save();

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
            $tipework = Pekerjaan::find($id);
            if(!$tipework) return "No tipework with ID $id";
            $tipework->delete();
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
