<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . " - " . Yii::t('general', 'home');
?>

<h1>Bienvenido al <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<h1><?php echo CHtml::encode(Yii::t('general', 'enterprise'))?></h1>

<br/>
Aqui podrán conocer el estado de sus Equipos en reparacion desde la pagina de Consultas de Ordenes.<br/>
<br/>
Tambien podrán ver imagenes de nuestro taller y algunos equipos reparados en la pagina de Quienes Somos.<br/>
<br/>
Por dudas y consultas al servicio tecnico, podran enviar un email a traves de la pagina de contacto.<br/>
