<?php
namespace App\Repositories;

use App\Http\Requests\ReferensiBahasaRequest;
use App\Interfaces\ReferensiBahasaInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\{ReferensiBahasa};
use DB;

class ReferensiBahasaRepository implements ReferensiBahasaInterface
{
    public function getAll()
    {
        try {
            $bahasa = ReferensiBahasa::all();
            return $bahasa;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getById($id)
    {
        try {
            $bahasa = ReferensiBahasa::find($id);
            
            // Check the bahasa
            if(!$bahasa) return "No bahasa with ID $id";
            return $bahasa;

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function requestUser(ReferensiBahasaRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            $bahasa = $id ? ReferensiBahasa::find($id) : new ReferensiBahasa;

            // Check the bahasa  
            if($id && !$bahasa) return  "No user with ID $id";

            // Save the bahasa
            $bahasa->nama              = $request->nama;
            $bahasa->level             = $request->level;
            $bahasa->save();
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
            $bahasa = ReferensiBahasa::find($id);
            if(!$bahasa) return "No bahasa with ID $id";
            $bahasa->delete();
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
