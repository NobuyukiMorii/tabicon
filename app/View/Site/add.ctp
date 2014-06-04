<h4 class="text-center">観光地登録</h4>

<div class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-body">

      <?php echo $this->Form->create
            (
            'Site',
            array(
                  'type' => 'file', 
                  'action'=>'add', 
                  'enctype' => 'multipart/form-data',
                  'role' => 'form',
                  'class' => 'form-horizontal text-left'
                  )
            );
      ?>

      <div>

            <div class="form-group">
                  <label for="Image0Model" class="col-sm-2 control-label">写真</label>
                  <div class="col-sm-10">

                        <?php echo $this->Form->hidden
                              (
                              'Image.0.model', 
                              array(
                                    'value'=>'Site'
                                    )
                              );
                        ?>

                        <?php echo $this->Form->input
                              (
                              'Image.0.photo_site',
                              array(
                                    'type' => 'file',
                                    'required' => false,
                                    'label' => false , 
                                    'id' => "Image0Model"
                                    )
                              ); 
                        ?>

                  </div>
                  ※ファイル名に日本語は使わないで下さい
            </div>

            <div class="form-group">
                  <label for="SiteName" class="col-sm-2 control-label">観光地名</label>
                  <div class="col-sm-5">
                        <?php echo $this->Form->input
                              (
                              'Site.name', 
                                    array(
                                          'class' => 'form-control',
                                          'required' => false,
                                          'label' => false , 
                                          'div' => false,
                                          'placeholder' => "観光地名を入力して下さい。",
                                          'id' => "SiteName",
                                          )
                              );
                        ?>
                  </div>
            </div>

            <div class="form-group">
                  <label for="SiteAddress" class="col-sm-2 control-label">住所</label>
                  <div class="col-sm-5">
                        <?php echo $this->Form->input
                              (
                              'Site.address', 
                                    array(
                                          'class' => 'form-control',
                                          'required' => false,
                                          'label' => false , 
                                          'div' => false,
                                          'placeholder' => "住所を入力して下さい。",
                                          'id' => "SiteAddress",
                                          )
                              );
                        ?>
                  </div>
            </div>

<!--             <div class="form-group">
                  <label for="SiteLatitude" class="col-sm-2 control-label">経度</label>
                  <div class="col-sm-5">
                        <?php echo $this->Form->input
                              (
                              'Site.latitude', 
                              array('class' => 'form-control',
                                    'required' => false,
                                    'label' => false , 
                                    'div' => false,
                                    'placeholder' => "経度を入力して下さい。",
                                    'id' => "SiteLatitude"
                                    )
                              );
                        ?>
                  </div>
            </div>

            <div class="form-group">
                  <label for="UserTelnumber" class="col-sm-2 control-label">緯度</label>
                  <div class="col-sm-5">
                        <?php echo $this->Form->input
                              (
                              'Site.longitude', 
                              array('class' => 'form-control',
                                    'required' => false,
                                    'label' => false , 
                                    'div' => false,
                                    'placeholder' => "緯度を入力して下さい。",
                                    'id' => "SiteLongitude"
                                    )
                              );
                        ?>
                  </div>
            </div> -->

            <div class="form-group">
                  <label for="SiteStaying_time" class="col-sm-2 control-label">滞在時間</label>
                  <div class="col-sm-3">
                        <?php echo $this->Form->input
                              (
                              'Site.staying_time', 
                              array('class' => 'form-control',
                                    'required' => false,
                                    'label' => false , 
                                    'div' => false,
                                    'placeholder' => "滞在時間を入力して下さい。",
                                    'id' => "SiteStaying_time"
                                    )
                              );
                        ?>
                  </div>
            </div>

            <div class="form-group form-inline">
                  <label for="SiteOpen" class="col-sm-2 control-label">開店時間</label>
                  <div class="col-sm-10">
                              <?php
                              echo $this->form->input
                              ('Site.open',
                               array(
                                    'label' => false,
                                    'timeFormat' => '24',
                                    'dateFormat' => 'H:i:s',
                                    'default' => date('10:00'),
                                    'empty' => true,
                                    'interval' => 10,
                                    'class' => 'form-control',
                                    'required' => false,
                                    'id' => "SiteOpen"
                                    )
                               );
                              ?>
                  </div>
            </div>

            <div class="form-group form-inline">
                  <label for="SiteClose" class="col-sm-2 control-label">閉店時間</label>
                  <div class="col-sm-10">
                              <?php
                              echo $this->form->input
                              ('Site.close',
                               array(
                                    'label' => false,
                                    'timeFormat' => '24',
                                    'dateFormat' => 'H:i:s',
                                    'default' => date('17:00'),
                                    'empty' => true,
                                    'interval' => 10,
                                    'class' => 'form-control',
                                    'required' => false,
                                    'id' => "SiteClose"
                                    )
                               );
                              ?>
                  </div>
            </div>

            <div class="form-group">
                  <label for="SitePrice" class="col-sm-2 control-label">料金</label>
                  <div class="col-sm-3">
                        <?php echo $this->Form->input
                              (
                              'Site.price', 
                              array('class' => 'form-control',
                                    'required' => false,
                                    'label' => false , 
                                    'div' => false,
                                    'placeholder' => "料金を入力して下さい。",
                                    'id' => "SitePrice"
                                    )
                              );
                        ?>
                  </div>
            </div>

	              <div class="form-group">
	                    <label for="SiteDescription" class="col-sm-2 control-label">紹介文</label>
	                    <div class="col-sm-7">
	                          <?php echo $this->Form->input
	                                (
	                                'Site.description', 
	                                array('class' => 'form-control',
	                                      'required' => false,
	                                      'label' => false ,
	                                      'div' => false,
	                                      'placeholder' => "紹介文を入力して下さい。",
	                                      'id' => "SiteDescription",
	                                      'rows' => 4
	                                      )
	                                );
	                          ?>
	                    </div>
	              </div>

		      <div class="form-group">
		            <div class="col-sm-12 text-right">
		                  <?php echo $this->Form->submit('登録する', array('class' => 'btn btn-lg btn-primary'));?>
		            </div>
		      </div>

      </div>





      <?php echo $this->Form->end(); ?>

    </div>
  </div>

</div>











