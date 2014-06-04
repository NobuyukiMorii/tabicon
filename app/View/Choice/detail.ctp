<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

    google.maps.event.addDomListener(window, 'load', function()
    {
        var mapOptions = {
            zoom: 20,
            center: null,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scaleControl: true
        };
        var mapObj = new google.maps.Map(document.getElementById('gmap'), mapOptions);


        // ルートを表示するマップを設定
        var directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(mapObj);


        // 経由地点を設定
        var wayPoints = [
        {
            location: "<?php echo  $data['Choice']['address'] ;?>"
        }

        ];


        // 開始地点と終了地点、ルーティングの種類の設定
        var request = {
            origin: "<?php echo $data['Choice']['start_address'] ;?>",
            destination: "<?php echo $data['Choice']['goal_address'] ;?>",
            travelMode: google.maps.DirectionsTravelMode.WALKING,
            waypoints: wayPoints
        };


        // ルート検索を行う
        var directionsService = new google.maps.DirectionsService();
        directionsService.route(request, function(result, status)
        {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(result);
            }
        });
    });
</script>
<div id="header">
        <div class="col-xs-4 pull-left">
            <a href="JavaScript:history.back();"><h5 style="margin-left: 0px;"><span class="glyphicon glyphicon-chevron-left"></span>戻る</h5></a>
        </div>
</div>

<div class="container"><!-- container -->

    <div class="col-xs-12">
        <ul class="nav nav-tabs">
           <li class="active col-xs-6 text-center"><a href="#tab1" data-toggle="tab">ルート</a></li>
           <li class="col-xs-6 text-center"><a href="#tab2" data-toggle="tab">寄り道先</a></li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane active" id="tab1" style="height:430px;">
                <h4 style="margin: 10px 0px 0px 0px;"><?php echo $data['Choice']['site_name'] ;?>への寄り道ルート</h4>

                    <div class="col-xs-8">
                        <h6 style="margin: 3px 0px 0px 0px;" class="text-left">合計<?php echo $data['Choice']['TotalTime'] ;?>分 (<?php echo $data['Choice']['staying_time'] ;?>分滞在)</h6>
                    </div>
                    <div class="col-xs-4">
                        <h6 style="margin: 3px 0px 0px 0px;" class="text-right"><?php echo $data['Choice']['price'] ;?>円</h6>
                    </div>
                    
                    <hr style="margin: 3px 0px 0px 0px;">
                    

                    <table>
                        <th class="col-xs-6">
                            <h5 style="margin: 10px 0px 0px 0px;"><?php echo $data['Choice']['DepartureTimeFromStart'];?>発</h5>
                        </th>
                        <th class="col-xs-6">
                            <h5 style="margin: 10px 0px 0px 0px;"><?php echo $data['Choice']['start_name'] ;?></h5>
                        </th>
                    </table>


                    <hr style="margin: 10px 0px 0px 0px;">



                    <table>
                        <th class="col-xs-1">
                            <h6 class="selector11b" style="margin: 0px 0px 0px 10px;"></h6>
                        </th>
                        <th class="col-xs-11">
                            <h6 style="margin: 0px 0px 0px -35px;">徒歩<?php echo $data['Choice']['FromStartTime'] ;?>分</h6>
                        </th>
                    </table>



                    <hr style="margin: 0px 0px 0px 0px;">



                    <table>
                        <th class="col-xs-4">
                            <h5 style="margin: 10px 0px 0px 0px;"><?php echo $data['Choice']['AllivalTimeToYorimiti'];?>着</h5>
                            <h6 class="selector12b" style="margin: 0px 0px 0px 10px; padding: 13px 0px 0px 5px;">滞在<?php echo $data['Choice']['staying_time'] ;?>分</h6>
                            <h5 style="margin: 0px 0px 0px 0px;"><?php echo $data['Choice']['DepartureTimeFromYorimiti'];?>発</h5>
                        </th>
                        <th class="col-xs-5">
                            <h4 style="margin: 10px 0px 0px -20px;"><?php echo $data['Choice']['site_name'] ;?></h4>
                        </th>  
                    </table>

                <div class="col-xs-12">
                    <hr style="margin: 10px 0px 0px 0px;">
                </div>


                    <table>
                        <th class="col-xs-1">
                            <h6 class="selector11b" style="margin: 0px 0px 0px 10px;"></h6>
                        </th>
                        <th class="col-xs-11">
                            <h6 style="margin: 0px 0px 0px -35px;">徒歩<?php echo $data['Choice']['ToGoalTime'] ;?>分</h6>
                        </th>
                    </table>


                    <hr style="margin: 0px 0px 0px 0px;">


                    <table>
                        <th class="col-xs-6">
                            <h5 style="margin: 10px 0px 10px 0px;"><?php echo $data['Choice']['AllivalTimeToGoal'];?>着</h5>
                        </th>
                        <th class="col-xs-6">
                            <h5 style="margin: 10px 0px 10px 0px;"><?php echo $data['Choice']['goal_name'] ;?></h5>
                        </th>
                    </table>

                    <div id="gmap" style="width: 100%; height: 170px; border: 1px solid Gray;"></div>

            </div>

            <div class="tab-pane" id="tab2" style="height:440px;">
                <div class="col-xs-12">
                
                        <div class="col-xs-12">
                            <img class="img-responsive img-rounded" src=<?php echo '/tabicon/app/webroot/files/image/photo_site/'.$picture['Image'][0]['dir'] .'/thumb400_'.$picture['Image'][0]['photo_site'] ;?> style="margin: 10px 0px 0px 0px;">
                        </div>

                        <div class="col-xs-12">
                            <h6 style="margin: 10px 0px 0px 0px;"><?php echo  $data['Choice']['description'] ;?></h6>
                        </div>

                        <table>
                            <th class="col-xs-12">
                                <h6 style="margin: 60px 0px 0px 0px;"><label>住所:</label><?php echo  $data['Choice']['address'] ;?></h6>
                                <h6 style="margin: 3px 0px 0px 0px;"><label>料金:</label><?php echo  $data['Choice']['price'] ;?>円</h6>
                                <h6 style="margin: 3px 0px 0px 0px;"><label>営業時間:</label><?php echo  $data['Choice']['open'] ;?>~<?php echo  $data['Choice']['close'] ;?></h6>
                            </th>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>