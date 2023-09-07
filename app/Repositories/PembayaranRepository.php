<?php

namespace App\Repositories;

use App\Http\Requests\PembayaranRequest;
use App\Interfaces\PembayaranInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\{PembayaranPembelian, Tagihan};
use DB;

class PembayaranRepository implements PembayaranInterface
{

    public function getAllTagihan()
    {
        try {
            $tagihan = Tagihan::all();
            return $tagihan;
        } catch(\Exception $e) {
            return $e->getMessage();
        }   
    }

    public function getAll()
    {
        try {
            $pembayaran = PembayaranPembelian::with(['tagihan'])->get();
            return $pembayaran;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getById($id)
    {
        try {
            $pembayaran = PembayaranPembelian::find($id);
            
            // Check the pembayaran
            if(!$pembayaran) return "No pembayaran with ID $id";
            return $pembayaran;

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function requestUser(PembayaranRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            $pembayaran = $id ? PembayaranPembelian::find($id) : new PembayaranPembelian;

            // Check the pembayaran  
            if($id && !$pembayaran) return  "No user with ID $id";

            // Save the pembayaran
            $pembayaran->jumlah                 = $request->jumlah;
            $pembayaran->tagihan_id             = $request->tagihan_id;
            $pembayaran->save();

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
            $pembayaran = PembayaranPembelian::find($id);
            if(!$pembayaran) return "No pembayaran with ID $id";
            $pembayaran->delete();
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
