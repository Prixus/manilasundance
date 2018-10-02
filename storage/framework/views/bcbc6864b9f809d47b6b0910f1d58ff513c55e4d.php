<?php $__env->startSection('content'); ?>

<div class="container-fluid">
<div class="row">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<h2 class="sub-header">Bazaars
<!-- <div style = "float:right;font-size:14px;">
<input type = "text" placeholder = "Search...">
<button class = "btnSearch">GO</button>
</div> -->
</h2>


<section style = "width:100%;" id ="bazaarboxes">
                <?php $__currentLoopData = $bazaars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bazaar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div style = "display:inline-block;width:20%;margin:50px;" class='bazaarbox'>
                        <img id='picsize' src='\<?php echo e($bazaar->Bazaar_EventPoster); ?>' width="256" height="200">
                        <h4><button class="btn btn-primary" id="btnShowBazaar" data-id="<?php echo e($bazaar->PK_BazaarID); ?>" data-name="<?php echo e($bazaar->Bazaar_Name); ?>" data-venue="<?php echo e($bazaar->Bazaar_Venue); ?>" data-datestart="<?php echo e($bazaar->Bazaar_DateStart); ?>" data-dateend="<?php echo e($bazaar->Bazaar_DateEnd); ?>" data-timestart="<?php echo e($bazaar->Bazaar_TimeStart); ?>" data-timeend="<?php echo e($bazaar->Bazaar_TimeEnd); ?>" data-bookingcost="<?php echo e($bazaar->BookingCost); ?>" data-status="<?php echo e($bazaar->Status); ?>" data-eventposter = "<?php echo e($bazaar->Bazaar_EventPoster); ?>" data-description = "<?php echo e($bazaar->Bazaar_Description); ?>">Click for more details</button></h4>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</section>


<!-- This is the Modal that will be called for delete column -->
<div class = "modal fade" id = "ModalShowBazaar" role = "dialog">
  <div class = "modal-dialog">

    <div class="modal-content">
      <div class = "modal-header" style = "background-color:#ffffa8">
        <button type="button" class = "close" data-dismiss ="modal"> &times;</button> <!--MODAL copy-->
              <h4 class ="modal-title">SHOW BAZAAR</h4>
            </div>
            <div class="modal-body">

            <div>
              <h2 id="BazaarTitle"></h2>
            </div>
                <div>
                <label>START DATE:</label>
                <input id="DateStart" type="Date" class="form-control" disabled>
                <label>END DATE:</label>
                <input id="DateEnd" type="Date" class="form-control" disabled>
                </div>
                <div>
                <label>TIME START:</label>
                <input id="TimeStart" type="time" class="form-control" disabled>
                <label>TIME END:</label>
                <input id="TimeEnd" type="time" class="form-control" disabled>
                </div>
                <p id="BazaarDescription"><p>

            </div>
            <div class = "modal-footer">
              <button type ="button" class = "btn btn-danger" data-dismiss = "modal"> CLOSE </button>
              <button style = "background-color:#337ab7;float:right;" type="button" class="btn btn-success" aria-pressed="false"><a id="redirect" href = "#" >RESERVE BAZAAR</a></button>
            </div>
          </div>
    </div>
  </div>


  <script type="text/javascript">
  $(document).ready(function(){

    $(document).on('click','#btnShowBazaar',function(){
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>