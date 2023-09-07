<?php
namespace App\Repositories;

use App\Http\Requests\ProyekRequest;
use App\Interfaces\ProyekInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Bahasa};
use DB;

class ProyekRepository implements ProyekInterface
{
    public function getAll()
    {
        try {
            $bahasa = Bahasa::all();
            return $bahasa;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getById($id)
    {
        try {
            $bahasa = Bahasa::find($id);
            
            // Check the proyek
            if(!$bahasa) return "No proyek with ID $id";
            return $bahasa;

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function requestUser(ProyekRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            $bahasa = $id ? Bahasa::find($id) : new Bahasa;

            // Check the proyek  
            if($id && !$bahasa) return  "No bahasa with ID $id";

            // Save the proyek
            $bahasa->nama       = $request->nama;
            $bahasa->value      = $request->value;
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
            $bahasa = Bahasa::find($id);
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
