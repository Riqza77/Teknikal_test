<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Sales;
use App\Models\Sales_detail;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 3) {
           return redirect('/purchase');
        }
        if(auth()->user()->role == 2){
            
            $sales = Sales::where('user_id',2)->get();
        }else{

            $sales = Sales::all();
        }
            return view('sales',[
            'judul' => 'Data Penjualan',
            'sales' => $sales,
        ]);
    }

    public function tambah() 
    {
        return view('sales_add',[
            'judul' => 'Tambah Penjualan',
            'inventory' => Inventory::all(),
        ]);    
    }

    public function add(Request $request)
    {
        // dd($request->all());
        $sls = Sales::create([
            'number' => date('YmdHis').rand(1,99),
            'user_id' => auth()->user()->id,
        ])->id;
        $detail = [];
        foreach (json_decode($request->data_inventory) as $in) {
            $detail= [
            'sales_id' => $sls,
            'inventory_id' => $in->id,
            'qty' => $in->jumlah,
            'price' => $in->total,
            ];
            Sales_detail::create($detail);
            $inventori = Inventory::find($in->id);
            $inventori->update(['stock' => $inventori->stock+$in->jumlah]);
        }
        return redirect('/sales')->with('success','Data Berhasil Ditambahkan');
    }

    public function hapus(Sales $sales)
    {
        Sales_detail::where('sales_id',$sales->id)->delete();
        $sales->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }

    public function detail(Sales $sales) 
    {
        return view('sales_detail',[
            'judul' => 'Detail Penjualan',
            'sales' => $sales,
        ]);    
    }

    public function detail_edit(Request $request)
    {
        $detail = Sales_detail::find($request->id);
        $inventori = Inventory::find($detail->inventory_id);
        $qt = $detail->qty - $request->qty;
        $stck = $inventori->stock - $qt;
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

        return redirect('/sales_detail/'.$detail->sales_id)->with('success','Data Detail Berhasil Diubah');
    }
    
}
