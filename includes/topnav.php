<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
      <div class="topbox">
        <h2>Login panel</h2>
        <p>Please user the Login Panel to use the features according to your Access Level</p>
        
      </div>
      
	   <div class="topbox last">
        <h2>User Login</h2>
        <form action="process/process_login.php" method="post">
          <fieldset>
            <legend>Pupils Login Form</legend>
            <label for="username">Username:
              <input type="text" name="username" id="username" value="" />
            </label>
            <label for="password">Password:
              <input type="password" name="password" id="password" value="" />
            </label>
            <label for="pupilremember">
              <input class="checkbox" type="checkbox" name="pupilremember" id="pupilremember" checked="checked" />
              Remember me</label>
            <p>
              
              <input type="submit" name="pupillogin" id="pupillogin" value="Login" />
              &nbsp;
              <input type="reset" name="pupilreset" id="pupilreset" value="Reset" />
            </p>
          </fieldset>
        </form>
        
      </div>
      <br class="clear" />
    </div>
    <div id="loginpanel">
    
    <?php 
	

if(isset($_SESSION['username'])){ ?>
	<ul>
     <li class="left">Logout Here &raquo;</li>
        <li class="right" id="toggle"><a  href="logout.php"><?php echo $_SESSION['username']; ?></a></li>
        
	<?php }else{ ?>
      <ul>
        <li class="left">Login Here &raquo;</li>
        <li class="right" id="toggle"><a id="slideit" href="#slidepanel">User Group</a><a id="closeit" style="display: none;" href="#slidepanel">Close Panel</a></li>
      </ul>
      <?php }?>
    </div>
    <br class="clear" />
  </div>
</div>