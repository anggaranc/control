<?php
/* @var $this DefaultController */
/* @var $model RoomA */
$this->pageTitle=Yii::app()->name . ' - Room D';
$this->breadcrumbs=array(
	'Room D',
);

$viewJs = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.roomD.js') . '/view.js');
Yii::app()->clientScript->registerScriptFile($viewJs, CClientScript::POS_BEGIN);
Yii::app()->clientScript->registerScript('', "");

?>

<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Status</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-6 row">
            <p class="col-md-12 text-center"><span class='label label-success ldr1'>LAMP 1</span></p>
            <input type="checkbox" id="lampD1" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($model->lampD1 == "on") echo "checked";  if($model->lampD1TimerStatus == "on") echo " disabled";?>>
            <div class="col-md-12 checkbox">
                <label>
                    <input type="checkbox" id="lamp1checked" <?php if($model->lampD1TimerStatus != "off") {echo "checked"; }?>> Set Timer
                </label>
            </div>
            <div class="row" id="lamp1" <?php if($model->lampD1TimerStatus != "on") echo 'style="display: none;"'; ?>>
                <div class="col-md-3">
                    Start : 
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lamp1TimerStart" value="<?php
                            $D1Start = new DateTime($model->lampD1TimerStart);
                            echo $D1Start->format("H:i");?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                </div>
                <div class="col-md-3">
                    Stop :
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lamp1TimerStop" value="<?php
                            $D1Stop = new DateTime($model->lampD1TimerStop);
                            echo $D1Stop->format("H:i");?>">
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
            <p class="col-md-12 text-center"><span class='label label-success ldr2'>LAMP 2</span></p>
           <input type="checkbox" id="lampD2" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($model->lampD2 == "on") echo "checked";  if($model->lampD2TimerStatus == "on") echo " disabled";?>>
           <div class="col-md-12 checkbox">
               <label>
                   <input type="checkbox" id="lamp2checked" <?php if($model->lampD2TimerStatus != "off") echo "checked"; ?>> Set Timer
               </label>
           </div>
           <div class="row" id="lamp2" <?php if($model->lampD2TimerStatus != "on") echo 'style="display: none;"'; ?>>
               <div class="col-md-3">
                   Start : 
                   <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lamp2TimerStart" value="<?php
                        $D2Start = new DateTime($model->lampD2TimerStart);
                        echo $D2Start->format("H:i");?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
               </div>
               <div class="col-md-3">
                   Stop :
                    <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lamp2TimerStop" value="<?php
                        $D2Stop = new DateTime($model->lampD2TimerStop);
                        echo $D2Stop->format("H:i");?>">
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
