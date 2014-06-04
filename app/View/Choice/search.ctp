<div id="header">
        <div class="col-xs-12 text-center">
            <h5>寄り道先を探す</h5>
        </div>
</div>

<div class="container"><!-- container -->

<div class="col-sm-12">



      <?php echo $this->Form->create
            (
            'Choice',
            array(
                  'type' => 'post', 
                  'action'=>'result', 
                  'role' => 'form',
                  'class' => 'form-horizontal text-left'
                  )
            );
      ?>

      <div>

            <div class="form-group">
                  <label for="ChoiceStart" class="col-sm-2 control-label">エリア</label>
                  <div class="col-sm-10">

						<?php echo $this->Form->input
								(
								'Choice.start',
									array(
											'class' => 'form-control',
											'required' => false,
											'label' => false , 
											'div' => false,
											'placeholder' => "出発地点を入力して下さい。",
											'id' => "ChoiceStart",
											'type'=>'select',
											'options'=> array('鎌倉'),
											'required' => false
											)
								); 
						?>

                  </div>
            </div>

            <div class="form-group">
                  <label for="ChoiceStart" class="col-sm-2 control-label">出発地点</label>
                  <div class="col-sm-10">

						<?php echo $this->Form->input
								(
								'Choice.start',
									array(
											'class' => 'form-control',
											'required' => false,
											'label' => false , 
											'div' => false,
											'placeholder' => "出発地点を入力して下さい。",
											'id' => "ChoiceStart",
											'type'=>'select',
											'options'=> $options,
											'required' => false
											)
								); 
						?>

                  </div>
            </div>

            <div class="form-group">
                  <label for="ChoiceGoal" class="col-sm-2 control-label">到着地点</label>
                  <div class="col-sm-10">

						<?php echo $this->Form->input
								(
								'Choice.goal',
									array(
											'class' => 'form-control',
											'required' => false,
											'label' => false , 
											'div' => false,
											'placeholder' => "到着地点を入力して下さい。",
											'id' => "ChoiceGoal",
											'type'=>'select',
											'options'=> $options,
											'required' => false
											)
								); 
						?>

                  </div>
            </div>


		     <div class="form-group">
		        <div class="col-sm-12 text-right">
		            <?php echo $this->Form->submit('寄り道先を探す', array('class' => 'btn btn-primary btn-block'));?>
		        </div>
		     </div>

      </div>

      <?php echo $this->Form->end(); ?>


    </div>
</div>