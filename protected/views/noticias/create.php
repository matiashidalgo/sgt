<?php
/* @var $this NoticiasController */
/* @var $model Noticias */

$this->breadcrumbs=array(
	'Noticiases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Noticias', 'url'=>array('index')),
	array('label'=>'Manage Noticias', 'url'=>array('admin')),
);
?>

<h1>Create Noticias</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>