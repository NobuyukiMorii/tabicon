<div id="header">
        <div class="col-xs-4 pull-left">
            <a href="JavaScript:history.back();"><h5 style="margin-left: 0px;"><span class="glyphicon glyphicon-chevron-left"></span>戻る</h5></a>
        </div>
        <div class="col-xs-4 text-center">
            <h5>地図</h5>
        </div>
</div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

    google.maps.event.addDomListener(window, 'load', function()
    {
        var mapOptions = {
            zoom: 12,
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

<div id="gmap" style="width: 100%; height: 600px; border: 1px solid Gray;"></div>