<?php
/* @var $this DefaultController */
/* @var $model RoomA */

$this->breadcrumbs=array(
	'Room A',
);

$viewJs = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.roomA.js') . '/view.js');
Yii::app()->clientScript->registerScriptFile($viewJs, CClientScript::POS_BEGIN);
Yii::app()->clientScript->registerScript('', "");

?>


<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap/css/bootstrap-switch.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap/js/bootstrap-switch.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/clock/DateTimePicker.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/lib/clock/DateTimePicker.js"></script>



<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Status</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-6 row">
            <p class="col-md-12 text-center"><strong>LAMP 1</strong></p>
            <input type="checkbox" id="lampA1" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($model->lampA1 != "on") echo "checked readonly"; ?>>
            <div class="col-md-12 checkbox">
                <label>
                    <input type="checkbox" id="lamp1checked" <?php if($model->lampA1TimerStatus != "off") {echo "checked"; }?>> Set Timer
                </label>
            </div>
            <div class="row" id="lamp1" <?php if($model->lampA1TimerStatus != "on") echo 'style="display: none;"'; ?>>
                <div class="col-md-3">
                    Start : 
                    <div class="input-group">
                        <input class="form-control" name="lamp1TimerStart" type="text" data-field="time">
                        <span class="input-group-addon">
                           <span class="glyphicon glyphicon-time"></span>
                        </span>
                        <div id="lamp1Start"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    Stop :
                    <div class="input-group">
                        <input class="form-control" name="lamp1TimerStop" type="text" data-field="time">
                        <span class="input-group-addon">
                           <span class="glyphicon glyphicon-time"></span>
                        </span>
                        <div id="lamp1Stop"></div>
                    </div>
                    </br>
                    <div class="text-center">
                        <button type="button" id="buttonLamp1" class="btn btn-primary">Save Timer</button>
                    </div>
                    </br>
                </div>
              </div>
        </div>
        <div class="col-md-6 row">
            <p class="col-md-12 text-center"><strong>LAMP 2</strong></p>
           <input type="checkbox" id="lampA2" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($model->lampA2 != "on") echo "checked readonly"; ?>>
           <div class="col-md-12 checkbox">
               <label>
                   <input type="checkbox" id="lamp2checked" <?php if($model->lampA2TimerStatus != "off") echo "checked"; ?>> Set Timer
               </label>
           </div>
           <div class="row" id="lamp2" <?php if($model->lampA2TimerStatus != "on") echo 'style="display: none;"'; ?>>
               <div class="col-md-3">
                   Start : 
                   <div class="input-group">
                       <input class="form-control" name="lamp2TimerStart" type="text" data-field="time">
                       <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                       </span>
                       <div id="lamp2Start"></div>
                   </div>
               </div>
               <div class="col-md-3">
                   Stop :
                   <div class="input-group">
                       <input class="form-control"  name="lamp2TimerStop" type="text" data-field="time">
                       <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                       </span>
                       <div id="lamp2Stop"></div>
                   </div>
                    </br>
                    <div class="text-center">
                        <button type="button" id="buttonLamp2" class="btn btn-primary">Save Timer</button>
                    </div>
                    </br>
               </div>
             </div>
        </div>
    </div>
</div>




