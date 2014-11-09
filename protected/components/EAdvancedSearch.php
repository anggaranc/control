<?php

class EAdvancedSearch extends  CWidget {
    public $target;
    public $criteria;
    public $model;
	public $labels = array();
	public $cssClass = array();
	public $hide = false;
	
    public function init() {
		/**
		 * Labels.
		 */
		if (!isset($this->labels['advancedSearch']))
			$this->labels['advancedSearch'] = '&nbsp;Advanced Search';
		
		if (!isset($this->labels['add']))
			$this->labels['add'] = '';
		
		if (!isset($this->labels['remove']))
			$this->labels['remove'] = '';
		
		if (!isset($this->labels['submit']))
			$this->labels['submit'] = 'Search';
		
		/**
		 * CSS class.
		 */
		if (!isset($this->cssClass['advancedSearchTextSpan']))
			$this->cssClass['advancedSearchTextSpan'] = 'glyphicon glyphicon-search';
		
		if (!isset($this->cssClass['select']))
			$this->cssClass['select'] = 'form-control';
		
		if (!isset($this->cssClass['input']))
			$this->cssClass['input'] = 'form-control';
		
		if (!isset($this->cssClass['add']))
			$this->cssClass['add'] = 'glyphicon glyphicon-plus';
		
		if (!isset($this->cssClass['remove']))
			$this->cssClass['remove'] = 'glyphicon glyphicon-remove';
		
		if (!isset($this->cssClass['submit']))
			$this->cssClass['submit'] = 'btn btn-success';
	}

    public function getModelName() {
        return get_class($this->model);
    }

    public function run() {
        $this->render('eAdvancedSearch');

        $js = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js') . '/eAdvancedSearch.js');
        Yii::app()->clientScript->registerScriptFile($js, CClientScript::POS_BEGIN);
    }
}