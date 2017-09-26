<?php 
include('serverdata.php'); 
 session_start();
 if(!isset($_SESSION['user']))
 {
   header('location:index.php');
 }
  if(isset($_GET['edit']))
  {
    $id=$_GET['edit'];
    $edit_state=true;
    $rec=mysqli_query($database,"SELECT * FROM users WHERE id=$id");
    $record=mysqli_fetch_array($rec);
    $fname=$record['firstname'];
    $lname=$record['lastname'];
    $phone=$record['phone'];
    $date_joined =$record['date_joined'];
    $date_edited =$record['date_edited'];
    $id=$record['id'];
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>crud </title>
  <meta charset="UTF-8">
  <meta name="description" content="crud operations">
  <meta name="keywords" content="HTML,CSS,BOOTSTRAP,jquery,php">
  <meta name="author" content="Madhu">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>
<body>
  <?php 
    if(isset($_REQUEST['msg']))
    {
      if($_REQUEST['msg'] == 'success')
      {
        $message = 'Details Saved';
      }
      else if($_REQUEST['msg'] == 'deleted')
      {
        $message = 'Details Deleted';
      }
      else
      {
        $message = 'Details Updated';
      }
    }
    else
    {
        $message = '';
    }
  ?>
  <?php if($message!= ''){ ?>
    <div class='msg'><?=$message; header( "refresh:5;url=data.php");?></div>
  <?php  } ?>
  <div class="col-lg-12">
   <div class="col-lg-8">
   <div class="well"> 
      <a href="logout.php" id='add' class="btn btn-sm btn-success pull-right" style="margin-bottom: 4px;">logout</a>
      <table class="table table-responsive" id='data'>
       <thead>
         <tr>
           <th>Firstname</th>
           <th>Lastname</th>
           <th>Phonenumber</th>
           <th>joined date</th>
           <th>Edited date</th>
           <th>Edit</th>
           <th>Delete</th>
         </tr>
       </thead>
       <tbody>
         <?php
           $read="SELECT * FROM users" ;
           $result = mysqli_query($database,$read);
           while($row = mysqli_fetch_array($result)) {
            ?>
           <tr>
             <td><?php echo $row['firstname'];?></td>
             <td><?php echo $row['lastname']; ?></td>
             <td><?php echo $row['phone'];    ?></td>
             <td><?php echo date('m/d/Y',strtotime($row['date_joined']));?></td>
             <td><?php echo date('m/d/Y',strtotime($row['date_edited']));?></td>
             <td><a href="data.php?edit=<?php echo $row['id'];?>" id='edit'>Edit</a></td>
             <td><a  onClick="Delete(<?php echo $row['id']; ?>)" class='delete'>Delete</a></td> 
           </tr>
         <?php  }?>
       </tbody>
     </table>    
   </div>
   </div>
   <div class="col-lg-4">
   <div class="panel">
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" > 
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
      <div class="form-group">
        <label>Firstname</label>
        <input type="text" class="form-control" id='firstname' name="firstname" value="<?php echo $fname;?>"/>
         <p id='first'></p> 
      </div> 
      <div class="form-group">
        <label>Lastname</label>
        <input type="text" class="form-control" id='lastname' name="lastname" value="<?php echo $lname;?>"/>
        <p id='last'></p>
      </div> 
      <div class="form-group">
        <label>Phone</label>
        <input type="number" class="form-control" id='phone' name="phone" value="<?php echo $phone;?>"/> 
        <p id='phonemsg'></p> 
      </div>
      <div>
        <?php if($edit_state == false): ?>
        <button type="submit" id="submit"  name ="save" class="btn btn-primary btn-sm">save</button>
        <?php else : ?>
        <button type="submit" id="submit"  name='update' class="btn btn-info btn-sm">Update</button>
        <?php endif ?>
     </div>
  </form> 
</div>
</div> 
</body>
 <script src="./assets/js/crudjs.js"></script>
 <script type="text/javascript">
  function Delete(delid)
  {
     if (confirm('are you sure to delete this user'))
     {
       window.location.href='serverdata.php?del='+delid+'';
       return true;
     }
  }
</script>
</html>
