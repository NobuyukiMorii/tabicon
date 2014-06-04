<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>
<div id="header">
        <div class="col-xs-12 text-center">
            <h5>現在地</h5>
        </div>
</div>

<?
  // Override any of the following default options to customize your map
  $map_options = array(
    'id' => 'map_canvas',
    'width' => '310px',
    'height' => '400px',
    'style' => '',
    'zoom' => 19,
    'type' => 'ROADMAP',
    'custom' => null,
    'localize' => false,
    'latitude' => 35.3195120,
    'longitude' => 139.5511320,
    'address' => '1 Infinite Loop, Cupertino',
    'marker' => true,
    'markerTitle' => '現在地',
    'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png',
    'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
    'infoWindow' => true,
    'windowText' => '現在地'
  );
?>

<?= $this->GoogleMap->map($map_options); ?>