<?php
/* @var $model Ordenes */
?>
<link href="<?php echo Yii::app()->baseUrl ?>/css/pdf.css" type="text/css" rel="stylesheet">
<div class="pdf" style="background: transparent url(<?php echo Yii::app()->baseUrl . '/images/orden.png' ?>) left top no-repeat; width:100%; height: 100%;">
    <div class="nro_ordentop">Orden de reparación <span class="info" style="font-size: 15px;">N°<?php echo $model->nro_orden ?></span></div>
    <div class="clientCopy">
        <div class="header">
            <div class="direccion">Gral. Rodriguez 1150 - Tel. 4425154 - 154 52 1111</div>
            <div class="url">Web: <a href="http://www.serviceleotv.com.ar">www.serviceleotv.com.ar</a></div>
            <div class="email">e-mail: <a href="mailto:lrhmvm@hotmail.com">lrhmvm@hotmail.com</a></div>
        </div>
        <div class="content">
            <div class="password">Contraseña: <span class="info"><?php echo $model->idCliente->password ?></span></div>
            <div class="dateIngreso">Fecha: <span class="info"><?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime($model->fecha_ingreso,'medium',null));?></span></div>
            <div class="marca">Marca: <span class="info"><?php echo $model->idEquipo->marca ?></span></div>
            <div class="modelo">Modelo: <span class="info"><?php echo $model->idEquipo->modelo ?></span></div>
            <div class="nroSerie">Serie Nº: <span class="info"><?php echo $model->nro_serie; if ($model->imei <> '') echo ' IMEI:' . $model->imei ?></span></div>
            <div class="falla">Falla: <span class="info"><?php echo $model->falla ?></span></div>
        </div>
        <div class="footer">
            <div class="legal">
                <span class="info">Nota:</span> Este documento deberá ser presentado para retirar el producto arriba detallado. Transcurridos los 90 dias de la fecha pactada para su retiro la casa quedará facultada para disponer del producto sin necesidad de previa interpelacion judicial alguna, quedando de esta forma, cancelada la deuda y los daños y perjuicios emergentes de su incumplimiento. <br />
                El cliente toma conocimiento y acepta conocer que su información personal e información de su dispositivo será utilizada por Samsung para prestarle el Servicio solicitado, identificarlo como Usuario de nuestros Productos y Servicios, saber cómo utiliza nuestros Productos y Servicios para mejorar su experiencia y desarrollar productos y servicios nuevos, con fines de evaluación y análisis de mercado,
                realizar sorteos, concursos o promociones y para proporcionarle contenidos, recomendaciones y publicidad personalizados. A tal efecto, Samsung podrá compartir su información con empresas del grupo Samsung, socios comerciales, proveedores de servicios y autoridades competentes localizados dentro o fuera de la República Argentina (como por ejemplo: Corea del Sur). Para más información visite nuestra política de privacidad global (https://account.samsung.com/membership/pp) y local (http://www.samsung.com/ar/info/privacy/ ), las cuales Ud. consiente al utilizar nuestros productos y firmar esta orden de servicio.
            </div>
        </div>
    </div>
</div>