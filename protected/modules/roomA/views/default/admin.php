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
        <div class="text-center">
            <p class="bg-primary">Lamp 1</p>
        </div>
        <div class="row">
            <div class="col-md-6 col-xs-6 text-right">
                <input type="checkbox" id="lampA1" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($model->lampA1 != "on") echo "checked"; ?>>
            </div>
            <div class="col-md-6 col-xs-6 checkbox">
                <label>
                    <input type="checkbox"> Set Timer
                </label>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-4 col-xs-6 text-right">
                    Start : 
                    <div class="input-group">
                        <input class="form-control" type="text" value="00:00" data-field="time">
                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        <div id="dtBox"></div>
                        <script type="text/javascript">
                        $("#dtBox").DateTimePicker();

                        </script>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6">
                    Stop :
                    <div class="input-group clockpicker" data-placement="left">
                        <input type="text" class="form-control" value="09:30">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                    <script type="text/javascript">
                    $('.clockpicker').clockpicker();
                    </script>
                </div>
              </div>
            
        </div>
        </br>
        <div class="text-center">
            <p class="">Lamp 2</p>
        </div>
        <div>
            <div class="col-md-6 col-xs-6 text-right">
                <input type="checkbox" id="lampA2" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($model->lampA2 != "on") echo "checked"; ?>>
            </div>
            <div class="col-md-6 col-xs-6 checkbox">
                <label>
                    <input type="checkbox"> Set Timer
                </label>
            </div>
        </div>
    </div>
</div>




