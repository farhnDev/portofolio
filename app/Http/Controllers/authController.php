<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laravel\Socialite\Facades\Socialite;

class authController extends Controller
{
    function index()
    {
        return view('auth.index');
    }

    function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    function callback()
    {
        //filter email mana ajah yang bisa login 


        $user = Socialite::driver('google')->user();

        $id = $user->id;
        $email = $user->email;
        $name = $user->name;
        $avatar = $user->avatar;

        $cek = User::where('email', $email)->count();
        //untuk ngecek nya kita gunakan pengkondisian if 
        if ($cek > 0) {
            $avatar_file = $id . ".jpg";   //ini kita membuat avatar dengan nama filenya

            //kita membuat untuk penyimpanan dimana tempat dari filenya disimpan
            $fileContent = file_get_contents($avatar);
            //kita akan membuat untuk di simpan folder
            File::put(public_path("admin/images/faces/$avatar_file"), $fileContent);   //petik harus dua
            // jadi ini itu membuat untuk proses langsung masuk ke directory


            //ini kalau updateorcreate ni, kalau 
            //datanya sudah ada maka dia akan active. kalau belum akan membuatkan data
            $user = User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'google_id' => $id,
                    'avatar' => $avatar_file  //ini perpaduan dari avatar dan googlenya 
                ]
            );
            //jadi kalau benar akan login ke dashboar, 
            //akan tetapi sebelum itu kita buatkan dahulu sessi nya 
            //auth itu adalah sesi
            Auth::login($user);
            return redirect()->to('dashboard');
        } else {
            return redirect()->to('auth')->with('error', 'Akun yang kamu pakai itu kurang benar yo, dan 
            tidak terdaftar sama admin');
        }
    }

    //logout
    public function logout()
    {
        Auth::logout();
        return redirect()->to('auth');
    }
}
