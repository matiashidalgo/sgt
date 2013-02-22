<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */
$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'ordenes') . ' - ' . Yii::t('general', 'details');

Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/consultarOrdenAdmin.css');

$this->breadcrumbs=array(
	Yii::t('general', 'ordenes')=>array('index'),
	Yii::t('general', 'orden').' número = '.$model->nro_orden,
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'ordenes'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'orden'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'edit').' '.Yii::t('general', 'orden'), 'url'=>array('update', 'id'=>$model->nro_orden)),
	array('label'=>Yii::t('general', 'delete').' '.Yii::t('general', 'orden'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nro_orden),'confirm'=>'Esta seguro de eliminar esta '.Yii::t('general', 'orden').'?')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'ordenes'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'details').' de la '.Yii::t('general', 'orden') . ' #' . $model->nro_orden); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nro_orden',
		'id_cliente',
		'id_equipo',
		'nro_serie',
		'adquirido_en',
		'nro_factura',
		'fecha_compra',
		'falla',
		'reparacion',
		'fecha_ingreso',
		'fecha_presupuesto',
		'fecha_reparado',
		'fecha_prometido',
		'fecha_entrega',
		'estado',
	),
)); ?>

<div class="ficha-orden">
	<div class="ordenDeReparacion">
		<div class="cabecera">
			<div class="taller">
				<div class="nombre-taller"><?php echo CHtml::encode(Yii::t('general', 'enterprise'));?></div>
				<div class="direccion">4 de Abril 107</div>
				<div class="tel-ubicacion">Tel. (0249)4428835 / 4521111 <br/> 7000 Tandil - Bs. As.</div>
			</div>
			<div class="documento">
				<div class="clase"> x </div>
				<div class="tipo-doc"> DOCUMENTO NO VALIDO COMO FACTURA </div>
			</div>
			<div class="orden">
				<div class="titulo-orden"> ORDEN DE REPARACION ORIGINAL </div>
				<div class="num-orden">Nº <?php echo CHtml::encode($model->nro_orden);?></div>
				<div class="fecha">Fecha <?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$model->fecha_ingreso,'medium',null));?></div>
			</div>
		</div>
		<div class="datos-cliente">
			<div class="nombre-cliente">Apellido y nombres: <?php echo CHtml::encode($model->idCliente->apellido) . " " . CHtml::encode($model->idCliente->nombre);?></div>
			<div class="domicilio-cliente">Domicilio: <?php echo CHtml::encode($model->idCliente->direccion);?></div>
			<div class="localidad-cliente">Localidad: <?php echo CHtml::encode($model->idCliente->ciudad);?></div>
			<div class="telefonos">Telefono: <?php echo CHtml::encode($model->idCliente->telefono) . " Celular: " . CHtml::encode($model->idCliente->celular);?></div>
			<div class="titulo">Cliente:</div>
		</div>
		<div class="datos-equipo">
			<div class="modelo-equipo">Modelo: <?php echo CHtml::encode($model->idEquipo->modelo);?></div>
			<div class="marca-equipo">Marca: <?php echo CHtml::encode($model->idEquipo->marca);?></div>
			<div class="nro-serie-equipo">Número de serie: <?php echo CHtml::encode($model->nro_serie);?></div>
			<div class="adquirido-equipo">Adquirido en: <?php echo CHtml::encode($model->adquirido_en);?></div>
			<div class="nro-factura-equipo">Nº de factura: <?php echo CHtml::encode($model->nro_factura);?></div>
			<div class="fecha-compra-equipo">Fecha de compra: <?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$model->fecha_compra,'medium',null));?></div>
			<div class="titulo">Equipo:</div>
		</div>
		<div class="detalle">
			<div class="falla">Defecto: <?php echo CHtml::encode($model->falla);?></div>
			<div class="reparacion">Reparacion: <?php echo CHtml::encode($model->reparacion);?></div>
			<div class="titulo">Defectos y reparaciones:</div>
		</div>
		<div class="acceso">
			<div class="texto">Usted puede obtener una copia de este documento y/o consultar el estado de su equipo accediendo al servicio de consultas de ordenes de reparación en nuestro sitio web:</div>
			<div class="sitio"><?php echo Yii::app()->request->scriptFile; ?></div>
			<div class="passport">para poder ingresar debe proporcionar el numero de la orden, en este caso "<span class="negrita"><?php echo CHtml::encode($model->nro_orden);?></span>", y su contraseña de acceso personal "<span class="negrita"><?php echo CHtml::encode($model->idCliente->password);?></span>"</div>
		</div>
		<div class="fechas">
			<div class="fecha-prometido">Fecha de prometido: <?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$model->fecha_prometido,'medium',null));?></div>
			<div class="fecha-reparado">Fecha de reparado: <?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$model->fecha_reparado,'medium',null));?></div>
			<div class="fecha-entregado">Fecha de entregado: <?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$model->fecha_entrega,'medium',null));?></div>
		</div>
	</div>
</div>
<?php
     $this->widget('ext.mPrint.mPrint', array(
          'title' => 'Orden de Reparacion ' . $model->nro_orden . ' ORIGINAL ',          //the title of the document. Defaults to the HTML title
          'tooltip' => 'Imprimir orden de reparacion',        //tooltip message of the print icon. Defaults to 'print'
          'text' => 'Imprimir',   //text which will appear beside the print icon. Defaults to NULL
          'element' => '.ficha-orden',        //the element to be printed.
          'exceptions' => array(       //the element/s which will be ignored
              
          ),
          'publishCss' => true,       //publish the CSS for the whole page?
          'visible' => true,  //should this be visible to the current user?
          'alt' => '-',       //text which will appear if image can't be loaded
          'debug' => false,            //enable the debugger to see what you will get
          'id' => 'print-div',         //id of the print link
		  'cssFile' => 'consultarOrdenAdmin.css',
	  ));
?>