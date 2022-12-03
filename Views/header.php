<?php 

if (isset($_SESSION['user']))
  if ($_SESSION['user']=="student")
  {
    require_once(VIEWS_PATH . "nav.php");
  } else if ($_SESSION['user']=="admin")
  { 
    require_once(VIEWS_PATH . "navAdmin.php");
  }else if ($_SESSION['user']=="company"){
    require_once(VIEWS_PATH . "navCompany.php");
  }

?>
<!doctype html>
<html lang="en">
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>estilos.css">
     <title>tp final</title>
</head>
<body>
