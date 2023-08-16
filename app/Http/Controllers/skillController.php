<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;

class skillController extends Controller
{
    public function index()
    {
        //load json devicon 
        $skill_url = public_path('admin/devicon.json');
        $skill_data = file_get_contents($skill_url);

        //ini sudah menangkap file devicon, nanti akan diubah
        //menjadi array dan ambil name saja
        $skill_data = json_decode($skill_data, true);
        $skill = array_column($skill_data, 'name');
        $skill = "'" . implode("','", $skill) . "'";

        //ctatan untuk dapat melaakukan di input untuk di bladenya,
        //kita perlu lakukan token json,di layout

        //kemudian arahkan supaya blade dapat mengambilnya
        return view('dashboard.skill.index')->with(['skill' => $skill]);
    }
    public function update(Request $request)
    {
        //kita akan memberikan perintah, kalau ada function post

        //langkah pertama kita lakukan validate terlebih dahulu 
        //validate ini, diambil dari form and name nya , bukan id 
        //atau seperti yang di table db
        if ($request->method() == 'POST') {
            $request->validate(
                [
                    '_language' => 'required',
                    '_workflow' => 'required'
                ],
                [
                    '_language.required' => 'masukan skill mu',
                    '_workflow.required' => 'masukan workflow mu'
                ]
            );

            // panggil model nya 
            metadata::updateOrCreate(
                ['meta_key' => '_language'], // Kriteria pencarian
                ['meta_value' => $request->_language]
            );
            metadata::updateOrCreate(
                ['meta_key' => '_workflow'],
                ['meta_value' => $request->_workflow]
            );
            return redirect()->route('skill.index')->with('success', 'Berhasil Menambahkan Data');
        }
    }
}
