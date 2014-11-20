<?php
/* @var $this DefaultController */
/* @var $model RoomA */
$this->pageTitle=Yii::app()->name . ' - Room C';
$this->breadcrumbs=array(
	'Room C',
);

$viewJs = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.roomC.js') . '/view.js');
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
            <input type="checkbox" id="lampC1" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($model->lampC1 != "on") echo "checked";  if($model->lampC1TimerStatus == "on") echo " disabled";?>>
            <div class="col-md-12 checkbox">
                <label>
                    <input type="checkbox" id="lamp1checked" <?php if($model->lampC1TimerStatus != "off") {echo "checked"; }?>> Set Timer
                </label>
            </div>
            <div class="row" id="lamp1" <?php if($model->lampC1TimerStatus != "on") echo 'style="display: none;"'; ?>>
                <div class="col-md-3">
                    Start : 
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lamp1TimerStart" value="<?php
                            $C1Start = new DateTime($model->lampC1TimerStart);
                            echo $C1Start->format("H:i");?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                </div>
                <div class="col-md-3">
                    Stop :
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lamp1TimerStop" value="<?php
                            $C1Stop = new DateTime($model->lampC1TimerStop);
                            echo $C1Stop->format("H:i");?>">
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
           <input type="checkbox" id="lampC2" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($model->lampC2 != "on") echo "checked";  if($model->lampC2TimerStatus == "on") echo " disabled";?>>
           <div class="col-md-12 checkbox">
               <label>
                   <input type="checkbox" id="lamp2checked" <?php if($model->lampC2TimerStatus != "off") echo "checked"; ?>> Set Timer
               </label>
           </div>
           <div class="row" id="lamp2" <?php if($model->lampC2TimerStatus != "on") echo 'style="display: none;"'; ?>>
               <div class="col-md-3">
                   Start : 
                   <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lamp2TimerStart" value="<?php
                        $C2Start = new DateTime($model->lampC2TimerStart);
                        echo $C2Start->format("H:i");?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
               </div>
               <div class="col-md-3">
                   Stop :
                    <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lamp2TimerStop" value="<?php
                        $C2Stop = new DateTime($model->lampC2TimerStop);
                        echo $C2Stop->format("H:i");?>">
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
