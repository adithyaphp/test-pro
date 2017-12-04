<?php
    session_start();
    ob_start();
    //ini_set('error_reporting', E_NONE);

   include "config.php";
 if(isset($_SESSION["VALID_AGENT_IDENTITY"]))
    {
      $aid = $_SESSION["VALID_AGENT_IDENTITY"];
    }
    else
    {
      header('Location:index.php?message=Unauthorised%20Access%20Prohibited');
    }
    $agname = $_SESSION["nameage"];
    
    $today = date('Y-m-d');

?>


<!DOCTYPE html>
<html>

<head>
    <title>Piza Hut -- Agent</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='font/fonts.css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='font/fonts1.css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
	<link rel="icon" href="img/logo.png" type="image/png" sizes="17x17">
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="lib/css/select2.min.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" ="css/themes/flat-blue.css">
	<script>href
	function refresh()
	{
	$("#refresh").hide();
	$("#showtable").hide();
	$("#hidetable").show();
	$("#spin").show();
	}
	function rowXMoved()
	{
	$("#refresh").show();
	$("#showtable").show();
	$("#hidetable").hide();
	$("#spin").hide();
	}

	
	</script>
	<script type="text/javascript" src="js/profilein.js"></script>
</head>

<body class="flat-blue">
    <div class="app-container expanded">
        <div class="row content-container">
            <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-expand-toggle">
                            <i class="fa fa-bars icon"></i>
                        </button>
                        <ol class="breadcrumb navbar-breadcrumb">
                            <li class="active">Dashboards</li>
                        </ol>
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-th icon"></i>
                        </button>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<span class="glyphicon glyphicon-user"></span> <?php echo $agname;?>  <span class="caret"></span></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <br>
                          
									<li>
								<a href="" data-toggle="modal" data-target="#modalSuccess"><i class="fa fa-user"></i> Profile</a></li>
							
								<hr>	
							<!--	<li>
								<a href="" data-toggle="modal" data-target="#changepass"><i class="fa fa-key"></i> Change Password </a></li>
							
								<hr>-->
								 <li>
								 <a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a>
                                  
                                </li>
								<br>
							
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
			
			
			
			<?php include("agent_sidelink.php"); ?>
 <div class="container-fluid">
                <div class="side-body padding-top">
     
	  
	  
	  <div class="row">
	  <div class="col-md-12">
	  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="">
	   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="color: #FFF; background-color:#9C0E15;">
	  <h3 >Today's Complaint List</h3>
	  </div>
	    <br>
	    <br>
	  
	  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:#f5f3ed;">
	  
	  <center>
	  <br>
	  <br>
	  
	  <table width="100%" id="limit5">
	  <thead>
	  <tr> 
	  <th width="30%">Ticket Id</th>
	  <th width="15%">Mobile</th>
	  <th width="45%">Reason </th>
	  <th width="15%">Level</th>
	  </tr>
	    </thead>
		<tbody id="showtable">
	  <tr>
	  <td colspan="4"><br><td>
	  </tr>
	  <?php
	  	$list = mysql_query("SELECT * FROM `complaints` WHERE agid = '$aid' and dateofcc = '$today' order by id desc limit 5 ");
	  	while($list1 = mysql_fetch_assoc($list))
	  {
	  	$i=1;
	  ?>
	  
	  <tr>
	  <td> <span class="username"><?php echo $list1['tickid']; ?></span> <span class="message-datetime"><?php echo $list1['e1']; ?></span></td>
	  <td> <?php echo $list1['mobileno']; ?></td>
	  <td><?php echo $list1['reason']; ?></td>
	  <td><?php echo $list1['status']; ?></td>
	  </tr>  
	  <tr><td colspan="4"></td></tr>
	  <?php
	  $i++;
	  }
	  ?>
	  
	</tbody>
	
	
	<tbody id="hidetable" style="display:none">
	
	<tr>
	  <td colspan="4"><br><td>
	  </tr>
	 <?php
	  	$list_all = mysql_query("SELECT * FROM `complaints` WHERE agid = '$aid' and dateofcc = '$today' order by id desc ");
		$i=1;
	  	while($list1_all = mysql_fetch_assoc($list_all))
	  {
	  	
	  ?>
	  
	  <tr>
	  <td> <span class="username"><?php echo $list1_all['tickid']; ?></span> <span class="message-datetime"><?php echo $list1_all['e1']; ?></span></td>
	  <td> <?php echo $list1_all['mobileno']; ?></td>
	  <td><?php echo $list1_all['reason']; ?></td>
	  <td><?php echo $list1_all['status']; ?></td>
	  </tr>  
	  <tr><td colspan="4"></td></tr>
	  <?php
	  $i++;
	  }
	  ?>
	
	</tbody>
	
	  </table>
	 </center>
	 <br>

	 <p id="refresh" style="text-align:right; cursor: pointer;" onclick="return refresh();">
	 <i class="fa fa-refresh"></i> Load more......</p> 
	 <p id="spin" style="text-align:right;display:none; cursor: pointer;"  onclick="return rowXMoved()">
	 <i class="fa fa-refresh fa-spin"></i> Back......</p>
	  </div>
	  </div>

	  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="    margin-left: 21px;">
	  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:#9C0E15;">

	  
	  <h3 style="color: #FFF;">Today Complaint's</h3>
 
	  </div>
	  	  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:#f5f3ed; ">
		  <br>
		  <br>
		  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
	  <i class="fa fa-phone fa-lg" style="font-size: 20.333333em;
    color: rgb(194, 225, 255);"></i>
	<br>
