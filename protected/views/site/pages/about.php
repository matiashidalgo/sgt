<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'about');

Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/quienes_somos.css'); 
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/lightbox.css');

Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/scripts/mapa.js');
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/scripts/lightbox.js');
Yii::app()->getClientScript()->registerScriptFile('https://maps.google.com/maps/api/js?sensor=true');

$this->breadcrumbs=array(
	Yii::t('general', 'about'),
);
?>
<div class="subtitulo-contenido">Nuestro taller se encuentra ubicado en la calle 4 de Abril 107, Exactamente: </div>
<div id="map_canvas" class="mapaGoogle" style="width:755px; height:400px"></div>
<div class="subtitulo-contenido">Algunas Imagenes de nuestro Taller: </div>
<div class="imageRow">
	<div class="set">
		<div class="single first">
			<a href="../../images/taller/taller.jpg" rel="lightbox[taller]" title="Nuestros equipos estan en constante actualización para brindarle las mejores soluciones electronicas">
				<img src="../../images/taller/taller.jpg" width="200" height="200" alt="Taller: Foto 1 de 3">
			</a>
		</div>
		<div class="single">
			<a href="../../images/taller/taller2.jpg" rel="lightbox[taller]" title="Nuestros equipos estan en constante actualización para brindarle las mejores soluciones electronicas">
				<img src="../../images/taller/taller2.jpg" width="200" height="200" alt="Taller: Foto 3 de 3">
			</a>
		</div>
		<div class="single last">
			<a href="../../images/taller/taller3.jpg" rel="lightbox[taller]" title="Nuestros equipos estan en constante actualización para brindarle las mejores soluciones electronicas">
				<img src="../../images/taller/taller3.jpg" width="200" height="200" alt="Taller: Foto 2 de 3">
			</a>
		</div>
	</div>
</div>
