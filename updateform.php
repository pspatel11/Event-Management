<!DOCTYPE html>
<html lang="en">
<head>
<title>Joysworth</title>
<meta charset="utf-8">
<meta name = "format-detection" content = "telephone=no" />
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="css/stuck.css">
<link rel="stylesheet" href="css/style.css">


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

<!--==============================
            Stuck menu
=================================-->
<?php include("header.php");
error_reporting(E_ALL ^ E_DEPRECATED);?>   

<!--=====================
          Content
======================-->
<div class="form_block" style="background-color:#FFFFFF;">
  <div class="container">
    <div class="row">
	  <div class="grid_12">

<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
	error_reporting(E_ALL ^ E_DEPRECATED);
	$con=mysqli_connect("localhost","root","","joysworth");
	$query="select * from user where email='".$_SESSION['username']."'";
    $result=mysqli_query($con,$query);
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
		$name=$row['name'];
		$age=$row['age'];
		$add=$row['address'];
		$mob=$row['contact'];

?>

        <h2>Update</h2>
        <form id="form" method="post" action="updateuser.php" >
       <table>
			<tr>
				<td>
				<label class="name">
				<input type="text" name="name" placeholder="Name:" value="<?php echo $name;?>" data-constraints="@Required @JustLetters" />
				<span class="empty-message">*This field is required.</span>
				<span class="error-message">*This is not a valid name.</span>
				</label>         
				</td>
			</tr>
			<tr>
				<td>
					<label class="Age">
					<input type="text" name="age" placeholder="Age:" value="<?php echo $age;?>" data-constraints="@Required"/>
					<span class="empty-message">*This field is required.</span>
					<span class="error-message">*This is not a valid phone.</span>
					</label>
				</td>
			</tr>
						<tr>
				<td>
					<label class="Address">
					<input type="text" name="add" placeholder="Address:" value="<?php echo $add;?>" data-constraints="@Required"/>
					<span class="empty-message">*This field is required.</span>
					<span class="error-message">*This is not a valid phone.</span>
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<label class="phone">
					<input type="text" name="mob" placeholder="Phone:" value="<?php echo $mob;?>" data-constraints="@Required @JustNumbers"/>
					<span class="empty-message">*This field is required.</span>
					<span class="error-message">*This is not a valid phone.</span>
					</label>
				</td>
			</tr>
		</table>
		
		<input type="submit" value="Update">

        </form> 
		</div>
		
    </div>
  </div>
</div>

<!--==============================
              footer
=================================-->
</body>
</html>