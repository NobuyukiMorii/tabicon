<!DOCTYPE html>
<html lang="ja">
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

    <?=$this->Html->css('style.css')?>
    <?=$this->Html->css('font-awesome.css')?>
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

      <div>
        <?php echo $this->Session->flash('success'); ?>
        <?php echo $this->Session->flash('fail'); ?>
        <?php echo $this->Session->flash('auth'); ?>
        
        <?php echo $this->fetch('content'); ?>
      </div>

    <div id="footer">

      <div class="container">
        <div class="col-xs-4 text-center">
            <a href="<?php echo $this->Html->url('/choices/search'); ?>"><span class="glyphicon glyphicon-search"></span><h6 style="margin: 3px 0px 3px 0px;">寄道案内</h6></a>
        </div>
        <div class="col-xs-4 text-center">
            <a href="<?php echo $this->Html->url('/sites/read'); ?>"><span class="glyphicon glyphicon-th-list"></span><h6 style="margin: 3px 0px 3px 0px;">寄道一覧</h6></a>
        </div>
        <div class="col-xs-4 text-center">
            <a href="<?php echo $this->Html->url('/choices/favorite'); ?>"><span class="glyphicon glyphicon-star-empty"></span><h6 style="margin: 3px 0px 3px 0px;">お気に入り</h6></a>
        </div>
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
