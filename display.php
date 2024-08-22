<!DOCTYPE html>
<html lang="en">
<head>
<title>Joysworth</title>
<meta charset="utf-8">
<meta name = "format-detection" content = "telephone=no" />
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/stuck.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/script.js"></script> 
<script src="js/superfish.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.mobilemenu.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tmStickUp.js"></script>
<script src="js/jquery.ui.totop.js"></script>

<script>
 $(document).ready(function(){

  $().UItoTop({ easingType: 'easeOutQuart' });
  $('#stuck_container').tmStickUp({});

  }); 
</script>
<!--[if lt IE 9]>
 <div style=' clear: both; text-align:center; position: relative;'>
   <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
     <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
   </a>
</div>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">


<![endif]-->
</head>

<body>
<!--==============================
              header
=================================-->
<?php include("header.php")?>
<!--=====================
          Content
======================-->
<section class="content"><div class="ic">More Website Templates @ TemplateMonster.com - July 30, 2014!</div>
  <div class="container">
    <div class="row">
      <div class="grid_12">
 <?php
 		$id=$_GET['id'];
		error_reporting(E_ALL ^ E_DEPRECATED);
		$con=mysqli_connect("localhost","root","","joysworth");
		$query="select * from event where e_id='".$id."'";
        $result=mysqli_query($con,$query);
		$count=mysqli_num_rows($result);
			$row=mysqli_fetch_array($result);
			
				$name=$row['e_name'];
				$img=$row['img'];
				$date=$row['e_date'];
				$add=$row['e_address'];
				$desc=$row['e_description'];
				$e_manager=$row['e_manager_email'];
 ?>

        <div class="blog">
          <div class="blog_title"><a href="#"><?php echo $name;?></a></div>
          <center><img src="admin/uploaded_image/<?php echo $img;?>" alt=""></center>

          <p><b><u>Address:</b></u> <?php echo $add;?></p>
          <p><?php echo $desc;?></p>
          <table>
          <tbody>
            <tr>
              <td><time datetime="2014-01-01">
                <span class="fa fa-calendar"></span>
                Event Date: <u><?php echo $date;?></u>
              </time> </td>
			  <?php 
			  	error_reporting(E_ALL ^ E_DEPRECATED);
				$con=mysqli_connect("localhost","root","","joysworth");
				$query="select * from admin where email='".$e_manager."'";
        		$result=mysqli_query($con,$query);
				$row=mysqli_fetch_array($result);
				$n=$row['name'];
		     ?>
              <td><div class="fa fa-user"></div>Organizer: <u><?php echo $n;?> (<?php echo $e_manager;?>)</u></td>
            </tr>
          </tbody>
        </table>
		
<?php
		error_reporting(E_ALL ^ E_DEPRECATED);
		$con=mysqli_connect("localhost","root","","joysworth");
		$query="select * from gallery where g_event='".$id."'";
        $result=mysqli_query($con,$query);
		$count=mysqli_num_rows($result);
		if($count!=0)
		{
			while($row=mysqli_fetch_array($result))
			{
				$img=$row['g_file'];
 ?>
 
	<div class="grid_3" style="margin-top:10px;">
        <div class="gall_block">
          <div class="maxheight">
            <center><img src="admin/uploaded_image/<?php echo $img;?>"alt=""></center>
            <br>
          </div>
        </div>
      </div>
	  <?php
	  }
	  }
	  else
		{
		?>
			<br />

		 <center><div class="text1"><a href="#">No Image Gallery Found</a></div></center>
		<?php
		}
		?>


        </div>
      </div>
    </div>
  </div>
</section>
<!--==============================
              footer
=================================-->
</body>
</html>

