<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


	<!-- blueprint CSS framework -->
	<title><?php echo Yii::app()->name; ?></title>
	<?php // if (!Yii::app()->user->isGuest): ?>
            <link rel="shortcut icon" type="image/png" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico"/>
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/space.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pager.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/align.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/flash.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/carousel.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/widget.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap/css/bootstrap.min.css"/>
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-customize.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/navbar.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap/css/bootstrap-switch.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/clock/jquery-clockpicker.css" />
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap/js/bootstrap-switch.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/lib/clock/jquery-clockpicker.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.js') . '/flash.js');?>"></script>
	<?php // endif; ?>
</head>
	
<?php if (!Yii::app()->user->isGuest): ?>
<?php

$firstname = Yii::app()->user->name;

/**
 * Fetch user privileges.
 */
$privileges = ESecurity::getUserPrivileges(Yii::app()->user->id);

$route = $this->route;
$module = $this->module === null ? null : $this->module->name;
$action = $this->action === null ? null : $this->action->id;

Yii::app()->clientScript->registerScript('jsconf', 
	'var webroot = "' . Yii::app()->getBaseUrl(true) . '";', 
	CClientScript::POS_HEAD);

?>
<body style='margin-top:86px;' >
	<div class='flash'>
            <?php if (Yii::app()->user->hasFlash('success')): ?>
                    <div class='flash-success'>
                            <div class='pull-left'><?php echo Yii::app()->user->getFlash('success'); ?></div>
                            <div class='pull-left'>
                                    <span class='padding-left-10'></span>
                                    <a id='flash-close-btn' href='javascript:void(0);'><span class='glyphicon glyphicon-remove'></span></a>
                            </div>
                    </div>
            <?php elseif (Yii::app()->user->hasFlash('error')): ?>
                    <div class='flash-error'>
                            <div class='pull-left'><?php echo Yii::app()->user->getFlash('error'); ?></div>
                            <div class='pull-left'>
                                    <span class='padding-left-10'></span>
                                    <a id='flash-close-btn' href='javascript:void(0);'><span class='glyphicon glyphicon-remove'></span></a>
                            </div>
                    </div>
            <?php endif; ?>
	</div>
	<div class="container">
		<div class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo Yii::app()->getBaseUrl(true); ?>"><?php echo Yii::app()->name; ?></a>
			</div>
			<!-- Menu -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
      				<li class="<?php echo $route === 'site/index' ? 'active' : ''; ?>"><a href="<?php echo Yii::app()->getBaseUrl(true); ?>">Home</a></li>
                                    <?php if (!Yii::app()->user->isGuest): ?>
                                    <li class="dropdown <?php echo in_array($module, array('roomA','roomB','roomC','roomD')) ? 'active' : ''; ?>">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Room <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                                <?php if (isset($privileges[RoomA::PRIVILEGE_ROOM])): ?>
                                                <li><a href="<?php echo Yii::app()->createUrl('roomA'); ?>">Room A</a></li>
                                                <?php endif; ?>
                                                <?php if (isset($privileges[RoomB::PRIVILEGE_ROOM])): ?>
                                                <li><a href="<?php echo Yii::app()->createUrl('roomB'); ?>">Room B</a></li>
                                                <?php endif; ?>
                                                <?php if (isset($privileges[RoomC::PRIVILEGE_ROOM])): ?>
                                                <li><a href="<?php echo Yii::app()->createUrl('roomC'); ?>">Room C</a></li>
                                                <?php endif; ?>
                                                <?php if (isset($privileges[RoomD::PRIVILEGE_ROOM])): ?>
                                                <li><a href="/roomD">Room D</a></li>
                                                <?php endif; ?>
                                        </ul>
                                    </li>
                                    <?php if (isset($privileges[User::PRIVILEGE_VIEW]) || isset($privileges[Log::PRIVILEGE_VIEW])): ?>
                                    <li class="dropdown <?php echo in_array($module, array('user','log')) ? 'active' : ''; ?>">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                                <?php if (isset($privileges[User::PRIVILEGE_VIEW])): ?>
                                                <li><a href="<?php echo Yii::app()->createUrl('user'); ?>">User</a></li>
                                                <?php endif; ?>
                                                <?php if (isset($privileges[Log::PRIVILEGE_VIEW])): ?>
                                                <li><a href="<?php echo Yii::app()->createUrl('log'); ?>"><?php echo Yii::t('Log', 'System Log'); ?></a></li>
                                                <?php endif; ?>
                                        </ul>
                                    </li>
                                    <?php endif; ?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown <?php echo in_array($module, array('logout')) ? 'active' : ''; ?>">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <span class="glyphicon glyphicon-user"></span> <?php echo $firstname; ?> <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                    <li><a href="<?php echo Yii::app()->createUrl('logout'); ?>"><div style="color: red;"><span class="glyphicon glyphicon-log-out required"></span> Logout</div></a></li>
                                            </ul>
                                    </li>
                                    <?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<?php if (count($this->breadcrumbs)): ?>
		<ul class="breadcrumb" style="position: fixed; top: 0; margin-top: 50px; width: 100%; border-radius:0px;">
			<?php 
			foreach ($this->breadcrumbs as $key => $value) {
                            if (is_array($value))
                                    echo "<li><a href='{$value[0]}'>{$key}</a></li>";
                            else
                                    echo "<li class='active'>{$value}</li>";
			}
			?>
		</ul>
	<?php endif;
        
        echo $content; 
         
        ?>
	
</body>
<?php endif; ?>

<?php if (Yii::app()->user->isGuest): ?>
<body style='margin-top:86px;' >
	<div>
            <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
              <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
<!--                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                      </button>-->
                      <a class="navbar-brand" href="<?php echo Yii::app()->createUrl('/'); ?>"><?php echo Yii::app()->name; ?></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
<!--			  <ul class="nav navbar-nav">
                            <li class="<?php // echo $this->route === 'site/index' ? 'active' : ''; ?>"><a href="<?php // echo Yii::app()->createUrl('/'); ?>">Home</a></li>
                            <li class="<?php // echo $this->route === 'site/login' ? 'active' : ''; ?>"><a href="<?php // echo Yii::app()->createUrl('/site/login'); ?>">Login</a></li>
                      </ul>-->
                    <!--</div> /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>	
	</div><!-- page -->
	
        <?php echo $content; ?>
</body>
<?php endif; ?>
</html>

