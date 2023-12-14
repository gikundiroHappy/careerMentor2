@extends('layouts.admin')
@section('title')
@section('content')
<div>
    <div>
    <div class="flex justify-end mt-10">
    <button class="bg-turtle-green text-white px-8 py-2 rounded-md"><a href="/addmentor">Add Mentor</a></button>
    </div>
    <div class="ml-[100px]">
            <div class="mt-5">
                @if(session()->has('success'))
                    <div class="alert alert-success text-green-500">{{ session('success') }}</div>
                @endif
            </div>

    <div class="flex flex-wrap gap-8 mt-5 p-0 text-sm">
         @foreach($mentors as $mentor)
       <div class=" border border-turtle-green w-[350px] py-10 px-6 space-y-5 rounded-tl-[30px] rounded-br-[30px]">
   
        <h1>{{ $mentor->mentor_name }}</h1>
        <h2>{{ $mentor->field }}</h2>
        <h3>{{ $mentor->location }}</h3>
        <p class="leading-6">{{ $mentor->description }}</p>
       </div>
         @endforeach
</div>
        </div>

    </div>
</div>
@endsection
