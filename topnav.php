
<?php if ($_SESSION['name'] !== null){ ?>
      <div  class="dropdown" style="float: right;" >
      <a class="dropbtn" >My Account</a>
      <div class="dropdown-content" >
     
      <a class="firstdrop" onclick="Profile()">Profile</a>
      
      
      <a class="seconddrop">Something</a>     
      <a class="thirddrop" onclick="Logout()">Log out</a>
      </div>
      </div>

      <?php }else {     ?>
      <div  class="dropdown" style="float: right;">
      <a class="dropbtn" >My Account</a>
      <div class="dropdown-content" >
      <a style="font-size: px;"  onclick="Login()" class="firstdrop">You aren't logged in. click here to login'</a>
      <a style="font-size: 10px;" onclick="Register()" class="seconddrop">Dont have an Account yet? click here to  Register</a>
      </div>
      </div>
     <?php } ?>
