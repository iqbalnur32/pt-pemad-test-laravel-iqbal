<?php

namespace App\Repositories;

use App\Http\Requests\PesananRequest;
use App\Interfaces\PesananInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\{PesananPembelian, TipePekerjaan};
use DB;

class PesananRepository implements PesananInterface
{

    public function getAllTipePekerjaan()
    {
        try {
            $tipepekerjaan = TipePekerjaan::all();
            return $tipepekerjaan;
        } catch(\Exception $e) {
            return $e->getMessage();
        }   
    }

    public function getAll()
    {
        try {
            $pesanan = PesananPembelian::with(['tipepekerjaan'])->get();
            return $pesanan;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getById($id)
    {
        try {
            $pesanan = PesananPembelian::find($id);
            
            // Check the pesanan
            if(!$pesanan) return "No pesanan with ID $id";
            return $pesanan;

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function requestUser(PesananRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            $pesanan = $id ? PesananPembelian::find($id) : new PesananPembelian;

            // Check the pesanan  
            if($id && !$pesanan) return  "No user with ID $id";

            // Save the pesanan
            $pesanan->jumlah                 = $request->jumlah;
            $pesanan->tipe_pekerjaan_id      = $request->tipe_pekerjaan_id;
            $pesanan->save();

            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            // dd($e->getMessage());
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $pesanan = PesananPembelian::find($id);
            if(!$pesanan) return "No pesanan with ID $id";
            $pesanan->delete();
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
