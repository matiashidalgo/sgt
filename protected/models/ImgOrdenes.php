<?php

/**
 * This is the model class for table "img_ordenes".
 *
 * The followings are the available columns in table 'img_ordenes':
 * @property integer $id
 * @property integer $nro_orden
 * @property string $direccion_web
 * @property string $nombre
 *
 * The followings are the available model relations:
 * @property Ordenes $nroOrden
 */
class ImgOrdenes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ImgOrdenes the static model class
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
		return 'img_ordenes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nro_orden, direccion_web, nombre', 'required'),
			array('nro_orden', 'numerical', 'integerOnly'=>true),
			array('direccion_web', 'length', 'max'=>100),
			array('nombre', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nro_orden, direccion_web, nombre', 'safe', 'on'=>'search'),
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
			'direccion_web' => 'Direccion Web',
			'nombre' => 'Nombre',
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
		$criteria->compare('direccion_web',$this->direccion_web,true);
		$criteria->compare('nombre',$this->nombre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}