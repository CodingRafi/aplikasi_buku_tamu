<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TamuController extends Controller
{
    public function index(){
        return view('tamu');
    }

    public function tampil(){
        return view('tambah');
    }

    public function tambah(Request $request){
        $img =  $request->get('image');
        // dd($img);
        $folderPath = "storage/";
        $image_parts = explode(";base64,", $img);
        foreach ($image_parts as $key => $image){
            $image_base64 = base64_decode($image);
        }

        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);
        $folderPath2 = "tandaTangan/";
        $img_parts =  explode(";base64,", $request->signed);
        $img_type_aux = explode("image/", $img_parts[0]);
        $img_type = $img_type_aux[1];
        $img_base64 = base64_decode($img_parts[1]);
        $namaTandaTangan =   uniqid() . '.'.$img_type;
        $file = $folderPath2 . $namaTandaTangan;
        file_put_contents($file, $img_base64);

        DB::table('datatamus')->insert([
            [
                'nama' => $request->namatamu,
                'instansi' => $request->instansi,
                'alamat' => $request->alamat,
                'image' => $fileName,
                'tandatangan' => $namaTandaTangan
            ]
        ]);

        return redirect("/")->with('success', 'Data submitted Successfully');
    }
}
