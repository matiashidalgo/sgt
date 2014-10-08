<?php
/* @var $model Ordenes */
?>
<link href="<?php echo Yii::app()->baseUrl ?>/css/pdf.css" type="text/css" rel="stylesheet">
<div class="pdf">
    <div class="clientCopy">
        <div class="header">
            <!--NADA-->
        </div>

        <div class="password"><?php echo $model->idCliente->password ?></div>
        <div class="dateIngreso"><?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime($model->fecha_ingreso,'medium',null));?></div>
        <div class="equipo"><?php echo $model->idEquipo->tipo ?></div>
        <div class="marca"><?php echo $model->idEquipo->marca ?></div>
        <div class="modelo"><?php echo $model->idEquipo->modelo ?></div>
        <div class="nroSerie"><?php echo $model->nro_serie ?></div>
        <div class="falla"><?php echo $model->falla ?></div>

        <div class="footer">
            <!--NADA-->
        </div>
    </div>
    <div class="ticket">
        <div class="leftSide">
            <div class="lastname"><?php echo $model->idCliente->apellido ?></div>
            <div class="firstname"><?php echo $model->idCliente->nombre ?></div>
            <div class="equipo"><?php echo $model->idEquipo->tipo ?></div>
            <div class="marca"><?php echo $model->idEquipo->marca ?></div>
            <div class="modelo"><?php echo $model->idEquipo->modelo ?></div>
            <div class="nroSerie"><?php echo $model->nro_serie ?></div>
            <div class="falla"><?php echo $model->falla ?></div>
        </div>

        <div class="rightSide">
            <div class="dateIngreso">Fecha <?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime($model->fecha_ingreso,'medium',null));?></div>
            <div class="address"><?php echo $model->idCliente->direccion ?></div>
            <div class="tel"><?php echo $model->idCliente->telefono ?></div>
            <div class="cel"><?php echo $model->idCliente->celular ?></div>
        </div>
    </div>
</div>