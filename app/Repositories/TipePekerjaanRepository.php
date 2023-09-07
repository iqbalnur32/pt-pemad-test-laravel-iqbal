<?php

namespace App\Repositories;

use App\Http\Requests\TipePekerjaanRequest;
use App\Interfaces\TipePekerjaanInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipePekerjaan;
use DB;

class TipePekerjaanRepository implements TipePekerjaanInterface
{
    public function getAll()
    {
        try {
            $tipework = TipePekerjaan::all();
            return $tipework;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getById($id)
    {
        try {
            $tipework = TipePekerjaan::find($id);
            
            // Check the tipework
            if(!$tipework) return "No tipework with ID $id";
            return $tipework;

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function requestUser(TipePekerjaanRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            $tipework = $id ? TipePekerjaan::find($id) : new TipePekerjaan;

            // Check the tipework  
            if($id && !$tipework) return  "No user with ID $id";

            // Save the tipework
            $tipework->nama       = $request->nama;
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
            $tipework = TipePekerjaan::find($id);
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
