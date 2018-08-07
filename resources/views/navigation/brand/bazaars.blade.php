@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<h2 class="sub-header">Bazaars<div style = "float:right;font-size:14px;">
<input type = "text" placeholder = "Search...">
<button class = "btnSearch">GO</button>
</div>
</h2>


<section style = "width:100%;" id ="bazaarboxes">
                @foreach($bazaars as $bazaar)
                <div style = "display:inline-block;width:20%;margin:50px;" class='bazaarbox'>
                        <img id='picsize' src='/{{$bazaar->Bazaar_EventPoster}}' width="256" height="200">
                        <h4><button class="btn btn-primary" id="btnShowBazaar" data-id="{{$bazaar->PK_BazaarID}}" data-name="{{$bazaar->Bazaar_Name}}" data-venue="{{$bazaar->Bazaar_Venue}}" data-datestart="{{$bazaar->Bazaar_DateStart}}" data-dateend="{{$bazaar->Bazaar_DateEnd}}" data-timestart="{{$bazaar->Bazaar_TimeStart}}" data-timeend="{{$bazaar->Bazaar_TimeEnd}}" data-bookingcost="{{$bazaar->BookingCost}}" data-status="{{$bazaar->Status}}" data-stallmap="{{$bazaar->Bazaar_StallMap}}" data-eventposter = "{{$bazaar->Bazaar_EventPoster}}" data-description = "{{$bazaar->Bazaar_Description}}">Click for more details</button></h4>
                </div>
                @endforeach
                {{$bazaars->links()}}
</section>


<!-- This is the Modal that will be called for delete column -->
<div class = "modal fade" id = "ModalShowBazaar" role = "dialog">
  <div class = "modal-dialog">

    <div class="modal-content">
      <div class = "modal-header">
        <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
              <h4 class ="modal-title">Show Bazaar</h4>
            </div>
            <div class="modal-body">
              <div>
              <img id='stallmap' src='' width="500" height="320">
            </div>
            <div>
              <h2 id="BazaarTitle"></h2>
            </div>
                <div>
                <label>Start Date:</label>
                <input id="DateStart" type="Date" disabled>
                <label>End Date:</label>
                <input id="DateEnd" type="Date" disabled>
                </div>
                <div>
                <label>Time Start:</label>
                <input id="TimeStart" type="time" disabled>
                <label>Time End:</label>
                <input id="TimeEnd" type="time" disabled>
                </div>
                <p id="BazaarDescription"><p>

            </div>
            <div class = "modal-footer">
              <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
              <button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-primary" aria-pressed="false"><a id="redirect" href = "#" >Reserve Bazaar</a></button>
            </div>
          </div>
    </div>
  </div>


  <script type="text/javascript">
  $(document).ready(function(){

    $(document).on('click','#btnShowBazaar',function(){
      $('#stallmap').attr('src','/'+$(this).data('stallmap'));
      $('#redirect').attr('href','/brand/stalls/'+$(this).data('id'));
      $('#BazaarTitle').replaceWith($(this).data('name'));
      $('#DateStart').val($(this).data('datestart'));
      $('#DateEnd').val($(this).data('dateend'));
      $('#TimeStart').val($(this).data('timestart'));
      $('#TimeEnd').val($(this).data('timeend'));
      $('#BazaarDescription').val($(this).data('description'));
      $('#ModalShowBazaar').modal('show');
    });

  });
  </script>
<br><br>





</div>
</div>
</div>

@endsection
