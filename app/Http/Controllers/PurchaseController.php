<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Purchase;
use App\Models\Purchase_detail;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index() 
    {
        if(auth()->user()->role == 3){
            
            $purchase = Purchase::where('user_id',3)->get();
        }else{

            $purchase = Purchase::all();
        }
        return view('purchase',[
            'judul' => 'Data Pembelian',
            'purchase' => $purchase,
        ]);    
    }
    
    public function tambah() 
    {
        return view('purchase_add',[
            'judul' => 'Tambah Pembelian',
            'inventory' => Inventory::where('stock','>=','1')->get(),
        ]);    
    }

    public function add(Request $request)
    {
        // dd($request->all());
        $pur = Purchase::create([
            'number' => date('YmdHis').rand(1,99),
            'user_id' => auth()->user()->id,
        ])->id;
        $detail = [];
        foreach (json_decode($request->data_inventory) as $in) {
            $detail= [
            'purchase_id' => $pur,
            'inventory_id' => $in->id,
            'qty' => $in->jumlah,
            'price' => $in->total,
            ];
            Purchase_detail::create($detail);
            $inventori = Inventory::find($in->id);
            $inventori->update(['stock' => $inventori->stock-$in->jumlah]);
        }
        return redirect('/purchase')->with('success','Data Berhasil Ditambahkan');
    }

    public function hapus(Purchase $purchase)
    {
        Purchase_detail::where('purchase_id',$purchase->id)->delete();
        $purchase->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }

    public function detail(Purchase $purchase) 
    {
        return view('purchase_detail',[
            'judul' => 'Detail Pembelian',
            'purchase' => $purchase,
        ]);    
    }

    public function detail_edit(Request $request)
    {
        $detail = Purchase_detail::find($request->id);
        $inventori = Inventory::find($detail->inventory_id);
        $qt = $detail->qty - $request->qty;
        $stck = $inventori->stock + $qt;
        if($stck < 0){
            dd('Mohon Maaf Stok Inventori '.$inventori->name.' Habis');
        }
        $inventori->update([
            'stock' => $stck
        ]);
        $detail->update([
            'qty' => $request->qty,
            'price' => $inventori->price*$request->qty
        ]);

        return redirect('/purchase_detail/'.$detail->purchase_id)->with('success','Data Detail Berhasil Diubah');
    }
    
}
