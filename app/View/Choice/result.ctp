<div id="header">
        <div class="col-xs-4 pull-left">
            <a href="JavaScript:history.back();"><h5 style="margin-left: 0px;"><span class="glyphicon glyphicon-chevron-left"></span>再検索</h5></a>
        </div>
        <div class="col-xs-4 text-center">
            <h5>検索結果</h5>
        </div>
</div>

<div class="scr">
<div class="container"><!-- container -->

    <div class="row">
        <div class="col-xs-12 text-left">
            <h6 style="margin: 3px 0px 3px 0px;">
                <?php echo $today;?>(<?php echo $week[$w];?>) <?php echo $now;?> 出発 <?php $DirectRouteTime = intval($DirectRoute[0]['TotalTime']); ?>
            </h6>
        </div>
    </div>

    <div class="row">
        <table>
        <th class="col-xs-1">
            <h4 style="margin: 3px 0px 0px 0px;"><span class="label label-default">発</span></h4>
            <h4 style="margin: 7px 0px 3px 0px;"><span class="label label-default">着</span></h4>
        </th>
        <th class="col-xs-7">
            <h4 style="margin: 3px 0px 0px 0px;"><?php echo $StartLatLon[0]['Site']['name']; ?></h4>
            <h4 style="margin: 7px 0px 3px 0px;"><?php echo $GoalLatLon[0]['Site']['name']; ?></h4>
        </th>
        <th class="col-xs-2">
            <img src="<?php echo $this->Html->url("/../../tabicon/app/webroot/img/star.png");?>" alt="お気に入り" class="img-rounded">
        </th>
        </table>
    </div>



    <?php for ($i = 0; $i < count($SuggestLatLon); $i++) { ?>
    <div class="row">
        <hr style="margin: 3px 0px 3px 0px;">
        <table>
        <th class="col-xs-7">
        <h4 style="margin: 3px 0px 3px 0px;"><?php echo h($SuggestLatLon[$i]['name']); ?></h4>
        <h4 style="margin: 3px 0px 3px 0px;">
            <?php 
            echo date("H:i"); 
            echo"⇒";
            $time = intval($SuggestLatLon[$i]['TotalTime']);
            $transtime = $SuggestLatLon[$i]['TotalTime'] - round($SuggestLatLon[$i]['staying_time']/60);
            $staying_time = $SuggestLatLon[$i]['staying_time'] /60;
            $time_rate = $time /120 * 100;
            $transtime_rate = $transtime / 120 * 100;
            $staying_time_rate = $staying_time / 120 * 100;
            echo date("H:i",strtotime("+ $time minute"));
            ;?>
        </h4>
            <h6 style="margin: 3px 0px 3px 0px;"><?php echo "合計".$time."分";?> <?php echo "滞在".$staying_time."分";?> <?php echo "移動".$transtime."分";?> <?php echo h($SuggestLatLon[$i]['price']); ?>円</h6>
                <div class="progress">
                  <div class="progress-bar progress-bar-info" style="width: <?php echo $staying_time_rate ;?>%">
                  </div>
                  <div class="progress-bar progress-bar-warning" style="width: <?php echo $transtime_rate ;?>%">
                  </div>
                </div>
        </th>

        <th class="col-xs-2 ">
            <!-- 隠しフォーム作成 -->
            <?php echo $this->Form->create('Choice',array('type' => 'post','action'=>'detail'));?>
            <!-- 詳細情報-->
            <?php echo $this->Form->hidden('Choice.today',array('value'=>$today));?>
            <?php echo $this->Form->hidden('Choice.week',array('value'=>$week[$w]));?>
            <?php echo $this->Form->hidden('Choice.now',array('value'=>$now));?>
            <?php echo $this->Form->hidden('Choice.time',array('value'=>$time));?>
            <?php echo $this->Form->hidden('Choice.DirectRouteTime',array('value'=>$DirectRouteTime));?>

            <!-- 候補地点の情報 -->
            <?php echo $this->Form->hidden('Choice.site_id',array('value'=>$SuggestLatLon[$i]['id']));?>
            <?php echo $this->Form->hidden('Choice.site_name',array('value'=>$SuggestLatLon[$i]['name']));?>
            <?php echo $this->Form->hidden('Choice.address',array('value'=>$SuggestLatLon[$i]['address']));?>
            <?php echo $this->Form->hidden('Choice.TotalTime',array('value'=>$SuggestLatLon[$i]['TotalTime']));?>
            <?php echo $this->Form->hidden('Choice.staying_time',array('value'=>$SuggestLatLon[$i]['staying_time']));?>
            <?php echo $this->Form->hidden('Choice.price',array('value'=>$SuggestLatLon[$i]['price']));?>
            <?php echo $this->Form->hidden('Choice.open',array('value'=>$SuggestLatLon[$i]['open']));?>
            <?php echo $this->Form->hidden('Choice.close',array('value'=>$SuggestLatLon[$i]['close']));?>
            <?php echo $this->Form->hidden('Choice.description',array('value'=>$SuggestLatLon[$i]['description']));?>
            <!-- 出発地点の情報を格納 -->
            <?php echo $this->Form->hidden('Choice.start_name',array('value'=>$StartLatLon[0]['Site']['name']));?>
            <?php echo $this->Form->hidden('Choice.start_address',array('value'=>$StartLatLon[0]['Site']['address']));?>
            <?php echo $this->Form->hidden('Choice.FromStartTime',array('value'=>$SuggestLatLon[$i]['FromStartTime']));?>

            <!-- 到着地点の情報を格納 -->
            <?php echo $this->Form->hidden('Choice.goal_name',array('value'=>$GoalLatLon[0]['Site']['name']));?>
            <?php echo $this->Form->hidden('Choice.goal_address',array('value'=>$GoalLatLon[0]['Site']['address']));?>
            <?php echo $this->Form->hidden('Choice.ToGoalTime',array('value'=>$SuggestLatLon[$i]['ToGoalTime']));?>
            <?php echo $this->Form->submit('>', array('class' => 'btn-xs btn-default'));?>
            <?php echo $this->Form->end(); ?>
        </th>
        </table>
    </div>
    <?php } ?>
    <hr style="margin: 3px 0px 3px 0px;">
</div>
</div>