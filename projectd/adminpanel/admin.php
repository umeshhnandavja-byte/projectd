<html>
    <head>
        <title>Admin</title>
        <link rel="icon" href="/projectd/letter-d.png">
		<link rel="stylesheet" href="admin.css">
    </head>
    <body>
		<h2>Users Data</h2>
	<table>
	    <tr>
	        <th>S.No</th>
			<th>Photo</th>
			<th>Name</th>
			<th>Username</th>
            <th>Email</th>
			<th>Password</th>
			<th>Actions</th>
	    </tr>
		<?php
			
			$conn = new mysqli("localhost" , "root" , "", "projectd");

			if($conn->connect_error){
    			die('Connection Error');
			}

			$r = $conn->query("SELECT * FROM signup");

			while($row = $r->fetch_assoc()){
				echo"<tr>
					<td>". $row["id"] ."</td>
					<td>". $row["photo"] ."</td>
					<td>". $row["name"] ."</td>
					<td>". $row["username"] ."</td>
                    <td>". $row["email"] ."</td>
					<td>". $row["password"] ."</td>
					<td><a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure?')\">Delete</a></td>
				</tr>";
			}
		?>
		<tr>
			
		</tr>
	</table>
		<h2>Funds Data</h2>
		<table>
	    <tr>
	        <th>S.No</th>
			<th>Organization</th>
			<th>Phonenumber</th>
            <th>Email</th>
			<th>Actions</th>
	    </tr>
		<?php
			
			$conn = new mysqli("localhost" , "root" , "", "projectd");

			if($conn->connect_error){
    			die('Connection Error');
			}

			$r = $conn->query("SELECT * FROM newfund");

			while($row = $r->fetch_assoc()){
				echo"<tr>
					<td>". $row["id"] ."</td>
					<td>". $row["organisation"] ."</td>
					<td>". $row["phonenumber"] ."</td>
                    <td>". $row["email"] ."</td>
					<td><a href='delete1.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure?')\">Delete</a></td>
				</tr>";
			}
		?>
		<tr>
			
		</tr>
	</table>
    </body>
</html>
