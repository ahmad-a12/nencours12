@extends('layout/layout')
@section('title','STORE_TABLE')
@section('content')
<center>
    <BR>
        @if (Auth::check())
    <a href="{{route('store.create')}}" class="btn btn-primary">Add Store</a>
    <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
    @endif
<table class="styled-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>User_Name</th>
            <th>Category_Name</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stores as $store)
        <tr>
            <td>{{$store->id}}</td>
            <td>{{$store->name}}</td>
            <td>{{$store->address}}</td>
            <td>{{$store->user->name}}</td>
            <td>{{$store->cat->name}}</td>
            <td><img src="{{asset('storage/image/'.$store->image)}}" alt="error" height="70px" width="70px"></td>
            <td>
                @if (Auth::check())
                <a href="{{route('store.edit',$store->id)}}" class="btn btn-success">Update</a>
                <a href="{{route('store.destroy',$store->id)}}" class="btn btn-danger">Delete</a>
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