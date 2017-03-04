<?php
$conn=new MySQLi("localhost","root","","project");


	if(count($_GET) == 4){
		 $conn=new MySQLi("localhost","root","","project");
		 

		 
		  $name = $_GET['name'];
		  $email = $_GET['email'];
		  $dob = $_GET['dob'];
		  $pwd = $_GET['pwd'];
		 
		 
		$add_user = "INSERT INTO users VALUES ('','$name','$email','$dob','$pwd')";
		$added = $conn->query($add_user);


		if ($added) {
			echo "success";
		}else{
			echo "failed";
		}


	}


	if(count($_GET) == 5){
		 
		 $conn=new MySQLi("localhost","root","","project");
		 		 
		  $name = $_GET['name'];
		  $email = $_GET['email'];
		  $dob = $_GET['dob'];
		  $pwd = $_GET['pwd'];
		  $id = $_GET['id'];
		 
		 
		$update_user = "UPDATE users SET name='$name', email='$email', dob='$dob', password='$pwd' WHERE id='$id'";
		$updated = $conn->query($update_user);

		if ($updated) {
			echo "updated";
		}else{
			echo "not_updated";
		}
	}
     

    if(count($_GET) == 1){
	  $conn=new MySQLi("localhost","root","","project");
		 

		 
		$id = $_GET['id'];
		 
		$delete_user = "DELETE FROM users WHERE id='$id'";
		$deleted = $conn->query($delete_user);

		if($deleted){	
		?>	

						<table width="100%" border='1'>
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
								      <td><center><button type="button">EDIT</button>
								      <?php 
								      echo "<button onclick='deleteuser($id)'>DELETE</button>";
								      ?>
								      </center></td>
								    </tr>
							  <?php } ?>  
							
							</tbody>
						</table>

<?php
		}
	}	 


	if(count($_GET) == 2){
		 $conn=new MySQLi("localhost","root","","project");
		 
		  $id = $_GET['id'];
		  $extra = $_GET['extra'];
		  		 
		$select_user = "SELECT * FROM users WHERE id='$id'";
		$selected = $conn->query($select_user);
		$extract = $selected->fetch_assoc();

		$id = $extract['id'];
		$name = $extract['name'];
		$email = $extract['email'];
		$dob = $extract['dob'];
		$password = $extract['password'];
		
	?>

		
		<input id="name" type="text" name="name" placeholder="Name" value='<?php echo $name ?>' autocomplete="off" maxlength="25" />
			
		<input id="email" type="text" name="email" placeholder="Email" autocomplete="off" value='<?php echo $email ?>'/>
				
		<input id="dob" type="date" name="dob" max="31-12-2016" value='<?php echo $dob ?>'/>	

		<input id="pwd" type="password" name="password" placeholder="Password" autocomplete="off" maxlength="10" value='<?php echo $password ?>' />
	
	<?php
		echo "<button id='update_btn' name='submit' onclick='update($id)'>Update</button>";
	}
	?>