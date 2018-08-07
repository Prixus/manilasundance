<?php $__env->startSection('content'); ?>

<section id = "signBG" style = "margin-bottom:65px;">
        <div>

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

var check = function() {
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


<form class = "form" style = "width:50%;text-align:center;display: block;margin: auto;position:absolute;top:23%;left:35%;" method="POST" action = "brand/register">
        <?php echo e(csrf_field()); ?>

        <input type="text" maxlength="255" placeholder="Brand Name" name="txtBrandName" required> <br/>
        <input type="text" maxlength="9" placeholder="Tin Number (must have 9 characters)" name="txtBrandTinNumber" id="TinNumber" pattern=".{9}"   required> <br/>
        <input type="text" placeholder="Owner Name" name="txtBrandOwnerName" required> <br/>
        <input type="text" maxlength="255" placeholder="Official Brand Website" name="txtBrandWebsiteName"> <br/>
        <input type="text" placeholder="Social Media Assets(e.g. Facebook Page)" name="txtBrandSocialMediaAssets" maxlength="255"> <br/>
        <input type="text" maxlength="11" placeholder="Official Brand Mobile Number" name="txtBrandMobileNumber" id="mobileNumber" pattern=".{11}" required> <br/>
        <input type="email" maxlength="255" placeholder="Official Brand Email Address" name="txtBrandEmailAddress" required> <br/>
        <input type="text" maxlength="255" placeholder="Brand Username" name="txtBrandUsername" required> <br/>
        <input type="password" placeholder="Password" name="txtBrandPassword" id= "password" required onkeyup='check();'> <br/>
        <input type="password" placeholder="Confirm Password" name="txtBrandPassword" id="confirm_password" maxlength="255" onkeyup='check();' required> <p id="message"></p> <br/>
        <textarea rows="10" cols="40" placeholder="Brand Description" name="txtBrandDescription"/></textarea> <br/>

<input type= "submit" id="submit" value="SIGN UP" style = "background-color:#ffffe0;" >


</form>
</div>


<p style = "display:inline;font-family:Verdana;font-size:50;font-style:Bold;position:absolute; LEFT:43%; top: 12%;color:#3ce1e0;">Sign Up <p/>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>