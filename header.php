<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<header>
<!--==============================
            Stuck menu
=================================-->
  <section id="stuck_container">
    <div class="container">
      <div class="row">
        <div class="grid_12">
        <h1>
          <a href="index.php">
            <img src="images/logo.png" alt="Logo alt">          </a>        </h1>  
          <div class="navigation">
            <nav>
              <ul class="sf-menu">
               <li><a href="index.php">Events</a></li>
			   <?php
			   	session_start();
			   	if(isset($_SESSION['username']))
				{
					error_reporting(E_ALL ^ E_DEPRECATED);
					error_reporting(E_ALL ^ E_DEPRECATED);
					$con=mysqli_connect("localhost","root","","joysworth");
					$query="select * from user where email='".$_SESSION['username']."'";
					$result=mysqli_query($con,$query);
					$row=(mysqli_fetch_array($result));
					$name=$row['name'];
			   ?>
               <li><a href="profile.php"><?php echo $name;?></a></li>
			   <li><a href="logout.php">Logout</a></li>
			   <?php
			   }
			   else
			   {
			   ?>
			   <li><a href="profile.php">Login/Register</a></li>
			   <?php
			   }
			   ?>
             </ul>
            </nav>        
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
  </section> 
</header>        

</body>
</html>
