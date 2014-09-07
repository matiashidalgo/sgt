<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'about');

Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/quienes_somos.css'); 
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/lightbox.css');

Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/scripts/mapa.js');
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/scripts/lightbox.js');
Yii::app()->getClientScript()->registerScriptFile('https://maps.google.com/maps/api/js?sensor=true');

Yii::app()->clientScript->registerMetaTag('service, oficial, tecnico, taller,consulta, orden de reparacion, orden, reparacion, pedido, saber, necesito, busco, 
										interesa, consultar, estado, seguimiento, consultas, ordenes, reparaciones, arreglo, arreglar, presupuesto, prometido, 
										presupuestacion, utilidad, herramienta, técnico, electronica, electro, servicio, arreglar, tv, lcd, led, tcr, viejo,
										monitores, monitor, tvs, plasma, samsung, philips, sanyo, noblex, philco, jvc, dvd, reproductor, grabador, grabadora,
										video, casetera, casette, service oficial, service tecnico, técnico', 
										'keywords');

$this->breadcrumbs=array(
	Yii::t('general', 'about'),
);
?>
<div class="subtitulo-contenido">Nuestro taller se encuentra ubicado en la <?php echo Yii::app()->params['address'] ?>, Exactamente: </div>
<div id="map_canvas" class="mapaGoogle" style="width:755px; height:400px"></div>

<div class="subtitulo-contenido">Algunas Imagenes de nuestras galardonadas herramientas de trabajo: </div>
<div class="imageRow">
    <div class="set">
        <div class="single first">
            <a href="../../images/taller/TOOLS1.jpg" rel="lightbox[taller]" title="Nuestros equipos estan en constante actualización para brindarle las mejores soluciones electronicas">
                <img src="../../images/taller/TOOLS1.jpg" width="200" height="200" alt="Taller: Foto 1 de 3">
            </a>
        </div>
        <div class="single">
            <a href="../../images/taller/TOOLS2.jpg" rel="lightbox[taller]" title="Nuestros equipos estan en constante actualización para brindarle las mejores soluciones electronicas">
                <img src="../../images/taller/TOOLS2.jpg" width="200" height="200" alt="Taller: Foto 3 de 3">
            </a>
        </div>
        <div class="single">
            <a href="../../images/taller/TOOLS3.jpg" rel="lightbox[taller]" title="Nuestros equipos estan en constante actualización para brindarle las mejores soluciones electronicas">
                <img src="../../images/taller/TOOLS3.jpg" width="200" height="200" alt="Taller: Foto 3 de 3">
            </a>
        </div>
        <div class="single">
            <a href="../../images/taller/TOOLS4.jpg" rel="lightbox[taller]" title="Nuestros equipos estan en constante actualización para brindarle las mejores soluciones electronicas">
                <img src="../../images/taller/TOOLS4.jpg" width="200" height="200" alt="Taller: Foto 3 de 3">
            </a>
        </div>
        <div class="single last">
            <a href="../../images/taller/TOOLS5.jpg" rel="lightbox[taller]" title="Nuestros equipos estan en constante actualización para brindarle las mejores soluciones electronicas">
                <img src="../../images/taller/TOOLS5.jpg" width="200" height="200" alt="Taller: Foto 2 de 3">
            </a>
        </div>
    </div>
</div>

<div class="subtitulo-contenido">Algunas imagenes del resultado de nuestro trabajo en compania de nuestra avanzada tecnologia puesta al servicio de nuestros clientes: </div>
<div class="imageRow">
    <div class="set">
        <div class="single first">
            <a href="../../images/taller/PLASMA1.jpg" rel="lightbox[taller]" title="Este magnifico televisor Plasma de 50'' Sony en pleno funcionamiento luego de una exitosa reparación">
                <img src="../../images/taller/PLASMA1.jpg" width="200" height="200" alt="Taller: Foto 1 de 3">
            </a>
        </div>
        <div class="single">
            <a href="../../images/taller/PLASMA2.jpg" rel="lightbox[taller]" title="Este magnifico televisor Plasma de 50'' Sony en pleno funcionamiento luego de una exitosa reparación">
                <img src="../../images/taller/PLASMA2.jpg" width="200" height="200" alt="Taller: Foto 3 de 3">
            </a>
        </div>
        <div class="single">
            <a href="../../images/taller/PLASMA3.jpg" rel="lightbox[taller]" title="Este magnifico televisor Plasma de 50'' Sony en pleno funcionamiento luego de una exitosa reparación">
                <img src="../../images/taller/PLASMA3.jpg" width="200" height="200" alt="Taller: Foto 3 de 3">
            </a>
        </div>
        <div class="single">
            <a href="../../images/taller/PLASMA4.jpg" rel="lightbox[taller]" title="Este magnifico televisor Plasma de 50'' Sony en pleno funcionamiento luego de una exitosa reparación">
                <img src="../../images/taller/PLASMA4.jpg" width="200" height="200" alt="Taller: Foto 3 de 3">
            </a>
        </div>
        <div class="single last">
            <a href="../../images/taller/PLASMA5.jpg" rel="lightbox[taller]" title="Este magnifico televisor Plasma de 50'' Sony en pleno funcionamiento luego de una exitosa reparación">
                <img src="../../images/taller/PLASMA5.jpg" width="200" height="200" alt="Taller: Foto 2 de 3">
            </a>
        </div>
    </div>
</div>