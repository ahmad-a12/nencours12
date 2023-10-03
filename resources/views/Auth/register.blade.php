@extends('layout/layout')
@section('title','Register')
@section('content')
<div class="wrapper">
         <div class="title">
            Register Form
         </div>
         <form action="{{route('register.store')}}" method="post">
            @csrf
            <div class="field">
                <input type="text" name='name' required>
                <label>Name</label>
             </div>
             @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
            <div class="field">
               <input type="email" name='email' required>
               <label>Email Address</label>
            </div>
            @error('email')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
            <div class="field">
                <input type="text" name='phone' required>
                <label>Phone</label>
             </div>
             @error('phone')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
            <div class="field">
               <input type="password" name='password' required>
               <label>Password</label>
            </div>
            @error('password')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>
            </div>
            <div class="field">
               <input type="submit" value="Register">
            </div>
            <div class="signup-link">
               Have account? <a href="{{route('login')}}">Sign in now</a>
            </div>
         </form>
      </div>
      @stop