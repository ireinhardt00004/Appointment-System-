@extends('layouts.app')
@section('content')
    <section class="bg-white w-full h-full dark:bg-gray-900">

        <div class="py-10 px-5 mx-auto flex flex-col justify-center items-center  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px] space-y-4">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Profile Settings </h2>
        
        <div class="flex w-full h-[50px] justify-between items-center gap-2">     
        </div>
            
        <div class="w-full overflow-x-auto">
            @include('profile.partials.update-profile-information-form')
              
        </div>

        <div class="w-full overflow-x-auto m-5">
            @include('profile.partials.update-password-form')
              
        </div>
        </section>
       
@endsection
@section('title','Edit Profile Information')
