<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class educationController extends Controller
{
    private $_tipe; //ntah ini saya gunakan karena supaya tidak merah
    function __construct()
    {
        $this->_tipe = 'education'; // ini sesuaikan karena tipe datanya enum
    }
    //ini dibuat supaya, ketika kita mempunyai tipe data enum, maka supaya tidak memasukan satu satu maka buat function di atas//
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = riwayat::where('tipe', $this->_tipe)->orderBy(
            'tgl_akhir',
            'desc'
        )->get();
        return view('dashboard.education.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //sesi
        Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('info2', $request->info2);
        Session::flash('info3', $request->info3);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);
        // Session::flash('isi', $request->isi);  ini tidak usah,akan tetapi kita perlu ubah juga di migration nya

        $request->validate(     //ini itu colum yang memiliki perintah required
            [
                'judul' => 'required',
                'info1' => 'required',
                'info2' => 'required',
                'info3' => 'required',
                'tgl_mulai' => 'required',
                // 'isi' => 'required'
            ],
            [
                'judul.required' => 'judul wajib di isi',
                'info1.required' => 'wajib isi',
                'info2.required' => 'wajib isi',
                'info3.required' => 'wajib isi',
                'tgl_mulai.required' => 'wajib isi',
                // 'isi.required' => 'isi dahulu',
            ]
        );
        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => $this->_tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            // 'isi' => $request->isi
        ];
        riwayat::create($data);

        //route pesan
        return redirect()->route('education.index')->with('succes', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = riwayat::where('id', $id)->where('tipe', $this->_tipe)->first();
        return view('dashboard.education.edit')->with('data', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'info2' => 'required',
                'info3' => 'required',
                'tgl_mulai' => 'required',
                // 'isi' => 'required'
            ],
            [
                'judul.required' => 'judul wajib di isi',
                'info1.required' => 'wajib isi',
                'info2.required' => 'wajib isi',
                'info3.required' => 'wajib isi',
                'tgl_mulai.required' => 'wajib isi',
                // 'isi.required' => 'isi dahulu',
            ]
        );
        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => $this->_tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            // 'isi' => $request->isi
        ];
        riwayat::where('id', $id)->update($data);

        //route pesan
        return redirect()->route('education.index')->with('succes', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        riwayat::where('id', $id)->where('tipe', $this->_tipe)->delete();
        return redirect()->route('education.index')->with('succes', 'Berhasil Hapus');
    }
}
