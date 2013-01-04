<?php

/**
 * This is the model class for table "ordenes_so".
 *
 * The followings are the available columns in table 'ordenes_so':
 * @property integer $id
 * @property integer $nro_orden
 * @property integer $id_serviceo
 * @property string $nro_orden_so
 * @property string $fecha_ingreso
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Ordenes $nroOrden
 * @property ServiceOficial $idServiceo
 */
class OrdenesSo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrdenesSo the static model class
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
		return 'ordenes_so';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nro_orden, id_serviceo, nro_orden_so, fecha_ingreso, estado', 'required'),
			array('nro_orden, id_serviceo', 'numerical', 'integerOnly'=>true),
			array('nro_orden_so', 'length', 'max'=>50),
			array('estado', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nro_orden, id_serviceo, nro_orden_so, fecha_ingreso, estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'nroOrden' => array(self::BELONGS_TO, 'Ordenes', 'nro_orden'),
			'idServiceo' => array(self::BELONGS_TO, 'ServiceOficial', 'id_serviceo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nro_orden' => 'Nro Orden',
			'id_serviceo' => 'Id Serviceo',
			'nro_orden_so' => 'Nro Orden So',
			'fecha_ingreso' => 'Fecha Ingreso',
			'estado' => 'Estado',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nro_orden',$this->nro_orden);
		$criteria->compare('id_serviceo',$this->id_serviceo);
		$criteria->compare('nro_orden_so',$this->nro_orden_so,true);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}