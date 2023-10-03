<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Cat;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function index()
    {
        $stores=Store::get();
        return view('Stores.StoreTable',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Cat::get();
        return view('Stores.AddStore',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $store=new Store();
        $store->name=$request->name;
        $store->address=$request->address;
        $store ->user_id = Auth::user()->id;
        $store ->cat_id = $request->cat_id ;
        if($request ->file('image')){
            $FileName=time().'.'.$request->file('image')->getClientOriginalName();
            $path=$request->file('image')->storeAs('public/image',$FileName);
            $store->image=$FileName;
        }
        $store->save();
        return redirect()->route('store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $store=Store::find($id);
        // $stores=Store::where()->get();
        return view('Stores.ShowStore',compact('store'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $store = Store::find($id);
        $cats = Cat::get();
        return view('Stores.UpdateStore',compact('store'),compact('cats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $store=Store::find($id);
        $store->name=$request->name;
        $store->address=$request->address;
        $store ->cat_id = $request->cat_id ;
        if($request ->file('image')){
            if($store->image){
                Storage::delete('public/image/'.$store->image);
            }
            $FileName=time().'.'.$request->file('image')->getClientOriginalName();
            $path=$request->file('image')->storeAs('public/image',$FileName);
            $store->image=$FileName;
        }
        $store->save();
        return redirect()->route('store');
    }
    public function destroy(string $id){
        $store=Store::findOrFail($id);
        $img_name=$store->image;
        $img_path=public_path('storage/image/'.$img_name);
        if(File::exists($img_path)){
            unlink($img_path);
        }
    $store->delete();
        return redirect()->route('store');
}
}
