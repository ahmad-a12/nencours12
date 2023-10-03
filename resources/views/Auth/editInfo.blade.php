@extends('layout/layout')
@section('title','Register')
@section('content')
<br>
<div class="wrapper">
         <div class="title">
            Update Form
         </div>
         <form action="{{route('updateInfo',Auth::user()->id)}}" method="post" enctype='multipart/form-data'>
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
            <input type="file" name='img' required>
            <label>img</label>
         </div>
            <div class="field">
               <input type="submit" value="Update">
            </div>
         </form>
      </div>
      <br>
      <div class="wrapper">
        <div class="title">
           Change Password
        </div>
        <form action="{{route('password',Auth::user()->id)}}" method="post">
        @csrf
        @method('put')
           <div class="field">
               <input type="password" name="current_password" required>
               <label>Current Password</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>New Password</label>
             </div>
             <div class="field">
                <input type="password" name="password_confirmation" required>
                <label>Password Confirmation</label>
             </div>
           <div class="field">
              <input type="submit" value="Add">
           </div>
        </form>
     </div>
      @stop