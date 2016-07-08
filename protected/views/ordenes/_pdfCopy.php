<?php
/* @var $model Ordenes */
?>
<link href="<?php echo Yii::app()->baseUrl ?>/css/pdf.css" type="text/css" rel="stylesheet">
<div class="pdf">
    <div class="ticket">
        <div class="leftSide">
            <div class="nro_orden">Orden de reparación N° <?php echo $model->nro_orden ?></div>
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
            Observaciones_______________________________________________________________________________________________________________________________________________________________________________________
        </div>
        <div class="condiciones">
            Acepto la condiciones establecidas en los artículos 872 y 873 del código civil. <span class="firma">Firma:</span>
        </div>
        <div class="reparacion">
            Reparación______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________
        </div>
        <div class="repuestos">
            Repuestos__________________________________________________
            ____________________________________________________________
        </div>
        <div class="fechas">
            Reparado__/__/____<span style="color: #FFFFFF;">---------------------</span>Entregado__/__/____
        </div>
        <div class="firma-final">
            __________________________________________________ <br />
            Firma conforme----------------Aclaración<span style="color: #FFFFFF;">--------</span>
        </div>
    </div>
</div>