 <?php
 	$del = @$_GET['del'];
 ?>
 <script>
 function DeleteItem(param){
		var del = confirm("Are you sure you want to delete this record?");
		if(del == true){
			window.location = "controller/delete_doctor.php?doc_id="+param;
		}
	} 
function ViewDetails(param){
	window.location = "doctors.php?doc=doc_details&&id="+param;
}
 </script>
 <div class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="doctors.php">Doctors</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="doctors.php?doc=available">List of Available Doctors</a></li>
              <li class="active"><a href="doctors.php?doc=alldoctors">List of all Doctors</a></li>
              <li><a href="doctors.php?doc=adddoctor">Add a Doctor</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

<div class="container">
	<span>
    	<?php
			if($del == "succ"){
				echo "<div class='alert alert-success'>Details successfully deleted!</div>";
			}
		?>
    </span>
	<a href="controller/all_doctors_report.php"><span class="glyphicon glyphicon-print"></span> Print report</a>
	<center><table class="table table-striped">
    	<thead>
        	<tr style="color:#000;"><th>Doctor's Name</th><th>Specialization</th><th>Duty</th><th>Contact Number</th><th>Hospital</th></tr>
        </thead>
        <tbody>
            	<?php
				$sql = mysql_query("SELECT * FROM hos_doctor") or die(mysql_error());
				$docs = mysql_fetch_array($sql);
				
				if($docs > 0){
				do{
					echo "<tr><td>$docs[first_name] $docs[middle_name] $docs[last_name]</td><td>$docs[specialization]</td><td>$docs[duty]</td><td>$docs[phone]</td><td>$docs[hospital_id]</td><td><button class='btn btn-xs btn-info' onClick=ViewDetails($docs[id])>Details</button></td><td><button class='btn btn-xs btn-danger' onClick='DeleteItem($docs[id])'>Delete</button></td></tr>";
				}
				while($docs = mysql_fetch_array($sql));
				}else{
					echo "<tr><td align='center' colspan='6'>NO RECORDS FOUND</td></tr>";
				}
			?>
            </tbody>
        </table></center>
</div>