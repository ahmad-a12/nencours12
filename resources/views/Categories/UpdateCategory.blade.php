@extends('layout/layout')
@section('title','UPDATE_CATEGORY')
@section('content')
<div class="wrapper">
    <div class="title">
       Update Category
    </div>
    <form action="{{route('cat.update',$cat->id)}}" method="post">
      @csrf
       <div class="field">
           <input type="text" name='name' required>
           <label> New Category Name</label>
        </div>
        @error('name')
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