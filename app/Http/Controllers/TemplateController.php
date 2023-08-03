<?php

namespace App\Http\Controllers;
use App\Models\san_pham;
use App\Models\loai_sp;
use App\Models\rom;
use App\Models\mau_sp;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function template()  {
        $ds = san_pham::all();
        $lsp = loai_sp::all();
        return view('feature',['sanphams'=>$ds,'loaisp'=>$lsp]);
    }
    public function products($id)
    {
        $lsp = loai_sp::all();
        $loaisp = loai_sp::find($id);
        $ds = san_pham::where('id_loai_sp',$id)->get();
        return view('detail_categories', ['sanphams' => $ds, 'loaisp' => $loaisp,'loaisp'=>$lsp]);
    }
    public function product_detail($id)
    {
        $mau = mau_sp::where('id_sp',$id)->get();
        $lsp = loai_sp::all();
        $ds = san_pham::find($id);
        $rom_ds = rom::where('id_sp',$id)->get();
        return view('detail_products', ['sanphams' => $ds,'mausp' => $mau, 'loaisp'=>$lsp,'rom'=>$rom_ds]);
    }
}