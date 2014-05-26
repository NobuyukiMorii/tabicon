
 <h4 class="text-center">行程一覧</h4>

<div class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-body">

<!--         <div class="text-left">
            <?php echo $now; ?><br />
            <?php echo '発：'.$StartLatLon[0]['Site']['name']; ?><br />
            <?php echo '着：'.$GoalLatLon[0]['Site']['name']; ?>
        </div> -->

        <div class="table-responsive">
            <table class = "table table-bordered table-condensed table-hover">
                    <tr class="active">
                        <th class="text-center">名称</th>
                        <th class="text-center">時間</th>
                        <th class="text-center">料金</th>
                        <th class="text-center">詳細</th>
                    </tr>
                <?php for ($i = 0; $i < count($SuggestLatLon); $i++) { ?>
                    
                    <tr>
                        <a href="<?php echo $this->Html->url('/choice/detail/'.$SuggestLatLon[$i]['id']); ?>"> 
                            <td><small><?php echo h($SuggestLatLon[$i]['name']); ?></small></td>
                            <td><small>約<?php echo h($SuggestLatLon[$i]['TotalTime']); ?>分</small></td>
                            <td><small><?php echo h($SuggestLatLon[$i]['price']); ?>円</small></td>
                                <!-- 隠しフォーム作成 -->
                                <?php echo $this->Form->create('Choice',array('type' => 'post','action'=>'detail'));?>
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
                                <?php echo $this->Form->hidden('Choice.FromStartTime',array('value'=>$SuggestLatLon[$i]['FromStartTime']));?>
                                <!-- 到着地点の情報を格納 -->
                                <?php echo $this->Form->hidden('Choice.goal_name',array('value'=>$GoalLatLon[0]['Site']['name']));?>
                                <?php echo $this->Form->hidden('Choice.ToGoalTime',array('value'=>$SuggestLatLon[$i]['ToGoalTime']));?>
                            <td><?php echo $this->Form->submit('詳細', array('class' => 'btn-xs btn-default'));?></td>
                            <!-- ここまで隠しフォーム -->
                            <?php echo $this->Form->end(); ?>
                        </a>
                    </tr>
                    
                <?php } ?>
            </table>
        </div>


    </div>
  </div>

</div>
