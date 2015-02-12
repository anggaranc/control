<?php
/* @var $this DefaultController */
/* @var $model RoomA */
$this->pageTitle=Yii::app()->name . ' - Room A';
$this->breadcrumbs=array(
	'Room Admin',
);

$viewJs = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.admin.js') . '/view.js');
Yii::app()->clientScript->registerScriptFile($viewJs, CClientScript::POS_BEGIN);
Yii::app()->clientScript->registerScript('', "");

?>

<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Status</h3>
    </div>
    <div class="panel-body">
        
        <div class="col-md-10 text-center"><b>Room A</b></div><br />
        
        <div class="col-md-6 row">
            <p class="col-md-12 text-center"><span class='label label-success ldrA1'>LAMP 1</span></p>
            <input type="checkbox" id="lampA1" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($modelA->lampA1 == "on") echo "checked";  if($modelA->lampA1TimerStatus == "on") echo " disabled";?>>
            <div class="col-md-12 checkbox">
                <label>
                    <input type="checkbox" id="lampA1checked" <?php if($modelA->lampA1TimerStatus != "off") {echo "checked"; }?>> Set Timer
                </label>
            </div>
            <div class="row" id="lampA1status" <?php if($modelA->lampA1TimerStatus != "on") echo 'style="display: none;"'; ?>>
                <div class="col-md-3">
                    Start : 
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lampA1TimerStart" value="<?php
                            $A1Start = new DateTime($modelA->lampA1TimerStart);
                            echo $A1Start->format("H:i");?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                </div>
                <div class="col-md-3">
                    Stop :
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lampA1TimerStop" value="<?php
                            $A1Stop = new DateTime($modelA->lampA1TimerStop);
                            echo $A1Stop->format("H:i");?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </br>
                    <div class="text-center">
                        <button type="button" id="buttonLampA1" data-loading-text="Saving..." class="btn btn-primary">Save Timer</button>
                    </div>
                    </br>
                </div>
                
              </div>
        </div>
        <div class="col-md-6 row">
            <p class="col-md-12 text-center"><span class='label label-success ldrA2'>LAMP 2</span></p>
           <input type="checkbox" id="lampA2" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($modelA->lampA2 == "on") echo "checked";  if($modelA->lampA2TimerStatus == "on") echo " disabled";?>>
           <div class="col-md-12 checkbox">
               <label>
                   <input type="checkbox" id="lampA2checked" <?php if($modelA->lampA2TimerStatus != "off") echo "checked"; ?>> Set Timer
               </label>
           </div>
           <div class="row" id="lampA2status" <?php if($modelA->lampA2TimerStatus != "on") echo 'style="display: none;"'; ?>>
               <div class="col-md-3">
                   Start : 
                   <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lampA2TimerStart" value="<?php
                        $A2Start = new DateTime($modelA->lampA2TimerStart);
                        echo $A2Start->format("H:i");?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
               </div>
               <div class="col-md-3">
                   Stop :
                    <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lampA2TimerStop" value="<?php
                        $A2Stop = new DateTime($modelA->lampA2TimerStop);
                        echo $A2Stop->format("H:i");?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                    </br>
                    <div class="text-center">
                        <button type="button" id="buttonLampA2" data-loading-text="Saving..." class="btn btn-primary">Save Timer</button>
                    </div>
                    </br>
               </div>
             </div>
        </div>
        
        <div class="col-md-10 text-center"><b>Room B</b></div><br />
        
        <div class="col-md-6 row">
            <p class="col-md-12 text-center"><span class='label label-success ldrB1'>LAMP 1</span></p>
            <input type="checkbox" id="lampB1" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($modelB->lampB1 == "on") echo "checked";  if($modelB->lampB1TimerStatus == "on") echo " disabled";?>>
            <div class="col-md-12 checkbox">
                <label>
                    <input type="checkbox" id="lampB1checked" <?php if($modelB->lampB1TimerStatus != "off") {echo "checked"; }?>> Set Timer
                </label>
            </div>
            <div class="row" id="lampB1status" <?php if($modelB->lampB1TimerStatus != "on") echo 'style="display: none;"'; ?>>
                <div class="col-md-3">
                    Start : 
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lampB1TimerStart" value="<?php
                            $B1Start = new DateTime($modelB->lampB1TimerStart);
                            echo $B1Start->format("H:i");?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                </div>
                <div class="col-md-3">
                    Stop :
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lampB1TimerStop" value="<?php
                            $B1Stop = new DateTime($modelB->lampB1TimerStop);
                            echo $B1Stop->format("H:i");?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </br>
                    <div class="text-center">
                        <button type="button" id="buttonLampB1" data-loading-text="Saving..." class="btn btn-primary">Save Timer</button>
                    </div>
                    </br>
                </div>
                
              </div>
        </div>
        <div class="col-md-6 row">
            <p class="col-md-12 text-center"><span class='label label-success ldrB2'>LAMP 2</span></p>
           <input type="checkbox" id="lampB2" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($modelB->lampB2 == "on") echo "checked";  if($modelB->lampB2TimerStatus == "on") echo " disabled";?>>
           <div class="col-md-12 checkbox">
               <label>
                   <input type="checkbox" id="lampB2checked" <?php if($modelB->lampB2TimerStatus != "off") echo "checked"; ?>> Set Timer
               </label>
           </div>
           <div class="row" id="lampB2status" <?php if($modelB->lampB2TimerStatus != "on") echo 'style="display: none;"'; ?>>
               <div class="col-md-3">
                   Start : 
                   <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lampB2TimerStart" value="<?php
                        $B2Start = new DateTime($modelB->lampB2TimerStart);
                        echo $B2Start->format("H:i");?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
               </div>
               <div class="col-md-3">
                   Stop :
                    <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lampB2TimerStop" value="<?php
                        $B2Stop = new DateTime($modelB->lampB2TimerStop);
                        echo $B2Stop->format("H:i");?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                    </br>
                    <div class="text-center">
                        <button type="button" id="buttonLampB2" data-loading-text="Saving..." class="btn btn-primary">Save Timer</button>
                    </div>
                    </br>
               </div>
             </div>
        </div>
        
        
        <div class="col-md-10 text-center"><b>Room C</b></div><br />
        <div class="col-md-6 row">
            <p class="col-md-12 text-center"><span class='label label-success ldrC1'>LAMP 1</span></p>
            <input type="checkbox" id="lampC1" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($modelC->lampC1 == "on") echo "checked";  if($modelC->lampC1TimerStatus == "on") echo " disabled";?>>
            <div class="col-md-12 checkbox">
                <label>
                    <input type="checkbox" id="lampC1checked" <?php if($modelC->lampC1TimerStatus != "off") {echo "checked"; }?>> Set Timer
                </label>
            </div>
            <div class="row" id="lampC1status" <?php if($modelC->lampC1TimerStatus != "on") echo 'style="display: none;"'; ?>>
                <div class="col-md-3">
                    Start : 
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lampC1TimerStart" value="<?php
                            $C1Start = new DateTime($modelC->lampC1TimerStart);
                            echo $C1Start->format("H:i");?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                </div>
                <div class="col-md-3">
                    Stop :
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lampC1TimerStop" value="<?php
                            $C1Stop = new DateTime($modelC->lampC1TimerStop);
                            echo $C1Stop->format("H:i");?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </br>
                    <div class="text-center">
                        <button type="button" id="buttonLampC1" data-loading-text="Saving..." class="btn btn-primary">Save Timer</button>
                    </div>
                    </br>
                </div>
                
              </div>
        </div>
        <div class="col-md-6 row">
            <p class="col-md-12 text-center"><span class='label label-success ldrC2'>LAMP 2</span></p>
           <input type="checkbox" id="lampC2" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($modelC->lampC2 == "on") echo "checked";  if($modelC->lampC2TimerStatus == "on") echo " disabled";?>>
           <div class="col-md-12 checkbox">
               <label>
                   <input type="checkbox" id="lampC2checked" <?php if($modelC->lampC2TimerStatus != "off") echo "checked"; ?>> Set Timer
               </label>
           </div>
           <div class="row" id="lampC2status" <?php if($modelC->lampC2TimerStatus != "on") echo 'style="display: none;"'; ?>>
               <div class="col-md-3">
                   Start : 
                   <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lampC2TimerStart" value="<?php
                        $C2Start = new DateTime($modelC->lampC2TimerStart);
                        echo $C2Start->format("H:i");?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
               </div>
               <div class="col-md-3">
                   Stop :
                    <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lampC2TimerStop" value="<?php
                        $C2Stop = new DateTime($modelC->lampC2TimerStop);
                        echo $C2Stop->format("H:i");?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                    </br>
                    <div class="text-center">
                        <button type="button" id="buttonLampC2" data-loading-text="Saving..." class="btn btn-primary">Save Timer</button>
                    </div>
                    </br>
               </div>
             </div>
        </div>
        
        <div class="col-md-10 text-center"><b>Room D</b></div><br />
        <div class="col-md-6 row">
            <p class="col-md-12 text-center"><span class='label label-success ldrD1'>LAMP 1</span></p>
            <input type="checkbox" id="lampD1" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($modelD->lampD1 == "on") echo "checked";  if($modelD->lampD1TimerStatus == "on") echo " disabled";?>>
            <div class="col-md-12 checkbox">
                <label>
                    <input type="checkbox" id="lampD1checked" <?php if($modelD->lampD1TimerStatus != "off") {echo "checked"; }?>> Set Timer
                </label>
            </div>
            <div class="row" id="lampD1status" <?php if($modelD->lampD1TimerStatus != "on") echo 'style="display: none;"'; ?>>
                <div class="col-md-3">
                    Start : 
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lampD1TimerStart" value="<?php
                            $D1Start = new DateTime($modelD->lampD1TimerStart);
                            echo $D1Start->format("H:i");?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                </div>
                <div class="col-md-3">
                    Stop :
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" name="lampD1TimerStop" value="<?php
                            $D1Stop = new DateTime($modelD->lampD1TimerStop);
                            echo $D1Stop->format("H:i");?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </br>
                    <div class="text-center">
                        <button type="button" id="buttonLampD1" data-loading-text="Saving..." class="btn btn-primary">Save Timer</button>
                    </div>
                    </br>
                </div>
                
              </div>
        </div>
        <div class="col-md-6 row">
            <p class="col-md-12 text-center"><span class='label label-success ldrD2'>LAMP 2</span></p>
           <input type="checkbox" id="lampD2" name="my-checkbox" data-size="large" data-on-color="success" data-off-color="danger" <?php if($modelD->lampD2 == "on") echo "checked";  if($modelD->lampD2TimerStatus == "on") echo " disabled";?>>
           <div class="col-md-12 checkbox">
               <label>
                   <input type="checkbox" id="lampD2checked" <?php if($modelD->lampD2TimerStatus != "off") echo "checked"; ?>> Set Timer
               </label>
           </div>
           <div class="row" id="lampD2status" <?php if($modelD->lampD2TimerStatus != "on") echo 'style="display: none;"'; ?>>
               <div class="col-md-3">
                   Start : 
                   <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lampD2TimerStart" value="<?php
                        $D2Start = new DateTime($modelD->lampD2TimerStart);
                        echo $D2Start->format("H:i");?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
               </div>
               <div class="col-md-3">
                   Stop :
                    <div class="input-group clockpicker">
                        <input type="text" class="form-control" name="lampD2TimerStop" value="<?php
                        $D2Stop = new DateTime($modelD->lampD2TimerStop);
                        echo $D2Stop->format("H:i");?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                    </br>
                    <div class="text-center">
                        <button type="button" id="buttonLampD2" data-loading-text="Saving..." class="btn btn-primary">Save Timer</button>
                    </div>
                    </br>
               </div>
             </div>
        </div>
        
    </div>
</div>
