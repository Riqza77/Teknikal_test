<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index() {
        return view('inventory', [
            'judul' => 'Inventory',
            'inventory' => Inventory::all()
        ]);
    }

    public function add(Request $request) {
        // dd();
        Inventory::create(array_merge($request->all(),[
            'price' => str_replace(array('Rp. ','.'),'',$request->price)
        ]));
        return redirect('/inventory')->with('success','Data Berhasil Ditambahkan');
    }

    public function edit(Request $request)
    {
        Inventory::where('id', $request->id)->update(array_merge($request->except('_token'),[
        'price' => str_replace(array('Rp. ','.'),'',$request->price)
        ]));
        return redirect('/inventory')->with('success','Data Berhasil Ditambahkan');
    }

    public function hapus(Inventory $inventory)
    {
      $inventory->delete();
      return response()->json(['message' => 'Data Berhasil Dihapus']);
    }

    public function getajax(Inventory $inventory)
    {
        $formatrp = number_format($inventory->price,0,',','.');
        $inventory->formatrp = $formatrp;
        $inven = json_encode($inventory);
        echo $inven;
    }
}
