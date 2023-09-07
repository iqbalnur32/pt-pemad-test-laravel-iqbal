<?php
namespace App\Repositories;

use App\Http\Requests\ReferensiPerusahaanRequest;
use App\Interfaces\ReferensiPerusahaanInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\{ReferensiPerusahaan};
use DB;

class ReferensiPerusahaanRepository implements ReferensiPerusahaanInterface
{
    public function getAll()
    {
        try {
            $perusahaan = ReferensiPerusahaan::all();
            return $perusahaan;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getById($id)
    {
        try {
            $perusahaan = ReferensiPerusahaan::find($id);
            
            // Check the perusahaan
            if(!$perusahaan) return "No perusahaan with ID $id";
            return $perusahaan;

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function requestUser(ReferensiPerusahaanRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            $perusahaan = $id ? ReferensiPerusahaan::find($id) : new ReferensiPerusahaan;

            // Check the perusahaan  
            if($id && !$perusahaan) return  "No user with ID $id";

            // Save the perusahaan
            $perusahaan->email             = $request->email;
            $perusahaan->bank              = $request->bank;
            $perusahaan->bank_name         = $request->bank_name;
            $perusahaan->bank_rekening     = $request->bank_rekening;
            $perusahaan->nama              = $request->nama;
            $perusahaan->jenis             = $request->jenis;
            $perusahaan->nilai             = $request->nilai;
            $perusahaan->save();
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
            $perusahaan = ReferensiPerusahaan::find($id);
            if(!$perusahaan) return "No perusahaan with ID $id";
            $perusahaan->delete();
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
