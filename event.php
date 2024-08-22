<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>

 <?php
		error_reporting(E_ALL ^ E_DEPRECATED);
		error_reporting(E_ALL ^ E_DEPRECATED);$con=mysqli_connect("localhost","root","","joysworth");
 		if(isset($_SESSION['username']))
		{
			$query="select * from event where e_id NOT IN (Select e_id from participant where p_id='".$_SESSION['username']."')";
		}
		else
		{
			$query="select * from event";
		}
         $result=mysqli_query($con,$query);
		$count=mysqli_num_rows($result);
		if($count!=0)
		{
			while($row=mysqli_fetch_array($result))
			{
				$e_id=$row['e_id'];
				$name=$row['e_name'];
				$img=$row['img'];
				$date=$row['e_date'];
				$add=$row['e_address'];
 ?>
<div class="grid_4" style="margin-bottom:10px;">
        <div class="gall_block">
          <div class="maxheight">
		  <a href="display.php?id=<?php echo $e_id;?>">
            <center><img src="admin/uploaded_image/<?php echo $img;?>"alt=""></center>
            <div class="gall_bot">
            <div class="text1"><center><?php echo $name;?></center></div></a>
	        <center><?php echo $add;?></center>
			<center><?php echo $date;?></center>
            <br>
			<?php
			if(isset($_SESSION['username']))
			{
				?>
				<center><a href="participate.php?id=<?php echo $e_id;?>" onclick="myFunction()" class="btn">Participate</a></center></div>
				<?php
			}
			else
			{
				?>
				<center><a href="profile.php" class="btn">Login/Register For Participate</a></center></div>
				<?php
			}
			?>
          </div>
        </div>
      </div>
	  <?php
	  }
	  }
	  else
		{
		?>
		 <div class="text1"><a href="#">No Event Found</a></div>
		<?php
		}
		?>
			
</body>
</html>

<script>
function myFunction()
{
alert("Participated Successfully");
}
</script>