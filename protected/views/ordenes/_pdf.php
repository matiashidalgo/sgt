<?php
/* @var $model Ordenes */
?>
<link href="<?php echo Yii::app()->baseUrl ?>/css/pdf.css" type="text/css" rel="stylesheet">
<div class="pdf">
    <div class="nro_ordentop" style="padding-left: 420px; padding-top:-28px;font-size: 20px;"><?php echo $model->nro_orden ?></div>
    <div class="clientCopy">
        <div class="header">        	
            <!--NADA-->
        </div>

        <div class="password"><?php echo $model->idCliente->password ?></div>
        <div class="dateIngreso"><?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime($model->fecha_ingreso,'medium',null));?></div>
        <div class="equipo"><?php echo $model->idEquipo->tipo ?></div>
        <div class="marca"><?php echo $model->idEquipo->marca ?></div>
        <div class="modelo"><?php echo $model->idEquipo->modelo ?></div>
        <div class="nroSerie"><?php echo $model->nro_serie; if ($model->imei <> '') echo ' IMEI:' . $model->imei ?></div>
        <div class="falla"><?php echo $model->falla ?></div>

        <div class="footer">
            <!--NADA-->
        </div>
    </div>
    <div class="ticket">
        <div class="leftSide">
            <div class="nro_orden" style="padding-left: 25mm;font-size: 20px;"><?php echo '                       ' . $model->nro_orden ?></div>
            <div class="lastname" style="padding-top: 4mm;"><?php echo $model->idCliente->apellido ?></div>
            <div class="firstname"><?php echo $model->idCliente->nombre ?></div>
            <div class="equipo"><?php echo $model->idEquipo->tipo ?></div>
            <div class="marca"><?php echo $model->idEquipo->marca ?></div>
            <div class="modelo"><?php echo $model->idEquipo->modelo ?></div>
            <div class="nroSerie"><?php echo $model->nro_serie?></div>
        </div>

        <div class="rightSide">
            <div class="dateIngreso"><?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime($model->fecha_ingreso,'medium',null));?></div>
            <div class="address"><?php echo $model->idCliente->direccion ?></div>
            <div class="tel"><?php echo $model->idCliente->telefono ?></div>
            <div class="cel"><?php echo $model->idCliente->celular ?><br><br></div>
            <div class="imei"><?php if ($model->imei <> '') echo 'IMEI:' . $model->imei ?></div>
        </div>
        
        
        
    </div>
    
    
    <div class="nfalla"><?php echo $model->falla ?></div>
    
</div>