@extends('layout/layout')
@section('title','CATEGORY_TABLE')
@section('content')
<center>
    <BR>
        @if (Auth::check())
    <a href="{{route('cat.create')}}" class="btn btn-primary">Add Category</a>
    <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
    @endif
<table class="styled-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cats as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>
                @if (Auth::check())
                <a href="{{route('cat.edit',$cat->id)}}" class="btn btn-success">Update</a>
                <a href="{{route('cat.destroy',$cat->id)}}" class="btn btn-danger">Delete</a>
                @else
                <span>Nothing</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</center>
@stop