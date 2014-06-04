<div id="header">
        <div class="col-xs-12 text-center">
            <h5>寄道一覧</h5>
        </div>
</div>

<div class="scr">
<div class="container"><!-- container -->

    <div class="col-xs-12">
        <hr style="margin: 3px 0px 3px 0px;">
    </div>


    <?php for ($i = 0; $i < count($data); $i++) { ?>

        <div class="col-xs-12">
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
        </div>

        <div class="col-xs-12">
            <hr style="margin: 3px 0px 3px 0px;">
        </div>

    <?php } ?>

    <div class="col-xs-12">

      <div class="pagination pagination-large">
        <ul class="pagination">
          <?php
            echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
            echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
          ?>
        </ul>
      </div>
    </div>
    
</div>
</div>




