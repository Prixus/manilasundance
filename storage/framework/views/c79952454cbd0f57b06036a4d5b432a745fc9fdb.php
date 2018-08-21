<?php $__env->startSection('content'); ?>


  <!-- multistep form -->
<form id="msform" action ="/brand/register" method="POST">
  <!-- progressbar -->
  <?php echo e(csrf_field()); ?>

  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Brand Profile</li>
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create your account</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <input type="text" name="txtBrandEmailAddress" placeholder="Email" required/>
    <input type="text" name="txtBrandUsername" placeholder="Username" required/>
    <input type="password" id ="password" name="txtBrandPassword" placeholder="Password" onkeyup='check();' required/>
    <input type="password" id ="confirm_password" name="txtConfirmBrandPassword" placeholder="Confirm Password" onkeyup='check();' />
    <h3 class="fs-subtitle" id="message"></h3>
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Brand Profile</h2>
    <h3 class="fs-subtitle">Introduce your brand</h3>
    <input type="text" name="txtBrandName" placeholder="Brand Name" required/>
    <input type="text" name="txtBrandWebsiteName" placeholder="Brand Website" />
    <input type="text" name="txtFacebook" placeholder="Facebook" />
    <input type="text" name="txtTwitter" placeholder="Twitter" />
    <input type="text" name="txtInstagram" placeholder="Instagram" />
    <textarea name="txtBrandDescription" placeholder="Brand Description" required></textarea>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <input type="text" name="txtBrandOwnerName" placeholder="Owner Name" required/>
    <input type="text" name="txtBrandTinNumber" placeholder="Tin Number" maxlength="9" id="TinNumber" pattern=".{9}"  required/>
    <input type="text" name="txtBrandMobileNumber" placeholder="Mobile Number" id="mobileNumber" pattern=".{11}" maxlength="11" required/>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="signup" class="submit action-button" value="Submit" />
  </fieldset>
</form>

<script>
$(document).ready(function() {
    $("#TinNumber").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [ 8, 9]) !== -1) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $("#mobileNumber").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [ 8, 9]) !== -1) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
}

);

function check(){
if (document.getElementById('password').value ==
  document.getElementById('confirm_password').value) {
  document.getElementById('message').style.color = 'green';
  document.getElementById('message').innerHTML = 'matching';
  document.getElementById('submit').disabled = false;
} else {
  document.getElementById('message').style.color = 'red';
  document.getElementById('message').innerHTML = 'not matching';
  document.getElementById('submit').disabled = true;
}
}

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>