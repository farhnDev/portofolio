<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function update(Request $request)
    {
        //kita validate dahulu dan berikan request dalam parameter, update
        $request->validate(
            [
                //kita validate yang pertama foto,dan email, supaya yang di insert
                //ialah berupa data yang valid
                '_foto' => 'mimes:png,jpg,jpeg,gif',
                '_email' => 'required|email'
            ],
            [
                '_foto.mimes' => 'Foto hanya dapat di input dengan bentuk
                png,jpeg,jpg,gif',
                '_email.required' => 'email wajib di isi',
                '_email.email' => 'memerlukan format yang benar'
            ]
        );
        //memberikan insert foto
        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto'), $foto_baru);
            // kalau ada update, foto akan melakukan delete foto lama 
            $foto_lama = get_meta_value('_foto');
            File::delete(public_path('foto') . "/" . $foto_lama);
            //batas
            metadata::updateOrCreate(
                ['meta_key' => '_foto'],
                ['meta_value' => $foto_baru]
            );
        }
        metadata::updateOrCreate(
            ['meta_key' => '_email'],
            ['meta_value' => $request->_email]
        );
        metadata::updateOrCreate(
            ['meta_key' => '_kota'],
            ['meta_value' => $request->_kota]
        );
        metadata::updateOrCreate(
            ['meta_key' => '_provinsi'],
            ['meta_value' => $request->_provinsi]
        );
        metadata::updateOrCreate(
            ['meta_key' => '_nohp'],
            ['meta_value' => $request->_nohp]
        );

        //sosmed
        metadata::updateOrCreate(
            ['meta_key' => '_whatsapp'],
            ['meta_value' => $request->_whatsapp]
        );
        metadata::updateOrCreate(
            ['meta_key' => '_linkedin'],
            ['meta_value' => $request->_linkedin]
        );
        metadata::updateOrCreate(
            ['meta_key' => '_github'],
            ['meta_value' => $request->_github]
        );
        metadata::updateOrCreate(
            ['meta_key' => '_instagram'],
            ['meta_value' => $request->_instagram]
        );

        return redirect()->route('profile.index')->with('succes', 'berhasil melakukan update');
    }
}
