<?php 
	$conn = mysqli_connect("localhost", "root", "", "ajax_crud") or die('Saipu-s server not connected !'); 

	if(isset($_POST['readrecords'])){
		$query = "SELECT * FROM `tbl_php_row`";
		$result = mysqli_query($conn,$query); 
		if(mysqli_num_rows($result) > 0){
			$data = '<br/><table class="table table-stripped table-border"><tr><th>Sl</th><th>Name</th><th>Phone</th><th>Action</th></tr>';
			$i = 0; 
			while($row = mysqli_fetch_array($result)){
				$i++; 
				$data .= '<tr><td>'.$i.'</td><td>'.$row['name'].'</td><td>'.$row['phone'].'</td><td><a href="" class="btn btn-danger btn-sm" onclick="deleteData('.$row['id'].') ">Delete</a></td></tr>';
			}
			$data .= '</table>';
			echo $data; 
		}
	}

	if(isset($_POST['name']) && isset($_POST['phone'])){
		$name = $_POST['name']; 
		$phone = $_POST['phone']; 

		$query = "INSERT INTO `tbl_php_row` (`id`, `name`, `phone`) VALUES (NULL, '$name', '$phone')"; 

		mysqli_query($conn,$query); 
	}

	if(isset($_POST['deleteid'])){
		$delid = $_POST['deleteid']; 
		$delQuery = "DELETE FROM tbl_php_row WHERE id = $delid";
		mysqli_query($conn,$delQuery); 
	}


?>