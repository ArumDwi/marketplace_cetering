<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MenuModel;

class MenuController extends Controller
{

    //method untuk tampil data menu
    public function menutampil()
    {
        $datamenu= MenuModel::orderby('no', 'ASC')
        ->paginate(5);

        return view('halaman/view_menu',['menu'=>$datamenu]);
    }

    //method untuk tambah data menu
    public function menutambah(Request $request)
    {
        $this->validate($request, [
            'makanan' => 'required',
            'minuman' => 'required',
        ]);

        MenuModel::create([
            'makanan' => $request->makanan,
            'minuman' => $request->minuman,
            
        ]);

        return redirect('/menu');
    }

     //method untuk hapus data menu
     public function menuhapus($makanan)
     {
         $datamenu=MenuModel::find($makanan);
         $datamenu->delete();
 
         return redirect()->back();
     }

     //method untuk edit data menu
    public function menuedit($makanan, Request $request)
    {
        $this->validate($request, [
            'makanan' => 'required',
            'minuman' => 'required',
        ]);

        $no = MenuModel::find($makanan);
        $no->makanan   = $request->makanan;
        $no->minuman      = $request->minuman;

        $no->save();

        return redirect()->back();
    }
}
