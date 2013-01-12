<?php

/**
 * This is the model class for table "repuestos".
 *
 * The followings are the available columns in table 'repuestos':
 * @property integer $id
 * @property string $descripcion
 * @property string $tipo
 * @property string $marca
 * @property string $estado
 * @property string $observaciones
 * @property integer $cantidad
 * @property string $ubicacion
 *
 * The followings are the available model relations:
 * @property EquiposRepuestos[] $equiposRepuestoses
 */
class Repuestos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Repuestos the static model class
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
		return 'repuestos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion', 'required'),
			array('cantidad', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>50),
			array('tipo, marca', 'length', 'max'=>30),
			array('estado', 'length', 'max'=>40),
			array('ubicacion', 'length', 'max'=>100),
			array('observaciones', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, descripcion, tipo, marca, estado, observaciones, cantidad, ubicacion', 'safe', 'on'=>'search'),
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
			'equiposRepuestoses' => array(self::HAS_MANY, 'EquiposRepuestos', 'id_repuesto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'descripcion' => Yii::t('general', 'descripcion'),
			'tipo' => Yii::t('general', 'tipo'),
			'marca' => Yii::t('general', 'marca'),
			'estado' => Yii::t('general', 'estado'),
			'observaciones' => Yii::t('general', 'observaciones'),
			'cantidad' => Yii::t('general', 'cantidad'),
			'ubicacion' => Yii::t('general', 'ubicacion'),
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('marca',$this->marca,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('ubicacion',$this->ubicacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}