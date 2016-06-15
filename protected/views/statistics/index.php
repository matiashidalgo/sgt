<?php
/* @var $this StatisticsController */
/* @var $model Statistics */
/* @var $lastStat Statistics */
/* @var $autocompletes['Tecnicos'] */



$this->breadcrumbs=array(
    Yii::t('general', 'Statistics'),
);

$this->menu=array(
    array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'Statistics'), 'url'=>array('create')),
    array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'Statistics'), 'url'=>array('admin')),
);

//$valTecnico = $autocompletes['Tecnicos'][0];

$valTecnico = $autocompletes['Tecnicos'][0];

if (isset($model->idTecnico))
{
		$valTecnico = $model->idTecnico->getAllConcat();
}

?>

<script type="text/javascript">

	function setTecnicoId($this)
	{
        $('#Statistics_tecnico').val($($this).val().split("-",1));   
     
        if ($('#tecnico').val() == '')
	            $('#tecnico').val('<?php echo $autocompletes['Tecnicos'][0]?>');
	}

	function borrarCampoTecnico()
	{
		if ($('#tecnico').val() == '<?php echo $autocompletes['Tecnicos'][0]?>')
	    	$('#tecnico').val('');
	}

</script>

<h1>Estadisticas</h1>
<?php if (!is_null($lastStat)): ?>
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$lastStat,
        'itemView'=>'_view'
    )); ?>
<?php else: ?>
    <div class="statistics">
        <div class="statistic">$<?php echo $model->statistic ?></div>
        <div class="date-from"><?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
                $model->date_from,'medium',null)); ?></div>
        <div class="date-to"><?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
                $model->date_to,'medium',null)); ?></div>
    </div>
<?php endif; ?>
<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'statistics-form',
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

    <?php echo $form->errorSummary($model); ?>
    
    
    <div class="row">

		<?php echo $form->labelEx($model,'tecnico'); ?>
		<?php echo $form->hiddenField($model,'tecnico');

        $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
            'name'=>'statistics[tecnico]',
            //'sourceUrl'=>'sugerenciasModelo',
            'source'=>$autocompletes['Tecnicos'],
            // additional javascript options for the autocomplete plugin
            'options'=>array(
                'minLength'=>'2'
            ),
            'value' => $valTecnico,
            'htmlOptions' => array(
                'id'=>'tecnico',
            	'onblur' => 'setTecnicoId(this)',
            	'onfocus' => 'borrarCampoTecnico()',
            ),
        ));
		?>
		
		<?php echo $form->error($model,'tecnico'); ?> 
		
	</div>   
    

    <div class="row">
        <?php echo $form->labelEx($model,'date_from'); ?>
        <?php echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=> $model,
            'name' => 'date_from',
            'value' => isset($model->date_from) && !empty($model->date_from) ?
                    Yii::app()->locale->dateFormatter->formatDateTime(
                        $model->date_from,'medium',null) : '',
            'options' => array(
                'changeMonth' => true,
                'changeYear' => true,
                'altField' =>  '#alternate_date_from',
                'altFormat' => 'yy-mm-dd',
                /*'minDate'=>0,*/
                'maxDate'=>0,
                'showAnim'=>'slide',
            ),
            'language'=> Yii::app()->getLanguage(),
        ),true); ?>
        <?php echo $form->hiddenField($model, 'date_from', array('id'=> 'alternate_date_from'));?>
        <?php echo $form->error($model,'date_from'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'date_to'); ?>
        <?php echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=> $model,
            'name' => 'date_to',
            'value' => isset($model->date_to) && !empty($model->date_to) ?
                    Yii::app()->locale->dateFormatter->formatDateTime(
                        $model->date_to,'medium',null) : '',
            'options' => array(
                'changeMonth' => true,
                'changeYear' => true,
                'altField' =>  '#alternate_date_to',
                'altFormat' => 'yy-mm-dd',
                /*'minDate'=>0,*/
                'maxDate'=>0,
                'showAnim'=>'slide',
            ),
            'language'=> Yii::app()->getLanguage(),
        ),true); ?>
        <?php echo $form->hiddenField($model, 'date_to', array('id'=> 'alternate_date_to'));?>
        <?php echo $form->error($model,'date_to'); ?>
    </div>

    <div class="row">
        <?php echo Yii::t('general', 'must be saved'); ?>
        <?php echo CHtml::checkBox('save_statistic',0,array('size'=>50,'maxlength'=>50,'checked'=>'uncheched')); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('general', 'generate statistic')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
