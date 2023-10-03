@extends('layout/layout')
@section('title','ADD_CATEGORY')
@section('content')
<div class="wrapper">
    <div class="title">
       Add Category
    </div>
    <form action="{{route('cat.store')}}" method="post">
      @csrf
       <div class="field">
           <input type="text" name='name' required>
           <label>Category Name</label>
        </div>
        @error('name')
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