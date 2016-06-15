<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'ordenes') . ' - ' . Yii::t('general', 'admin');

$this->breadcrumbs=array(
	Yii::t('general', 'ordenes')=>array('index'),
	Yii::t('general', 'admin'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'ordenes'), 'url'=>array('index')),
	array('label'=>'Listar todas las ordenes', 'url'=>array('Index')),
	array('label'=>Yii::t('general', 'listOrdenesEntregadas'), 'url'=>array('ordenesEntregadas')),
	array('label'=>'Listar ordenes pendientes', 'url'=>array('OrdenesPendientes')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'orden'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle('slow');
	return false;
});
$('.search-form form').submit(function(){
	$('#ordenes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo (Yii::t('general', 'admin').' '.Yii::t('general', 'orden')); ?></h1>

<p>
Para lograr un resultado de mas concreto puede utilizar operadores de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada campo
</p>

<?php echo CHtml::link(Yii::t('general','advanced_search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ordenes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'nro_orden',
			'header'=>'Orden',
			'type' => 'raw',
			'value'=>'CHtml::link($data->nro_orden,Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey)))',
			'htmlOptions'=>array('width'=>'30px',
					'style'=>'text-align:center;'
),
				
),
			
		array('name'=>'nombrecliente',
			'header'=>'Cliente',
			'type' => 'raw',
			'value'=>'CHtml::link($data->idCliente->apellido . " " . $data->idCliente->nombre,Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey)))'),
		//array('name'=>'nombrecliente',
			//	'header'=>'Cliente',
				//'value'=>'$data->idCliente->apellido . " " . $data->idCliente->nombre'),//'$data->idCliente->nombre'),
		//'id_cliente',
		//'id_equipo',
		array('name'=>'tipoequipo',
			'header'=>'Tipo de equipo',
			'type' => 'raw',
			'value'=>'CHtml::link($data->equipos->tipo,Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey)))'),
		array(	
			'name'=>'modeloequipo',
			'header'=>'Modelo',
			'type' => 'raw',	
			'value'=>'CHtml::link($data->equipos->modelo,Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey)))'),//'$data->equipos->modelo'),
		//'nro_serie',
		//'adquirido_en',
		//'nro_factura',
		//'fecha_compra',
		array(
			'name'=>'nombretecnico',
			'header'=>'Tecnico',
			'type' => 'raw',
			'value'=>'CHtml::link($data->idTecnico->apellido . " " . $data->idTecnico->nombre,Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey)))'),
		/*'reparacion',
		'fecha_ingreso',
		'fecha_presupuesto',
		'fecha_reparado',
		'fecha_prometido',
		'fecha_entrega',
		'estado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<script>
	//-alert('<?php //echo $model->id_cliente;?>');
</script>
