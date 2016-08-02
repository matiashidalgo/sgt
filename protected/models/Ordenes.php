<?php

/**
 * This is the model class for table "ordenes".
 *
 * The followings are the available columns in table 'ordenes':
 * @property integer $nro_orden
 * @property integer $id_cliente
 * @property integer $id_equipo
 * @property string $nro_serie
 * @property string $adquirido_en
 * @property string $nro_factura
 * @property string $fecha_compra
 * @property string $falla
 * @property string $reparacion
 * @property string $fecha_ingreso
 * @property string $fecha_presupuesto
 * @property string $fecha_reparado
 * @property string $fecha_prometido
 * @property string $fecha_entrega
 * @property string $estado
 * @property string $precio
 * @property string $gastos
 * @property integer $tecnico
 * @property string $imei
 *
 * The followings are the available model relations:
 * @property ImgOrdenes[] $imgOrdenes
 * @property Clientes $idCliente
 * @property Equipos $idEquipo
 * @property Clientes $idTecnico
 * @property OrdenesSo[] $ordenesSos
 */
class Ordenes extends CActiveRecord
{
	public $tipoequipo;
	public $modeloequipo;
	public $nombrecliente;
	public $nombretecnico;
	
	public function nombreapellido($posi,$nombreabuscar)
	{
		
		if (strlen($nombreabuscar))
		{
			$arreglo = explode(' ', $nombreabuscar);
			if (sizeof($arreglo) == 1)
				return $arreglo[0];
			else if (sizeof($arreglo) == 2)
			{
				return $arreglo[$posi];
			}
		}
		else 
			return '';
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ordenes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ordenes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nro_orden, id_cliente, id_equipo, falla, estado,tecnico', 'required'),
			array('nro_orden, id_cliente, id_equipo, imei', 'numerical', 'integerOnly'=>true),
			array('nro_serie, adquirido_en, nro_factura, estado', 'length', 'max'=>50),
			array('tecnico','usuarioexistente'),
			array('falla', 'length', 'max'=>255),
			array('precio, gastos', 'length', 'max'=>20),
			array('fecha_compra, fecha_ingreso, fecha_presupuesto, fecha_reparado, fecha_prometido, fecha_entrega, reparacion', 'safe'),
			array('fecha_compra, fecha_ingreso, fecha_presupuesto, fecha_reparado, fecha_prometido, fecha_entrega', 'default' ,'setOnEmpty'=>true, 'value' => null),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nro_orden, id_cliente,nombrecliente,modeloequipo, id_equipo, tipoequipo, modeloequipo,nro_serie, adquirido_en, nro_factura, fecha_compra, nombretecnico, falla, reparacion, fecha_ingreso, fecha_presupuesto, fecha_reparado, fecha_prometido, fecha_entrega, estado, precio', 'safe', 'on'=>'search'),
		);
	}

	public function usuarioexistente($attribute, $params)
	{
		$existe = Clientes::model()->exists('id = ' . explode('-',$this->tecnico)[0] . ' and admin > 0');

		if(!$existe)
			$this->addError($attribute, 'Tecnico inexistente.');
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'imgOrdenes' => array(self::HAS_MANY, 'ImgOrdenes', 'nro_orden'),
			'idCliente' => array(self::BELONGS_TO, 'Clientes', 'id_cliente'),
			'idEquipo' => array(self::BELONGS_TO, 'Equipos', 'id_equipo'),
			'ordenesSos' => array(self::HAS_MANY, 'OrdenesSo', 'nro_orden'),
			'equipos' => array(self::BELONGS_TO, 'Equipos','id_equipo'),
			'idTecnico' => array(self::BELONGS_TO, 'Clientes', 'tecnico')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nro_orden' => Yii::t('general', 'nro_orden'),
			'id_cliente' => Yii::t('general', 'cliente'),
			'id_equipo' => Yii::t('general', 'equipo'),
			'nro_serie' => Yii::t('general', 'nro_serie'),
			'adquirido_en' => Yii::t('general', 'adquirido_en'),
			'nro_factura' => Yii::t('general', 'nro_factura'),
			'fecha_compra' => Yii::t('general', 'fecha_compra'),
			'falla' => Yii::t('general', 'falla'),
			'reparacion' => Yii::t('general', 'reparacion'),
			'fecha_ingreso' => Yii::t('general', 'fecha_ingreso'),
			'fecha_presupuesto' => Yii::t('general', 'fecha_presupuesto'),
			'fecha_reparado' => Yii::t('general', 'fecha_reparado'),
			'fecha_prometido' => Yii::t('general', 'fecha_prometido'),
			'fecha_entrega' => Yii::t('general', 'fecha_entrega'),
			'estado' => Yii::t('general', 'estado'),
			'precio' => Yii::t('general', 'precio'),
			'gastos' => Yii::t('general', 'gastos'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->together = true;
		
		$criteria->with = array('idCliente','equipos','idTecnico');

		$criteria->compare('nro_orden',$this->nro_orden);
		$criteria->compare('id_cliente',$this->id_cliente);
		
		$criteria->compare('idCliente.apellido',self::nombreapellido(0,$this->nombrecliente),true);
		$criteria->compare('idCliente.apellido',self::nombreapellido(1,$this->nombrecliente),true,'OR');
		$criteria->compare('idCliente.nombre',self::nombreapellido(0,$this->nombrecliente),true,'OR');
		$criteria->compare('idCliente.nombre',self::nombreapellido(1,$this->nombrecliente),true,'OR');
		
		$criteria->compare('idTecnico.apellido',self::nombreapellido(0,$this->nombretecnico),true);
		$criteria->compare('idTecnico.apellido',self::nombreapellido(1,$this->nombretecnico),true,'OR');
		$criteria->compare('idTecnico.nombre',self::nombreapellido(0,$this->nombretecnico),true,'OR');
		$criteria->compare('idTecnico.nombre',self::nombreapellido(1,$this->nombretecnico),true,'OR');
		
		$criteria->compare('id_equipo',$this->id_equipo);
		$criteria->compare('equipos.tipo', $this->tipoequipo,true);
		$criteria->compare('equipos.modelo', $this->modeloequipo,true);
		$criteria->compare('nro_serie',$this->nro_serie,true);
		$criteria->compare('adquirido_en',$this->adquirido_en,true);
		$criteria->compare('nro_factura',$this->nro_factura,true);
		$criteria->compare('fecha_compra',$this->fecha_compra,true);
		$criteria->compare('falla',$this->falla,true);
		$criteria->compare('reparacion',$this->reparacion,true);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('fecha_presupuesto',$this->fecha_presupuesto,true);
		$criteria->compare('fecha_reparado',$this->fecha_reparado,true);
		$criteria->compare('fecha_prometido',$this->fecha_prometido,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('precio',$this->precio,true);
		$criteria->compare('gastos',$this->gastos,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}