<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . " - " . Yii::t('general', 'home');

Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/noticias.css');

Yii::app()->clientScript->registerMetaTag('service, oficial, tecnico, taller,consulta, orden de reparacion, orden, reparacion, pedido, saber, necesito, busco, 
										interesa, consultar, estado, seguimiento, consultas, ordenes, reparaciones, arreglo, arreglar, presupuesto, prometido, 
										presupuestacion, utilidad, herramienta, técnico, electronica, electro, servicio, arreglar, tv, lcd, led, tcr, viejo,
										monitores, monitor, tvs, plasma, samsung, philips, sanyo, noblex, philco, jvc, dvd, reproductor, grabador, grabadora,
										video, casetera, casette, service oficial, service tecnico, técnico', 
										'keywords');

Yii::app()->clientScript->registerMetaTag('Reparación de TV LCD, LED, Monitores, electronica en general. En nuestro sitio usted podrá obtener asistencia en un servicio técnico responsable, confiable y calificado que le proporciona soluciones a sus problemas en equipos electronicos', 
										'description');

Yii::app()->clientScript->registerScript('noticias', "
	var time = 1500;
	var times = 2;
	function mostrarNoticia(){
		$('.noticia:hidden:first').slideToggle('slow');
		if(times!=0){
			setTimeout(mostrarNoticia,time);
			times--;
			}
	}
	
	$(window).load(function() {
        mostrarNoticia();
    });
	");
if(!Yii::app()->user->isGuest){
	Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/alertas_ordenes.css');
}
?>

<?php if(!Yii::app()->user->isGuest){ ?>
	<div class="ordenes">
		<div class="titulo-ordenes">
			Alerta! 10 dias para llegar a fecha de prometido:
		</div>
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$alerta_ordenes_10_dias,
			'itemView'=>'ordenes',
			'template'=>'{items}',
		)); ?>
	</div>
	
	<div class="ordenes">
		<div class="titulo-ordenes">
			Alerta! Fecha de prometido VENCIDOS:
		</div>
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$alerta_ordenes_vencidas,
			'itemView'=>'ordenes',
			'template'=>'{items}',
		)); ?>
	</div>
<?php } ?>
<h1>Bienvenido al <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<h1><?php echo CHtml::encode(Yii::t('general', 'enterprise'))?></h1>

<br/>
Aqui podrán conocer el estado de sus Equipos en reparacion desde la pagina de Consultas de Ordenes.<br/>
<br/>
Tambien podrán ver imagenes de nuestro taller y algunos equipos reparados en la pagina de Quienes Somos.<br/>
<br/>
Por dudas y consultas al servicio tecnico, podran enviar un email a traves de la pagina de contacto.<br/>
<br/>
<div class="noticias">
	<div class="titulo-noticias">
		Últimas Noticias:
	</div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$tresNoticias,
	'itemView'=>'noticias',
	'template'=>'{items}',
)); ?>
</div>