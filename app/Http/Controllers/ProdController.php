<?php
namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProdController extends Controller{

    public function simpan(Request $request){
        $data = new Product;
    }
}