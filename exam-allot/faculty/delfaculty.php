<?php
	$pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bhalujadhav007' );
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
  $stmt = $pdo->query("select * from faculty order by fid ");
try{
if(isset($_POST['fid'])){
$sqldel=("delete from faculty where fid=:fid");
  if(isset($_POST['del'])){
    $stmt=$pdo->prepare($sqldel);
    $stmt->execute(array(
      ':fid'=>$_POST['fid'],
    )
    );
     unset($_POST);
      header("Location: delfaculty.php");
      return;
  }
}
}catch(Exception $e)
  {
      echo "Internal Error Contact Admin";
      error_log("delfaculty.php,SQL error=".$e->getMessage());
  }

 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Remove Faculty </title>
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../images/logo0.png" type="image/x-icon" >
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<style type="text/css">
form {
		margin: 220px;
		margin-top:30px; 
		padding: 20px;
		border-color: red;
		border: 2px; 
		border-style: groove; 
	}
</style>
<body>
	<h1 class="jumbotron">Remove A Faculty</h1>
	<form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="fid">FID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fid" name="fid" placeholder="" required>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="del">Delete</button>
    </div>
  </div>
</form>
	



  <div class="container-fluid">
  <div class="panel panel-default">
    <div class="table-responsive" >
  <?php 
  echo ('<table class="table table-hover table-bordered table-striped"><tbody>');  
  echo "<tr><td>";
    echo ("FID");
    echo "</td><td>";
    echo ("Fname");
    echo "</td><td>";
    echo ("Mname");
    echo "</td><td>";
    echo ("Lname");
    echo "</td><td>";
    echo ("Dept Name");
    echo "</td><td>";
    echo ("Email");
    echo "</td><td>";
    echo ("Ph.no.");
    echo "</td></tr>";
  while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
  {
    echo "<tr><td>";
    echo ($row['fid']);
    echo "</td><td>";
    echo ($row['fname']);
    echo "</td><td>";
    echo ($row['mname']);
    echo "</td><td>";
    echo ($row['lname']);
    echo "</td><td>";
    echo ($row['deptname']);
    echo "</td><td>";
    echo ($row['email']);
    echo "</td><td>";
    echo ($row['phno']);
    echo "</td></tr>";
  }
  echo "</tbody></table>\n";
  ?>
    </div>
  </div>
  
</div>

</body>
</html>