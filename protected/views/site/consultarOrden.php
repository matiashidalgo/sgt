<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . " - " . Yii::t('general', 'consultaDeOrden');

Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/consultarOrden.css');

?>
<div class="black_overlay"></div>
<div class="popup-loading">
    <img alt="loading" src="/images/ajax-loader-transparent.gif">
    <div class="popup-title"></div>
</div>
<h1><?php echo CHtml::encode(Yii::t('general', 'consultaDeOrden'))?></h1>

<p>
	Consulta exitosa, A continuacion la informacion completa sobre su orden de reparacion:
</p>

<div class="ficha-orden">
	<div class="ordenDeReparacion">
		<div class="cabecera">
			<div class="taller">
				<div class="nombre-taller"><?php echo CHtml::encode(Yii::t('general', 'enterprise'));?></div>
				<div class="direccion"><?php echo Yii::app()->params['address'] ?></div>
				<div class="tel-ubicacion">Tel. <?php echo Yii::app()->params['phone'] ?> <br/> 7000 Tandil - Bs. As.</div>
			</div>
			<div class="documento">
				<div class="clase"> x </div>
				<div class="tipo-doc"> DOCUMENTO NO VALIDO COMO FACTURA </div>
			</div>
			<div class="orden">
				<div class="titulo-orden"> ORDEN DE REPARACION </div>
				<div class="num-orden">Nº <?php echo CHtml::encode($model_orden->nro_orden);?></div>
				<div class="fecha">Fecha <?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$model_orden->fecha_ingreso,'medium',null));?></div>
			</div>
		</div>
		<div class="datos-cliente">
			<div class="nombre-cliente">Apellido y nombres: <?php echo CHtml::encode($model_orden->idCliente->apellido) . " " . CHtml::encode($model_orden->idCliente->nombre);?></div>
			<div class="domicilio-cliente">Domicilio: <?php echo CHtml::encode($model_orden->idCliente->direccion);?></div>
			<div class="localidad-cliente">Localidad: <?php echo CHtml::encode($model_orden->idCliente->ciudad);?></div>
			<div class="telefonos">Telefono: <?php echo CHtml::encode($model_orden->idCliente->telefono) . " Celular: " . CHtml::encode($model_orden->idCliente->celular);?></div>
			<div class="titulo">Cliente:</div>
		</div>
		<div class="datos-equipo">
			<div class="modelo-equipo">Modelo: <?php echo CHtml::encode($model_orden->idEquipo->modelo);?></div>
			<div class="marca-equipo">Marca: <?php echo CHtml::encode($model_orden->idEquipo->marca);?></div>
			<div class="nro-serie-equipo">Número de serie: <?php echo CHtml::encode($model_orden->nro_serie);?></div>
			<?php if ($model_orden->imei <> ''){?><div class="imei">IMEI: <?php echo CHtml::encode($model_orden->imei);?></div>
				<style>
					.ordenDeReparacion .datos-equipo {  height: 170px;   }
					.ordenDeReparacion { height: 660px; }
				</style>
			<?php }?>
			<div class="adquirido-equipo">Adquirido en: <?php echo CHtml::encode($model_orden->adquirido_en);?></div>
			<div class="nro-factura-equipo">Nº de factura: <?php echo CHtml::encode($model_orden->nro_factura);?></div>
			<div class="fecha-compra-equipo">Fecha de compra: <?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$model_orden->fecha_compra,'medium',null));?></div>
			<div class="titulo">Equipo:</div>
		</div>
		<div class="detalle">
			<div class="falla">Defecto: <?php echo CHtml::encode($model_orden->falla);?></div>
			<div class="reparacion">Reparacion: <?php echo CHtml::encode($model_orden->reparacion); 
														if($model_orden->precio != "$") { 
															echo ". Costo:" . CHtml::encode($model_orden->precio);
														}
														?></div>
														<style>
														.ordenDeReparacion .detalle div {letter-spacing: 2px;}
														</style>
			<div class="titulo">Defectos y reparaciones:</div>
		</div>
		<div class="fechas">
			<div class="fecha-prometido">Fecha de prometido: <?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$model_orden->fecha_prometido,'medium',null));?></div>
			<div class="fecha-reparado">Fecha de reparado: <?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$model_orden->fecha_reparado,'medium',null));?></div>
			<div class="fecha-entregado">Fecha de entregado: <?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$model_orden->fecha_entrega,'medium',null));?></div>
		</div>
	</div>
