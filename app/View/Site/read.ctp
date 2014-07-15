<div id="header">
        <div class="col-xs-12 text-center">
            <h5>寄道一覧</h5>
        </div>
</div>

<div class="scr2">
<div class="container"><!-- container -->



        <hr style="margin: 3px 0px 3px 0px;">




    <?php for ($i = 0; $i < count($data); $i++) { ?>


                <div class="col-xs-7">
                    <img src="<?php echo '/tabicon/app/webroot/files/image/photo_site/'.$data[$i]['Image'][0]['dir'] .'/thumb150_'.$data[$i]['Image'][0]['photo_site'] ;?>",alt ='SiteImage'>
                </div>
                <div class="col-xs-5">
                    <h5 style="margin: 3px 0px 3px 0px;"><label><?php echo h($data[$i]['Site']['name']); ?></label></h5>
                    <h6 style="margin: 3px 0px 3px 0px;"><?php echo h($data[$i]['Site']['description']); ?></h6>
                    <h6 style="margin: 3px 0px 3px 0px;">住所：<?php echo h($data[$i]['Site']['address']); ?></h6>
                    <h6 style="margin: 3px 0px 3px 0px;">料金：<?php echo h($data[$i]['Site']['price']); ?>円</h6>
                    <h6 style="margin: 3px 0px 3px 0px;">営業時間：<?php echo h($data[$i]['Site']['open']); ?>~<?php echo h($data[$i]['Site']['close']); ?></h6>
                </div>



            <hr style="margin: 3px 0px 3px 0px;">


    <?php } ?>

    <div class="col-xs-12">
    
</div>
</div>




