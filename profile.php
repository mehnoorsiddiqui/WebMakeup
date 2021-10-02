<?php
require("header.php");
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>

<div class="my-account-container">
<div class="header-cart">
       <h1>Edit Account Information</h1>
    </div>
    <div class="p-row">
    <div class="my-profile">
    <h3>Profile</h3>
       <form method="post">
           <div class="p-row">
              <div class="p-col-100">
              <label for="name">Name</label>
              </div>
              <div class="p-col-75">
                 <input type="text" id="a-name" name="a-name" value="<?php echo $_SESSION['USER_NAME']?>">
              </div>
              <span class="field_error" id="name_error"></span>
           </div>
           <div class="p-row p-submit-25">
                <button type="button"   class="save-btn" onclick="update_profile()" id="btn_submit">Save</button>
            </div>
        </form>
    </div>
    <div class="change-password">
        <h3>Change Password</h3>
      <form method="post" id="frmPassword">
        <div class="p-row">
            <div class="p-col-25">
                <label for="current-password">Current Password</label>
            </div>
            <div class="p-col-75">
                <input type="password" name="current_password" id="current_password" >
            </div>
            <span class="field_error" id="current_password_error"></span>
        </div>
         <div class="p-row">
            <div class="p-col-25">
                <label for="new-password">New Password</label>
           </div>
           <div class="p-col-75">
                <input type="password" name="new_password" id="new_password">
           </div>
           <span class="field_error" id="new_password_error"></span>
        </div>
        <div class="p-row">
            <div class="p-col-25">
               <label for="confirm-password">Confirm New Password</label>
            </div>
            <div class="p-col-75">
               <input  type="password" name="confirm_new_password" id="confirm_new_password">
            </div>
            <span class="field_error" id="confirm_new_password_error"></span>
        </div>
        <div class="p-row p-submit-25">
           <button type="button" class="save-btn" onclick="update_password()" id="btn_update_password">Save</button>
        </div>
      </form>
    </div>
</div>


<?php
require("footer.php");
?>