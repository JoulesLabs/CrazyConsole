@extends('layouts.main')

@section('title', 'CrazyConsole | Insight')
@section('breadcrumbs')
    {{ Breadcrumbs::render('insight') }}
@endsection

@section('contents')
   <h1>Typography</h1>

   <div id="notifications" class="fixed top-10 left-0 right-0 flex flex-col items-center justify-center space-y-2 z-10 opacity-80">
       @if (session()->has('notice'))
           <div data-turbo-temporary data-controller="flash" data-action="click->flash#remove" class="py-1 px-4 leading-7 text-center text-white rounded-full bg-gray-900 transition-all animate-appear-then-fade-out">
               {{ session()->get('notice') }}
           </div>
       @endif
   </div>
   <form action="{{ url('form') }}" method="post">
       <label for="">Name</label>
       <input id="name" name="name">
       <br>
       @csrf
       <input type="submit" value="Submit">
   </form>

@endsection