</div>

<div class="form-consulta">
    <form id = "contact">
        <div style="display: none;" id = "about">

            <input title="Tu Nombre" type="text" name="Comentario[name]" class="input" value='<?php echo CHtml::encode($model_orden->idCliente->apellido) . " " . CHtml::encode($model_orden->idCliente->nombre);?>'/>

            <input title="Tus Telefonos" type="text" name="Comentario[phone]" class="input" value='Telefono: <?php echo CHtml::encode($model_orden->idCliente->telefono) . " Celular: " . CHtml::encode($model_orden->idCliente->celular);?>'/>

            <input title="Tu Orden" type="text" name="Comentario[order_id]" class="input" value="<?php echo $model_orden->nro_orden ?>"/>

            <input title="Tu E-Mail" type="text" name="Comentario[email]" class="input" value="<?php echo $model_orden->idCliente->email ?>"/>

            <input title="validator" type="text" name="Comentario[consulta_orden]" class="input" value="1" style="display: none"/>

        </div>

        <div id = "mess">

            <textarea title="Tu comentario" name="Comentario[comentario]" cols="82" rows="6" class="textarea" onclick="if(this.value == 'Si usted tiene alguna duda o consulta, haganoslo saber aquí mismo, a la brevedad nos contactemos con usted. Gracias.'){this.value=''};"  onfocus="this.style='color: black';">Si usted tiene alguna duda o consulta, haganoslo saber aquí mismo, a la brevedad nos contactemos con usted. Gracias.</textarea>

        </div>

        <div id = "send">

            <input title="Enviar comentario" type="submit" name="submit" value="Enviar comentario" class="button">

        </div>

    </form>
</div>

<script type="text/javascript">
    var contactform 	= $('#contact'),
        success		= 'Muchas gracias! Tu mensaje fue enviado, a la brevedad me comunicare con usted.';

    contactform.submit(function(){
        scrollTop();
        showLoadingPopUp('Estamos enviando su comentario, Por favor espere...');
        // Hide contact input and button
        $('#mess').hide();
        $('#send').hide();
        $.ajax({
            type: "POST",
            url: "/index.php/consultas/create",
            data: $(this).serialize(),
            success: function(msg)
            {
                if(msg == 'SEND'){
                    response = '<div class="status-success">'+ success +'</div>';
                }
                else{
                    response = '<div class="status-error">'+ msg +'</div>';
                }
                // Hide any previous response text
                $(".status-error,.status-success").remove();
                // Show response message
                contactform.prepend(response);
                hideLoadingPopUp();
                scrollBottom();
            }
        });
        return false;
    });


    function showLoadingPopUp(title) {
        $('.black_overlay').show();
        $('.popup-loading').show();
        $('.popup-title').html(title);
    }

    function hideLoadingPopUp() {
        $('.black_overlay').hide();
        $('.popup-loading').hide();
        $('.popup-title').html("");
    }

    function scrollTop() {
        $('html,body').animate({
            scrollTop: 0
        }, 300);
    }

    function scrollBottom() {
        var body = document.body,
            html = document.documentElement;

        var height = Math.max( body.scrollHeight, body.offsetHeight,
            html.clientHeight, html.scrollHeight, html.offsetHeight );

        $('html,body').animate({
            scrollTop: height
        }, 300);
    }
</script>