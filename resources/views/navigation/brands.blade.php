@extends('layouts.app')

@section('content')

<h2 style = "margin-left: 65px;color:#3ce1e0;font-weight:bold;">Brands</h2>
<hr class="featurette-divider" style = "background-color:#ccc5c5;margin:3px;margin-left: 5%;height:1px;width:90%;">
<br>
<section id ="boxes">
            <div class ="brandscontainer" >

                @foreach($brands as $brand)
                <div class='brandsbox'>
                        <h5>{{$brand->GuestBrand_Name}}</h5>
                </div>
                @endforeach

            </div>
</section>


<br> <br>


@endsection
