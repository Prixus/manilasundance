@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<br>
        <div id='calendar' style="width:60%; height:60%;background-color: #ffffa8;margin-bottom: 0px;"></div>
        <script>
        $(document).ready(function() {

            $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },

            defaultDate: Date('YYYY-DD-MM'),
            navLinks: true, // can click day/week names to navigate views
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            events: [

                @foreach($bazaars as $bazaar)
                {
                _id:  '{{$bazaar->PK_BazaarID}}',
                title:  '{{$bazaar->Bazaar_Name}}',
                //url: '',
                start: '{{$bazaar->Bazaar_DateStart}}',
                end: '{{$bazaar->Bazaar_DateEnd}}T23:59:59'
                },
                @endforeach

            ]
            });

        });

        </script>
<br><br><br><br><br><br>

</div>
</div>
</div>

@endsection
