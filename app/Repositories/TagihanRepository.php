<?php
namespace App\Repositories;

use App\Http\Requests\TagihanRequest;
use App\Interfaces\TagihanInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\{PenawaranJasa, Tagihan};
use DB;

class TagihanRepository implements TagihanInterface
{
   public function getAllPenwaranJasa() {
        try {
            $penawaran = PenawaranJasa::with(['pekerjaan', 'proyek'])->get();
            return $penawaran;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAll()
    {
        try {
            $tagihan = Tagihan::with(['PenawaranJasa'])->get();
            return $tagihan;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getById($id)
    {
        try {
            $tagihan = Tagihan::find($id);
            
            // Check the tagihan
            if(!$tagihan) return "No tagihan with ID $id";
            return $tagihan;

        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function requestUser(TagihanRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            $tagihan = $id ? Tagihan::find($id) : new Tagihan;

            // Check the tagihan  
            if($id && !$tagihan) return  "No user with ID $id";

            // Save the tagihan
            $tagihan->jumlah              = $request->jumlah;
            $tagihan->penawaran_jasa_id   = $request->penawaran_jasa_id;
            $tagihan->save();
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
            $tagihan = Tagihan::find($id);
            if(!$tagihan) return "No tagihan with ID $id";
            $tagihan->delete();
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
