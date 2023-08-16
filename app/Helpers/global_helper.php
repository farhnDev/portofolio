<?php

use App\Models\metadata;

//ini helpers untuk metakey
//dan untuk dapat dihendaki, kita 
//daftarkan di compoeser kita juga 
function get_meta_value($meta_key)
{
    $data = metadata::where('meta_key', $meta_key)->first();
    if ($data) {
        return $data->meta_value;
    }
}
function set_about_nama($nama)
{
    //kita pecah nama. dan tujuan ini supaya kita dapat merubah 
    //warna nama 
    //kita pecahkan dengan menggunakna spasi sebgai landasan

    $arr = explode(" ", $nama); //idx 1 frist name  idx 2 last name
    $kataAkhir = end($arr);
    $kataAkhir2 = "<span class='text-primary'>$kataAkhir</span>";
    array_pop($arr); //firstname;
    $namaAwal = implode(" ", $arr);
    return $namaAwal . " " . $kataAkhir2;
}

//jadi kita buat helper untuk memberikan deklarasi seperti ikuti template
//kalau ada ul maka kita berikan ul serta class, dan juga li
// kenpa bginih, karena tag ul, and li, di dapat dari text area

function set_list_award($isi)
{
    //jadi strreplace,dengan tag awal, 
    //menjadi apa, dan di dalam apa karena ini adalah $isi
    $isi = str_replace("<ul>", '<ul class="fa-ul mb-0">', $isi);
    $isi = str_replace("<li>", '<li><span class="fa-li"><i class="fas
     fa-trophy text-warning"></i></span>', $isi);
    return $isi;
}
function set_list_workflow($isi)
{
    //jadi strreplace,dengan tag awal, 
    //menjadi apa, dan di dalam apa karena ini adalah $isi
    $isi = str_replace("<ul>", '<ul class="fa-ul mb-0">', $isi);
    $isi = str_replace("<li>", '<li><span class="fa-li"><i class="fas
     fa-check"></i></span>', $isi);
    return $isi;
}
