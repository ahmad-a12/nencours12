@extends('layout/layout')
@section('title','ADD_STORE')
@section('content')
<div class="wrapper">
    <div class="title">
       Add Store
    </div>
    <form action="{{route('store.store')}}" method="post" enctype='multipart/form-data'>
      @csrf
       <div class="field">
           <input type="text" name='name' required>
           <label>Store Name</label>
        </div>
        @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <div class="field">
            <input type="text" name='address' required>
            <label>Store Address</label>
         </div>
         @error('address')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <div class="field">
            <select name="cat_id" class="form-control" >
                <option value="">select your cat .. </option>
                @foreach ($cats as $cat)
                        <option value="{{$cat->id}}"> {{$cat->name}} </option>
                @endforeach
                
            </select>
        </div>
         <div class="field">
            <input type="file" name='image' required>
            <label>Store Image</label>
         </div>
         @error('image')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
       <div class="field">
          <input type="submit" value="Add">
       </div>
    </form>
 </div>
@stop