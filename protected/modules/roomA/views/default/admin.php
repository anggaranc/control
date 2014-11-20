<?php
/* @var $this DefaultController */
/* @var $model RoomA */
$this->pageTitle=Yii::app()->name . ' - Room A';
$this->breadcrumbs=array(
	'Room A',
);

$viewJs = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.roomA.js') . '/view.js');
Yii::app()->clientScript->registerScriptFile($viewJs, CClientScript::POS_BEGIN);
Yii::app()->clientScript->registerScript('', "");

?>

<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Status</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-6 row">
            <p class="col-md-12 text-center"><strong>LAMP 1</strong></p>
            <input type="checkbox" id="lampA1" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($model->lampA1 != "on") echo "checked";  if($model->lampA1TimerStatus == "on") echo " disabled";?>>
            <div class="col-md-12 checkbox">
                <label>
                    <input type="checkbox" id="lamp1checked" <?php if($model->lampA1TimerStatus != "off") {echo "checked"; }?>> Set Timer
                </label>
            </div>
            <div class="row" id="lamp1" <?php if($model->lampA1TimerStatus != "on") echo 'style="display: none;"'; ?>>
                <div class="col-md-3">
                    Start : 
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lamp1TimerStart" value="<?php
                            $A1Start = new DateTime($model->lampA1TimerStart);
                            echo $A1Start->format("H:i");?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                </div>
                <div class="col-md-3">
                    Stop :
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lamp1TimerStop" value="<?php
                            $A1Stop = new DateTime($model->lampA1TimerStop);
                            echo $A1Stop->format("H:i");?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </br>
                    <div class="text-center">
                        <button type="button" id="buttonLamp1" data-loading-text="Saving..." class="btn btn-primary">Save Timer</button>
                    </div>
                    </br>
                </div>
                
              </div>
        </div>
        <div class="col-md-6 row">
            <p class="col-md-12 text-center"><strong>LAMP 2</strong></p>
           <input type="checkbox" id="lampA2" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($model->lampA2 != "on") echo "checked";  if($model->lampA2TimerStatus == "on") echo " disabled";?>>
           <div class="col-md-12 checkbox">
               <label>
                   <input type="checkbox" id="lamp2checked" <?php if($model->lampA2TimerStatus != "off") echo "checked"; ?>> Set Timer
               </label>
           </div>
           <div class="row" id="lamp2" <?php if($model->lampA2TimerStatus != "on") echo 'style="display: none;"'; ?>>
               <div class="col-md-3">
                   Start : 
                   <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lamp2TimerStart" value="<?php
                        $A2Start = new DateTime($model->lampA2TimerStart);
                        echo $A2Start->format("H:i");?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
               </div>
               <div class="col-md-3">
                   Stop :
                    <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lamp2TimerStop" value="<?php
                        $A2Stop = new DateTime($model->lampA2TimerStop);
                        echo $A2Stop->format("H:i");?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                    </br>
                    <div class="text-center">
                        <button type="button" id="buttonLamp2" data-loading-text="Saving..." class="btn btn-primary">Save Timer</button>
                    </div>
                    </br>
               </div>
             </div>
        </div>
    </div>
</div>
