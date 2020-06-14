<?php 
// if($currentPage==1){
// define("MAIN_RESOURCE_PATH","../../resources/");
// }
// else{
  define("MAIN_RESOURCE_PATH","../resources/");

// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ITILITE</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->

  <link href="<?php echo MAIN_RESOURCE_PATH;?>img/favicon-32x32.png" rel="icon">

  <!-- <link href="<?php //echo MAIN_RESOURCE_PATH;?>img/favicons.png" rel="icon">
 -->
  <link href="resources/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="<?php echo MAIN_RESOURCE_PATH;?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo MAIN_RESOURCE_PATH;?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo MAIN_RESOURCE_PATH;?>lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="<?php echo MAIN_RESOURCE_PATH;?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo MAIN_RESOURCE_PATH;?>lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo MAIN_RESOURCE_PATH;?>lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo MAIN_RESOURCE_PATH;?>css/style.css" rel="stylesheet">
</head>

<body>
  <header class="fixed-top">
        <?php include_once "incMenu.php";?>
    </header>