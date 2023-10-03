@extends('layout/layout')
@section('title','UPDATE_STORE')
@section('content')
<div class="wrapper">
    <div class="title">
       Update Store
    </div>
    <form action="{{route('store.update',$store->id)}}" method="post" enctype='multipart/form-data'>
      @csrf
       <div class="field">
           <input type="text" name='name' required>
           <label> New Store Name</label>
        </div>
        @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <div class="field">
            <input type="text" name='address' required>
            <label> New Store Address</label>
         </div>
         @error('address')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
         <div class="field">
            <input type="file" name='image' required>
            <label> New Store Image</label>
         </div>
         <div class="field">
            <select name="cat_id" class="form-control" >
                <option value="">select your cat .. </option>
                @foreach ($cats as $cat)
                        <option value="{{$cat->id}}"> {{$cat->name}} </option>
                @endforeach
                
            </select>
        </div>
         @error('image')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
       <div class="field">
          <input type="submit" value="Update">
       </div>
    </form>
 </div>
@stop