<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\riwayat;
use Illuminate\Http\Request;

class interfaceController extends Controller
{
    public function index()
    {
        //jadi kita ambil dulu, data dari helper untuk dapat mengambil nya
        //about
        $about_id = get_meta_value('_halaman_about');
        $data_about = halaman::where('id', $about_id)->first();

        //interest
        $interest_id = get_meta_value('_halaman_interest');
        $data_interest = halaman::where('id', $interest_id)->first();

        //awards
        $awards_id = get_meta_value('_halaman_awards');
        $data_awards = halaman::where('id', $awards_id)->first();

        //experience 
        $experience_data = riwayat::where('tipe', 'experience')->get();

        //education
        $education_data = riwayat::where('tipe', 'education')->get();

        return view('dashboard.interface.index')->with([
            'about' => $data_about,
            'interest' => $data_interest,
            'awards' => $data_awards,
            'experience' => $experience_data,
            'education' => $education_data
        ]);
    }
    public function update()
    {
    }
}
