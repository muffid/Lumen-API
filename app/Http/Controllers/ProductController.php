<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as LumenBaseController;
use App\Product;
use Illuminate\Http\Request;
use Laravel\Lumen\Http\ResponseFactor;


class ProductController extends LumenBaseController
{


    public function __construct()
    {
        $this->middleware('cors');
    }


    private function checkToken(){
        $headers = getallheaders();
        $contentType = $headers['Authorization'];
        if($contentType=='xx'){
            return true;
        }else{  
           return false;
        }
    }

   
  


    //function untuk mengambil semua produk
    public function getAllProduct(){
       
            $table = new Product();
            $allProduct = $table->all();
            return response()->json($allProduct);
       
       
    }


    //function untuk melihat detil produk berdasarkan id 
    public function getSingleProduct($id){
        $table = new Product();
        $singleProduct = $table->find($id);
        return response()->json($singleProduct);
    }

    //function untuk pencarian produk berdasarkan nama
    public function getProductByName($name){
        $table = new Product();
        $result = $table->where('Nama','LIKE',"%{$name}%")->get();
        return response()->json($result);
    }

    //function untuk simpan data
    public function store(Request $request)
    {
        //Validasi data kalau datanya angka ya isinya harus angka gaboleh huruf
        $table = new Product();
        try{
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Insert data ke database
       $table->insert([
            'Id' => $request->input('id'),
            'Nama' => $request->input('name'),
            'Stok' => $request->input('stock'),
            'Harga' => $request->input('price'),
        ]);
            // mengembalikan pesan kalau berhasil
            return response()->json([
                'message' => 'ok',
            ],200);
    }catch (Exception $e) {
        //mengembalikan pesan jika gagal
        return response()->json([
            'messgae' => 'not ok ',
            'alasan error' =>$e->getMessage(),
        ], 500);
    }

  
   
    }
}


    


