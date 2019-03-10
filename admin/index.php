  
  <?php include('func/func_connectdb.php');?>
  <?php include('header.php');?>
  <?php include('sidebar.php');?>

  <?php
    db_connect();
    $view='index';
    if(isset($_GET['view'])){
      $view=$_GET['view'];
      include("$view.php");
    }
  ?>

  <?php include('footer.php');?>