@extends('site.pages.master')
@section('content')
    <section id="profile-page">
        <div class="container">
           <h1>profile</h1>
           <a href="{{ route('user.logout') }}" style="background-color: green;color: white;">Logout</a>
        </div>
    </section>
@endsection