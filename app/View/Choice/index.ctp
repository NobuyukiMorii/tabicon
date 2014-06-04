<div class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-body">

 <a href="<?php echo $this->Html->url('/choices/search'); ?>"><button type="button" class="btn btn-primary btn-lg btn-block">寄り道プラン</button></a>
 <a href="<?php echo $this->Html->url('/sites/add'); ?>"><button type="button" class="btn btn-default btn-lg btn-block">寄り道先を登録</button></a>
 <a href="<?php echo $this->Html->url('/sites/read'); ?>"><button type="button" class="btn btn-primary btn-lg btn-block">寄り道先一覧</button></a>

    </div>
  </div>
</div>



        <script>
navigator.geolocation.getCurrentPosition(is_success,is_error);
 
 
function is_success(position) {
    var result = '結果';
    result += '経度：' + position.coords.latitude + '<br>';
    result += '緯度：' + position.coords.longitude + '<br>';
 
    document.getElementById('result').innerHTML = result;
 
}
 
function is_error(error) {
    var result = "";
    switch(error.code) {
        case 1:
            result = '位置情報の取得が許可されていません';
        break;
        case 2:
            result = '位置情報の取得に失敗しました';
        break;
        case 3:
            result = 'タイムアウトしました';
        break;
    }
    document.getElementById('result').innerHTML = result;
}
        </script>
<div id="result"></div>
