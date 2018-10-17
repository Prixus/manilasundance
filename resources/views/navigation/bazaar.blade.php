@extends('layouts.app')

@section('content')

<h2 style = "margin-left: 65px;color:#3ce1e0;font-weight:bold;">Bazaars</h2>
<hr class="featurette-divider" style = "background-color:#ccc5c5;margin:3px;margin-left: 5%;height:1px;width:90%;">
<br>
<section id ="boxes">
            <div class ="container" >

                @foreach($bazaars as $bazaar)
                <div class='box'>
                        <img id='samesize' src='{{$bazaar->Bazaar_EventPoster}}'>
                        <h4>{{$bazaar->Bazaar_Name}}</h4>
                        <p id="bazaarDesc">{{$bazaar->Bazaar_Description}}</p>
                </div>
                @endforeach

            </div>
</section>

<br><br>

@endsection