<br>
	</div>		  
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"  style="margin-top: 30px;">
	<?php 
	
	$sql=mysql_query("select count(*) from complaints where agid='$aid' and dateofcc='$today'");

	$num_call=mysql_fetch_array($sql);
	
	?>
	
	 <h1><?php echo $num_call[0];?></h1>
	</div>
<br>

	  </div>
	  </div>
	  </div>
	  
	  
	    <div class="row">
	   <div class="col-md-12">
	  
	  <center> <h3 style="color: #9C0E15;"> Last 7 Days Complaints</h3>
	  <?php
	  $query1 = "select * from  agentcomplaintanalysiss where agentname = '$aid' and date BETWEEN '$today' - INTERVAL 7 DAY AND '$today' order by id asc";
	  
    $result1 = mysql_query( $query1 );

		
    if( mysql_num_rows($result1)){
 
    ?>
        <!-- load api -->
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Complaints'],
		  <?php
		 		 clearstatcache();
				while( $row1 = mysql_fetch_assoc($result1) ){
					extract($row1);
					echo "['{$date}', {$count}],";
				}
			?>
        ]);

        var options = {
          title: '',
          hAxis: {title: 'Days',  titleTextStyle: {color: '#333'}},
    
        colors: ['#3399ff', '#3399ff'],
          vAxis: {minValue: 0,format: '0'}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
       <div id="chart_div"  style="width: 800px; height: 240px;margin-left: -97px;">
	   
	   
	   
	   
	   </div>
	   </center>
    <?php
 
    }else{
        echo "No Data found.";
    }
    ?>
	
	  
	  
	  </div>
	  </div>
	
                </div>
            </div>
    
        <footer class="app-footer">
            <div class="wrapper">
			Design and Developed by <a  target="_blank" href="https://www.way2mint.com/">Way2Mint Service</a>
                <span class="pull-right"><a target="_blank" href="https://orders.pizzahut.co.in/phindia/web/#">Pizza Hut</a></span> 
            </div>
        </footer>
        <div>
		<?php
		$sql=mysql_query("select *  from agent where logid='$aid'");
		$my=mysql_fetch_array($sql);
		
		?>
		
<div class="modal fade modal-primary in" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 17px;margin-top: 113px;">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
    <h4 class="modal-title" id="myModalLabel">Profile Edit</h4>
                                                    </div>
 <div class="modal-body">
  <div class="row">
<div class="col-lg-12 col-md-12 col-xs-12 col-xsm-12">
<form name="profile" id="profile" method="POST" onsubmit="return check_pro()">
<center>
<div class="col-lg-8 col-md-8 col-xs-12 col-xsm-12">
<label class="col-lg-4 col-md-4 col-xs-12 col-xsm-12">Name<i class="fa fa-asterisk" style="color:red"></i></label>
<div class="col-lg-8 col-md-8 col-xs-12 col-xsm-12">

