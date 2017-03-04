<?php
$conn=new MySQLi("localhost","root","","project");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Legal Raasta | Home</title>

	<link rel="stylesheet" type="text/css" href="assets/css/home.css" />

	<script src="assets/js/jquery.js"></script>

</head>
<body>
	<button id="add_btn">ADD NEW USER</button>
<!--form-->
	<div id="top_bar"><center><h2>LEGAL RAASTA INTERNSHIP PROJECT<h2></center></div>
	
	<div id='error'>ALL FIELDS ARE REQUIRED *</div>
	
	<div id="form_area">
		<input id="name" type="text" name="name" placeholder="Name" autocomplete="off" maxlength="25" />
			
		<input id="email" type="text" name="email" placeholder="Email" autocomplete="off" />
				
		<input id="dob" type="date" name="dob" max="31-12-2016"/>	

		<input id="pwd" type="password" name="password" placeholder="Password" autocomplete="off" maxlength="10"/>
				
		<button id="submit_btn" name='submit' onclick='insert(),emailcheck();'>Submit</button>
	</div>
 
<!--table-->
	<div id="title">
			<h1>USER'S DATA</h1></div>
	<div id="table_area">
		<table width='100%' border='1' style="text-align:center;font-family:calibri">
							<thead>
							    <tr class="info">
							       <th>ID.NO</th>
								   <th>NAME</th>		
								   <th>EMAIL</th>
								   <th>D.B.O</th>
								   <th>ACTIONS</th>
							    </tr>
							  </thead>
							<tbody>
							  <?php 
								  $select_users = "SELECT * FROM users";
								  $show_users = $conn->query($select_users);
								 
								while ($row = $show_users->fetch_assoc()){
									  $id = $row['id']; 
									  $name = $row['name'];
									  $email = $row['email'];
									  $dob = $row['dob'];
							   ?>
							    <tr>
							      <td><?php echo $id ?></td>
							      <td><?php echo $name ?></td>
							      <td><?php echo $email ?></td>
							      <td><?php echo $dob ?></td>
							      <td>
							      <?php		
							      	$extra = 12;
							      echo "<center><button type='button' onclick='edit($id,$extra)'>EDIT</button>"; 
							      echo "<button onclick='deleteuser($id)'>DELETE</button>";
							      ?>
							      </center></td>
							    </tr>
							  <?php } ?>  
							</tbody>
		</table>
	</div>

	

</body>

<script type="text/javascript">
  	
$(document).ready(function(){
    $("#add_btn").click(function(){
        $("#form_area").slideDown("slow");
    });
});


function insert(){

var name = document.getElementById('name').value;
var email = document.getElementById('email').value;
var dob = document.getElementById('dob').value;
var pwd = document.getElementById('pwd').value;



if(name=='' || email==''|| dob=='' || pwd==''){
	$('#error').css('display','block');		
	return;
}

		var email = document.getElementById('email');
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!filter.test(email.value)) {
				$('#email').focus();
				return;
			}

var name = document.getElementById('name').value;
var email = document.getElementById('email').value;
var dob = document.getElementById('dob').value;
var pwd = document.getElementById('pwd').value;


var xmlhttp;
	    if(window.XMLHttpRequest)
	    { //code for IE7+, firefox, chrome, opera,safari
	      xmlhttp = new XMLHttpRequest();
	    }else{
	      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	      var xmlhttp = new XMLHttpRequest();
	      xmlhttp.onreadystatechange = function()
	    {
		    if(xmlhttp.readyState==4 && xmlhttp.status==200){
		  
			     if(xmlhttp.responseText == "success"){
			     	window.location.reload();
			     }
		  	}
	    }
		  xmlhttp.open('GET','formsubmit.php?email='+email+'&name='+name+'&dob='+dob+'&pwd='+pwd,true);
		  xmlhttp.send();     	

}


function deleteuser(id){
		var xmlhttp;

	    if(window.XMLHttpRequest)
	    { //code for IE7+, firefox, chrome, opera,safari
	      xmlhttp = new XMLHttpRequest();
	    }else{
	      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	      var xmlhttp = new XMLHttpRequest();
	      xmlhttp.onreadystatechange = function()
	    {
		    if(xmlhttp.readyState==4 && xmlhttp.status==200){
		      document.getElementById('table_area').innerHTML = xmlhttp.responseText;
		  	}
	    }
		  xmlhttp.open('GET','formsubmit.php?id='+id,true);
		  xmlhttp.send();	
}


function edit(id,extra){
		var xmlhttp;

	    if(window.XMLHttpRequest)
	    { //code for IE7+, firefox, chrome, opera,safari
	      xmlhttp = new XMLHttpRequest();
	    }else{
	      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	      var xmlhttp = new XMLHttpRequest();
	      xmlhttp.onreadystatechange = function()
	    {
		    if(xmlhttp.readyState==4 && xmlhttp.status==200){
		      $('#form_area').css('display','block');
		      document.getElementById('form_area').innerHTML = xmlhttp.responseText;
		  	}
	    }
		  xmlhttp.open('GET','formsubmit.php?id='+id+'&extra='+extra,true);
		  xmlhttp.send();	
}



function update(id){

var name = document.getElementById('name').value;
var email = document.getElementById('email').value;
var dob = document.getElementById('dob').value;
var pwd = document.getElementById('pwd').value;


if(name=='' || email==''|| dob=='' || pwd==''){
	$('#error').css('display','block');		
	return;
}

		var email = document.getElementById('email');
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!filter.test(email.value)) {
				$('#email').focus();
				return;
			}


var name = document.getElementById('name').value;
var email = document.getElementById('email').value;
var dob = document.getElementById('dob').value;
var pwd = document.getElementById('pwd').value;


	var xmlhttp;
	    if(window.XMLHttpRequest)
	    { //code for IE7+, firefox, chrome, opera,safari
	      xmlhttp = new XMLHttpRequest();
	    }else{
	      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	      var xmlhttp = new XMLHttpRequest();
	      xmlhttp.onreadystatechange = function()
	    {
		    if(xmlhttp.readyState==4 && xmlhttp.status==200){
		  
			     if(xmlhttp.responseText == "updated"){
			     	window.location.reload();
			     }
		  	}
	    }
		  xmlhttp.open('GET','formsubmit.php?email='+email+'&name='+name+'&dob='+dob+'&pwd='+pwd+'&id='+id,true);
		  xmlhttp.send();

}



</script>


</html>