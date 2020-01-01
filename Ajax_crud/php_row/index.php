<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ajax Crud - PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>

<div class="container">
  <h1 class="text-primary text-center">Ajax Crud - PHP Row</h1><hr/>
  
  <div class="">
 	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addData">+Add Data</button> 	
  </div>
<!-- The Modal -->
<div class="modal" id="addData">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
<div class="modal-body">
	<form action="" method="post">
	  <div class="form-group">
	    <label for="name">Name: </label>
	    <input type="text" class="form-control" name="name" placeholder="Enter name" id="name">
	  </div>
	  <div class="form-group">
	    <label for="phone">Phone:</label>
	    <input type="text" class="form-control" name="phone" placeholder="Enter Phone" id="phone">
	  </div>
	</form>
</div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addData()">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="" id="records_contant"></div>

</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	
  	$(document).ready(function(){
		readRecords(); 
	}); 


//data fetch / get functions..
   function readRecords(){
    	var readrecords = "readrecords"; 
    	$.ajax({
    		url:"apps.php",
    		type:"post",
    		data:{readrecords:readrecords},
    		success:function(data,status){
    			$('#records_contant').html(data); 
    		}
    	});
    }

  	function addData(){
  		var name = $('#name').val(); 
  		var phone = $('#phone').val(); 
      if(name != ''){
  		$.ajax({
  			url:"apps.php",
  			type:"post",
  			data:{
  				name : name,
  				phone : phone
  			},
  			success:function(data,status){
  				readRecords();
  			}
  		}); 
      }else{
        alert('Field must not empty !'); 
      } 
  	}

    //delete data..
    function deleteData(deleteid){
      var conf = confirm('Are you sure to delete !'); 

      if(conf == true){
        $.ajax({
          url : "apps.php",
          type : "post",
          data : {
            deleteid : deleteid
          },
          success: function(){

          }
        });
      }
    }
  </script>
</body>
</html>