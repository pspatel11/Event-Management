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
error_reporting(E_ALL ^ E_DEPRECATED); ?> 

<div class="form_block" style="background-color:#FFFFFF;">
  <div class="container">
    <div class="row">
	  <div class="grid_12">

<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_SESSION['username']))
{
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

      <div class="grid_6">
        <h2>User Information</h2>
        <form id="form">
       <table>
			<tr>
				<td>
					<input type="text" value="Name: <?php echo $name?>" readonly="readonly"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" value="Age: <?php echo $age?>" readonly="readonly"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" value="Address: <?php echo $add?>" readonly="readonly"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" value="Contact no:<?php echo $mob?>" readonly="readonly"/>
				</td>
			</tr>
			
		</table>
		<a href="updateform.php" class="btn">Update Profile</a>

        </form> 
		</div>
		<div class="grid_5">
			        <div class="blog">
          <div class="blog_title"><a>Events which is you participant</a></div>
          <table>
          <tbody>

              <?php 
			  error_reporting(E_ALL ^ E_DEPRECATED);
			  	error_reporting(E_ALL ^ E_DEPRECATED);
				$con=mysqli_connect("localhost","root","","joysworth");
				$query="select * from event where e_id IN (select e_id from participant where p_id='".$_SESSION['username']."')";
        		$result=mysqli_query($con,$query);
				$count=mysqli_num_rows($result);
				if($count!=0)
				{
					while($row=mysqli_fetch_array($result))
					{
						$eid=$row['e_id'];
						$e_name=$row['e_name'];
						$e_date=$row['e_date'];
		    		?>
              			<tr>
							<td><a href="display.php?id=<?php echo $eid;?>"><?php echo $e_name." ".$e_date;?></a></td>
								<?php
									$g=date_default_timezone_get();
									date_default_timezone_set($g);
									$c_date = date('Y-m-d');
									$diff=abs(strtotime($e_date) - strtotime($c_date));
									$days = $diff/(60 * 60 * 24);
								
									if($days>2)
									{
								?>
							<td><a href="remove.php?id=<?php echo $eid;?>">Remove Event</a></td>
									<?php 
									}
									else if($days==0)
									{
									?>
									<td>Today is your event</td>									
									<?php
									}
									else
									{
									?>
							<td>Contestent Final</td>
							<?php
							}
							?>
						</tr>
					<?php
					}
				}
				else
				{
				?>
				<td>Still Not Participated in any event</td>
				<?php
				}
				?>
          </tbody>
        </table>

		</div>


<?php
}
else
{
?>
      <div class="grid_6">
        <h2>Registration</h2>
        <form id="form" method="post" action="userregister.php" >
       <table>
			<tr>
				<td>
				<label class="name">
				<input type="text" name="name" placeholder="Name:" value="" data-constraints="@Required @JustLetters" />
				<span class="empty-message">*This field is required.</span>
				<span class="error-message">*This is not a valid name.</span>
				</label>         
				</td>
			</tr>
			<tr>
				<td>
					<label class="email">
					<input type="text" name="email" placeholder="E-mail:" value="" data-constraints="@Required @Email" />
					<span class="empty-message">*This field is required.</span>
					<span class="error-message">*This is not a valid email.</span>
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<label class="Age">
					<input type="text" name="age" placeholder="Age:" value="" data-constraints="@Required"/>
					<span class="empty-message">*This field is required.</span>
					<span class="error-message">*This is not a valid phone.</span>
					</label>
				</td>
			</tr>
						<tr>
				<td>
					<label class="Address">
					<input type="text" name="add" placeholder="Address:" value="" data-constraints="@Required"/>
					<span class="empty-message">*This field is required.</span>
					<span class="error-message">*This is not a valid phone.</span>
					</label>
				</td>
			</tr>
						<tr>
				<td>
					<label class="phone">
					<input type="text" name="mob" placeholder="Phone:" value="" data-constraints="@Required @JustNumbers"/>
					<span class="empty-message">*This field is required.</span>
					<span class="error-message">*This is not a valid phone.</span>
					</label>
				</td>
			</tr>
						<tr>
				<td>
					<label class="password">
					<input type="password" name="pass" placeholder="Password:" value="" data-constraints="@Required"/>
					<span class="empty-message">*This field is required.</span>
					</label>
				</td>
			</tr>
		</table>
		
		<input type="submit" value="Register">

        </form> 
		</div>
		
		      <div class="grid_5">
        <h2>Login</h2>
        <form id="form" method="post" action="session1.php" >
       
		<table>
			<tr>
				<td>
					<label class="email">
					<input type="text" name="username" placeholder="E-mail:" value="" data-constraints="@Required @Email" />
					<span class="empty-message">*This field is required.</span>
					<span class="error-message">*This is not a valid email.</span>
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<label class="password">
					<input type="password" name="password" placeholder="Password:" value="" data-constraints="@Required"/>
					<span class="empty-message">*This field is required.</span>
					</label>
				</td>
			</tr>
		</table>
			<input type="submit" value="Login">

        </form> 
		</div>
<?php
}
?>
      </div>
    </div>
  </div>
</div>

<!--==============================
              footer
=================================-->
</body>
</html>
