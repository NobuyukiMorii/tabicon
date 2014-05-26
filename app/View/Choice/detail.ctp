<h4 class="text-center">行程案内</h4>

<div class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-body">

        <div class="row">

            <div class="col-xs-12">
                <img class="img-responsive img-rounded" src=<?php echo '/tabicon/app/webroot/files/image/photo_site/'.$picture['Image'][0]['dir'] .'/thumb400_'.$picture['Image'][0]['photo_site'] ;?>>
            </div>
            <div class="col-xs-12" style="padding-top:15px">
                <p class="muted">概要</p>
                <div class="panel panel-default">
                    <p class="small"><span class="glyphicon glyphicon-info-sign"></span><?php echo  $data['Choice']['description'] ;?></p>
                    <p class="small"><span class="glyphicon glyphicon-time"><?php echo  $data['Choice']['open'] ;?>~<?php echo  $data['Choice']['close'] ;?></p>
                    <p class="small"><span class="glyphicon glyphicon-flag"><?php echo  $data['Choice']['address'] ;?></p>
                    <p class="small"><span class="glyphicon glyphicon-euro"><?php echo  $data['Choice']['price'] ;?>円</p>
                </div>
            </div>

            <div class="col-xs-12">

                <p>約<?php echo $data['Choice']['TotalTime'] ;?>分/約<?php echo $data['Choice']['price'] ;?>円</p>

            </div>

            <div class="col-xs-12">
                <p><?php echo $data['Choice']['start_name'] ;?></p>
                ↓
                <p>徒歩<?php echo $data['Choice']['FromStartTime'] ;?>分</p>
                ↓
                <p><?php echo  $data['Choice']['site_name'] ;?>約<?php echo  $data['Choice']['staying_time'] ;?>分</p>
                ↓
                <p>徒歩<?php echo $data['Choice']['ToGoalTime'] ;?>分</p>
                ↓
                <p><?php echo $data['Choice']['goal_name'] ;?></p>

            </div>

        </div>

		<div class="row">



		</div>


    </div>
  </div>

</div>