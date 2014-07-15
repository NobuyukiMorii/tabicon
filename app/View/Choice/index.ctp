<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>旅のコンシェルジュ</title>

    <!-- Bootstrap core CSS -->
    <?=$this->Html->css('bootstrap.min.css')?>
    <?=$this->Html->css('bar.css')?>

    <!-- Add custom CSS here -->
    <?=$this->Html->css('stylish-portfolio.css')?>
    <?=$this->Html->css('font-awesome/css/font-awesome.min.css')?>
    <?php
      echo $this->fetch('meta');
      echo $this->fetch('script');
      echo $this->fetch('css');
    ?>
</head>

<body>

    <?php echo $this->Session->flash(); ?>

    <!-- Full Page Image Header Area -->
    <div id="top" class="header">
        <div class="vert-text">
            <h3>旅のコンシェルジュ</h3>
            <h3>
                <em>旅行中にぽっかり空いた時間を</em> 
                <em>素敵な</em> 寄り道に</h3>
 					<a href="https://gisinfo.areaia.jp/?action=href&href=http://localhost:8888/tabicon/choices/search"><button type="button" class="btn btn-primary btn-lg btn-lg">はじめる</button></a>
        </div>
    </div>
    <!-- /Full Page Image Header Area -->

<?php echo $this->element('sql_dump'); ?>
</body>

</html>

