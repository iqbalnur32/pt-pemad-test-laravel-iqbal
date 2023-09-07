<?php

namespace App\Repositories;

use App\Http\Requests\klienRequest as KlienRequest;
use App\Interfaces\KlienInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Klien;
use DB;

class KlienRepository implements KlienInterface
{
    public function getAll()
    {
        try {
            $klien = Klien::all();
            return $klien;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getUserById($id)
    {
        try {
            $klien = Klien::find($id);
            
            // Check the klien
            if(!$klien) return "No klien with ID $id";
            return $klien;

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function requestUser(KlienRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            $klien = $id ? Klien::find($id) : new Klien;

            // Check the klien 
            if($id && !$klien) return  "No user with ID $id";

            $klien->nama       = $request->nama;
            $klien->alamat     = $request->alamat;
            $klien->telepon    = $request->telepon ?? 0;
            $klien->email      = preg_replace('/\s+/', '', strtolower($request->email)); // Remove a whitespace and make to lowercase

            // Save the klien 
            $klien->save();
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
            $klien = Klien::find($id);
            if(!$klien) return "No klien with ID $id";
            $klien->delete();
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
