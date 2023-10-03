<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{
    public function Home(){
        return view('Home.home');
    }
public function editInfo($id){
    $user=User::find($id);
    return view('Auth.editInfo',compact('user'));
}
/**
 * Summary of updateInfo
 * @param \Illuminate\Http\Request $request
 * @param string $id
 * @return \Illuminate\Http\RedirectResponse|mixed
 */
public function updateInfo(Request $request, string $id)
    {
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        if($request ->file('img')){
            if($user->img){
                Storage::delete('public/image/'.$user->img);
            }
            $FileName=time().'.'.$request->file('img')->getClientOriginalName();
            $path=$request->file('img')->storeAs('public/image',$FileName);
            $user->img=$FileName;
        }
        $user->save();
        return redirect()->route('home');
    }
    
    public function password(PasswordRequest $request,$id){
        $user=User::find($id);
        if($user){
            if($user->password==$user->password_confirmation){
                $user->password=$request->password;
            }
        }
        $user->save();
                return redirect()->route('home');
    }
}
