@extends('layout/layout')
@section('title','Login')
@section('content')
<div class="wrapper">
         <div class="title">
            Login Form
         </div>
         <form action="{{route('login.save')}}" method="post">
            @csrf
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
               <input type="submit" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="{{route('register')}}">Signup now</a>
            </div>
         </form>
      </div>
      @stop