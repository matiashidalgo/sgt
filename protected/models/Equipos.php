<?php

/**
 * This is the model class for table "equipos".
 *
 * The followings are the available columns in table 'equipos':
 * @property integer $id
 * @property string $tipo
 * @property string $modelo
 * @property string $marca
 *
 * The followings are the available model relations:
 * @property EquiposRepuestos[] $equiposRepuestoses
 * @property Ordenes[] $ordenes
 */
class Equipos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Equipos the static model class
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
		return 'equipos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, modelo, marca', 'required'),
			array('tipo, modelo, marca', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tipo, modelo, marca', 'safe', 'on'=>'search'),
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
			'equiposRepuestoses' => array(self::HAS_MANY, 'EquiposRepuestos', 'id_equipo'),
			'ordenes' => array(self::HAS_MANY, 'Ordenes', 'id_equipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tipo' => Yii::t('general', 'tipo'),
			'modelo' => Yii::t('general', 'modelo'),
			'marca' => Yii::t('general', 'marca'),
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
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('modelo',$this->modelo,true);
		$criteria->compare('marca',$this->marca,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getAllConcat()
	{
		return $this->id . " - " . $this->tipo . " - " . $this->modelo . " - " . $this->marca;
	}
}