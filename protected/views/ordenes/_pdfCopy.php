<?php
/* @var $model Ordenes */
?>
<link href="<?php echo Yii::app()->baseUrl ?>/css/pdf.css" type="text/css" rel="stylesheet">
<div class="pdf">
    <div class="ticket">
        <div class="leftSide">
            <div class="nro_orden">Orden de reparación <span class="info" style="font-size: 15px;">N° <?php echo $model->nro_orden ?></span></div>
            <div class="lastname">Apellido <?php echo $model->idCliente->apellido ?></div>
            <div class="firstname">Nombre <?php echo $model->idCliente->nombre ?></div>
            <div class="equipo">Equipo <?php echo $model->idEquipo->tipo ?></div>
            <div class="marca">Marca <?php echo $model->idEquipo->marca ?></div>
            <div class="modelo">Modelo <?php echo $model->idEquipo->modelo ?></div>
            <div class="nroSerie">Serie N° <?php echo $model->nro_serie?></div>
        </div>
        <div class="rightSide">
            <div class="dateIngreso">Fecha <?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime($model->fecha_ingreso,'medium',null));?></div>
            <div class="address">Domicilio <?php echo $model->idCliente->direccion ?></div>
            <div class="tel">Teléfonos <?php echo ($model->idCliente->telefono != '')?$model->idCliente->telefono:'-' ?></div>
            <div class="cel"><span style="color: #FFFFFF;">Teléfonos</span> <?php echo ($model->idCliente->celular != '')?$model->idCliente->celular:'-' ?><br><br></div>
            <div class="imei"><?php echo ($model->imei != '') ? 'IMEI:' . $model->imei : '' ?></div>
        </div>
    </div>
    <div class="nfalla">Falla <?php echo $model->falla ?></div>

    <div class="extras">
        <div class="observaciones">
            Observaciones___________________________________________________________________________________<br/>__________________________________________________________________________________________________
        </div>
        <div class="reparacion">
            Reparación______________________________________________________________________________________<br/>__________________________________________________________________________________________________
        </div>
        <div class="repuestos">
            Repuestos__________________________________________________
            ____________________________________________________________
        </div>
        <div class="fechas">
            Reparado__/__/____<span style="color: #FFFFFF;">------------</span>Entregado__/__/____
        </div>
        <div class="firma-final">
            _________________________________________________ <br />
            Firma conforme----------------Aclaración<span style="color: #FFFFFF;">--------</span>
        </div>
        <div class="condiciones">
            El cliente toma conocimiento y acepta conocer que su información personal e información de su dispositivo será utilizada por Samsung para prestarle el Servicio solicitado, identificarlo como Usuario de nuestros Productos y Servicios, saber cómo utiliza nuestros Productos y Servicios para mejorar su experiencia y desarrollar productos y servicios nuevos, con fines de evaluación y análisis de mercado,
            realizar sorteos, concursos o promociones y para proporcionarle contenidos, recomendaciones y publicidad personalizados. A tal efecto, Samsung podrá compartir su información con empresas del grupo Samsung, socios comerciales, proveedores de servicios y autoridades competentes localizados dentro o fuera de la República Argentina (como por ejemplo: Corea del Sur). Para más información visite nuestra política de privacidad global (https://account.samsung.com/membership/pp) y local (http://www.samsung.com/ar/info/privacy/ ), las cuales Ud. consiente al utilizar nuestros productos y firmar esta orden de servicio.
        </div>
    </div>
</div>