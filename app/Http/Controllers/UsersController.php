<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function login_form()
    {
        // ddd(' users indx method on controller');
        // dd(' users indx method on controller');
       return view('login');
    }

    public function login_action(Request $request)
    {
        // dd($request);
        // $hashed_password = Hash::check();
       $users =  Users::where('username', $request->username)->first();
       if($users == null){
            return redirect()->back()->with('error', 'Username Tidak Ditemukan');
       }
       
       $db_password = $users->password;
       $hashed_password = Hash::check($request->password, $db_password);

       if($hashed_password){
            $users->token = Str::random(20);
            $users->save();
            $request->session()->put('token', $users->token);
            return to_route('dashboard_index') ;
       }else{
            return redirect()->back()->with('error', 'Maaf Data Anda Tidak Sesuai');
       }
    //    echo $hashed_password;
    //    dd($hashed_password);
    }

    public function dashboard_index(){
        // FacadesSession::has('token')
        if(Session::has('token')){
            $users = Users::where('token', Session::get('token'))->first();
            $articles = Articles::get();
        $users = Users::where('token', Session::get('token'))->first();
            return view('Dashboard/index', [
                'title' => 'Dashboard Admin',
                'users' => $users,
                "articles" => $articles
            ]);
        }
        else{
            return redirect()->back();
        }
    }

    public function dashboard_logout(Request $request){
        // dd($request->token);
    //    $test = Users::where('token', $request->token)->update([
    //         // 'token' => NULL
    //         'token' => NULL
    //     ]);
   Users::where('token', $request->token)->update([
        'token' => NULL
    ]);

        // dd($test);
        Session::pull('token');
        return to_route('login_form');
        // dd($request);
    }

    public function article_delete_action(Request $request)
    {
        Articles::find($request->id)->delete();
        return redirect()->back()->with('message', 'artikel berhasil dihapus');
    }

    public function article_add_action(Request $request)
    {

        $request->validate([
            'title' => ['required', 'max:255', 'min:10'],
            'description' => ['required'],
            'tag' => ['nullable'],
        ]);

        $created = Articles::create([
            "title" => $request->title,
            "description" => $request->description,
            "tag" => $request->tag,
        ]);

        if ($created) {
            return redirect()->back()->with('message', 'artikel berhasil dibuat');
        } else {
            return redirect()->back()->with('message', 'artikel gagal dibuat');
        }
    }
}