@extends('layout/layout')
@section('title','HOME')
@section('content')
@if (Auth::check())
<div><h3>WELLCOME BACK <span class="name"> {{Auth::user()->name}}</span><br></h3></div>
<a href="{{route('editInfo',Auth::user()->id)}}" class="btn btn-success">Edit Info</a>
@else
<span><h3>WELLCOME <A href="{{route('login')}}"> ARE YOU A MEMBER?</A></h3></span>
<span><h3><A href="{{route('register')}}">WANNA BECOME A MEMBER?</A></h3></span>
@endif
@stop