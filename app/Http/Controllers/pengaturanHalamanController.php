<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\metadata;
use Illuminate\Http\Request;

class pengaturanHalamanController extends Controller
{
    public function index()
    {
        //kita ambil dahulu data dari halaman
        $datahalaman = halaman::orderBy('judul', 'asc')->get();
        return view('dashboard.pengaturanHalaman.index')
            ->with('datahalaman', $datahalaman);
    }
    public function update(Request $request)
    {
        metadata::updateOrCreate(
            ['meta_key' => '_halaman_about'],
            ['meta_value' => $request->_halaman_about]
        );
        metadata::updateOrCreate(
            ['meta_key' => '_halaman_interest'],
            ['meta_value' => $request->_halaman_interest]
        );
        metadata::updateOrCreate(
            ['meta_key' => '_halaman_awards'],
            ['meta_value' => $request->_halaman_awards]
        );
        return redirect()->route('pengaturanHalaman.index')->with('succes', 'data berhasil update');
    }
}
