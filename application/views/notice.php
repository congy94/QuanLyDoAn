<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
    $listNotice = get_Notice();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="" style="margin:10px;">
    <?php for($i=count($listNotice)-1;$i>=0;$i--){ ?>
    <p class="bg-info" style="padding: 5px;margin-bottom: 0px;"><?php echo $listNotice[$i]['ngayThongBao']."-".$listNotice[$i]['tieuDeThongBao']; ?></p>
    <p class="bg-danger" style="padding: 10px;"><?php echo $listNotice[$i]['noiDungThongBao'];?></p>
    <?php } ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/js/bootstrap.min.js"></script>
  </body>
</html>
