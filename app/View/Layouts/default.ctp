<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>旅のコンシェルジュ</title>

    <?php
      echo $this->fetch('meta');
      echo $this->fetch('script');
      echo $this->fetch('css');
    ?>

    <!-- Bootstrap core CSS -->
    <?=$this->Html->css('bootstrap.css')?>
    <!-- Bootstrap core CSS -->
    <?=$this->Html->css('footer.css')?>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container"><!-- container -->

      <div>
        <?php echo $this->Session->flash('success'); ?>
        <?php echo $this->Session->flash('fail'); ?>
        <?php echo $this->Session->flash('auth'); ?>
        
        <?php echo $this->fetch('content'); ?>
      </div>

    </div> <!-- /container -->

    <div id="footer">
      <div class="container">
        <a href="<?php echo $this->Html->url('/choices/search'); ?>"><p class="text-muted credit">旅のコンシェルジュ</a></p>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <?=$this->Html->script('jquery-1.10.2.js')?>
    <?=$this->Html->script('bootstrap.js')?>
    <?=$this->Html->script('footerFixed.js')?>
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