<input type="text" name="name" id="name" class="form-control" value="<?php echo $my['name'];?>" disabled="disabled"><br></div>

  <label class="col-lg-4 col-md-4 col-xs-12 col-xsm-12">User Id</label>
<div class="col-lg-8 col-md-8 col-xs-12 col-xsm-12">

<input type="text" name="userid" id="userid" class="form-control" value="<?php echo $my['logid'];?>" disabled="disabled"><br>
  </div>  
  <!--<label class="col-lg-4 col-md-4 col-xs-12 col-xsm-12">Password</label>
<div class="col-lg-8 col-md-8 col-xs-12 col-xsm-12">

<input type="text" name="password" id="password" class="form-control" value="<?php //echo $my['password'];?>" ><br>
  </div>-->
  <label class="col-lg-4 col-md-4 col-xs-12 col-xsm-12">Mobile</label>
<div class="col-lg-8 col-md-8 col-xs-12 col-xsm-12">

<input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $my['mobile'];?>"><br>
  </div> 
  <label class="col-lg-4 col-md-4 col-xs-12 col-xsm-12">Email</label>
<div class="col-lg-8 col-md-8 col-xs-12 col-xsm-12">

<input type="text" name="email" id="email" class="form-control" value="<?php echo $my['email'];?>">
<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $my['id'];?>"><br>
  </div>
  <center>
  <button name="submit" id="submit" class="btn btn-danger">Submit</button>
  </center>
  </div>
  </center>
  </div>
  </div>
  
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										
										
										
<div class="modal fade modal-primary in" id="changepass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 17px;margin-top: 113px;">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
    <h4 class="modal-title" id="myModalLabel">Change Password</h4>
        </div>
 <div class="modal-body">
  <div class="row">
<div class="col-lg-12 col-md-12 col-xs-12 col-xsm-12">
<form name="passw" id="passw" method="POST" onsubmit="return passw()">
<center>
<div class="col-lg-12 col-md-12 col-xs-12 col-xsm-12">
<label class="col-lg-4 col-md-4 col-xs-12 col-xsm-12">Current Password<i class="fa fa-asterisk" style="color:red"></i></label>
<div class="col-lg-8 col-md-8 col-xs-12 col-xsm-12">
<input type="text" name="currentpass" id="currentpass" class="form-control"  onkeyup="return check_pass(this.value,'<?php echo $my['password']; ?>')">
<input type="hidden" name="hidpass" id="hidpass" value="<?php echo $my['password']; ?>" class="form-control"  >
<input type="hidden" name="newpass1" id="newpass1" value="">
<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $my['id'];?>">


<br></div>

<div class="col-lg-12 col-md-12 col-xs-12 col-xsm-12">

<p style="color:red; display:none" id="in_correct">Current Password Doesn't Match  </p>

</div>

  <label class="col-lg-4 col-md-4 col-xs-12 col-xsm-12">New Password<i class="fa fa-asterisk" style="color:red"></i></label>
<div class="col-lg-8 col-md-8 col-xs-12 col-xsm-12">

<input type="password" name="newpass" id="newpass" class="form-control"  ><br>
  </div>  

  <label class="col-lg-4 col-md-4 col-xs-12 col-xsm-12">Re-Enter Password<i class="fa fa-asterisk" style="color:red"></i></label>
<div class="col-lg-8 col-md-8 col-xs-12 col-xsm-12">

<input type="password" name="re-enter" id="re-enter" onkeyup="return re_check(this.value)" class="form-control" ><br>
  </div> 
  <div class="col-lg-12 col-md-12 col-xs-12 col-xsm-12">
<input type="hidden" name="repass" id="repass" value="">
<p style="color:red; display:none" id="in_correct_new">Password Doesn't Match</p>

</div>
  <center>
  <button name="submit" id="submit" class="btn btn-danger" onclick="return passw()">Submit</button>
  </center>
  </div>
  </center>
  </div>
  </div>
  
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>