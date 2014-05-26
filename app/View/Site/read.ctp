    <div class="table-responsive">
    <table class = "table table-striped table-bordered table-condensed table-hover">
    <tr>
        <th>写真</th>
        <th>名前</th>
        <th>住所</th>
        <th>緯度</th>
        <th>経度</th>
        <th>滞在時間（秒）</th>
        <th>開店時間</th>
        <th>閉店時間</th>
        <th>料金</th>
        <th>紹介文</th>
    </tr>
<?php for ($i = 0; $i < count($data); $i++) { ?>
    <tr>
        <td><img src="<?php echo '/tabicon/app/webroot/files/image/photo_site/'.$data[$i]['Image'][0]['dir'] .'/thumb400_'.$data[$i]['Image'][0]['photo_site'] ;?>",alt ='SiteImage'></a></td>
        <td><?php echo h($data[$i]['Site']['name']); ?></a></td>
        <td><?php echo h($data[$i]['Site']['address']); ?></td>
        <td><?php echo h($data[$i]['Site']['latitude']); ?></td>
        <td><?php echo h($data[$i]['Site']['longitude']); ?></td>
        <td><?php echo h($data[$i]['Site']['staying_time']); ?></td>
        <td><?php echo h($data[$i]['Site']['open']); ?></td>
        <td><?php echo h($data[$i]['Site']['close']); ?></td>
        <td><?php echo h($data[$i]['Site']['price']); ?></td>
        <td><?php echo h($data[$i]['Site']['description']); ?></td>
    </tr>
<?php } ?>
    </table>

<a href="<?php echo $this->Html->url('/sites/add'); ?>" class="btn btn-primary"><span class="glyphiconglyphicon-home" ></span>登録画面に戻る<a>