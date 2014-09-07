<?php
/* @var $this NoticiasController */
/* @var $data Noticias */
?>



<div class="noticia" style="display:none;">
	<div class="fecha">
		<?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime($data->fecha,'medium',null)); ?>
	</div>
	<div class="texto">
		<?php echo CHtml::encode($data->noticia); ?>
	</div>
</div>