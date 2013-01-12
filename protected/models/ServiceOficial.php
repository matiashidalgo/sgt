<?php

/**
 * This is the model class for table "service_oficial".
 *
 * The followings are the available columns in table 'service_oficial':
 * @property integer $id
 * @property string $nombre
 * @property string $sitio_web
 * @property string $tipodeorden
 *
 * The followings are the available model relations:
 * @property OrdenesSo[] $ordenesSos
 */
class ServiceOficial extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ServiceOficial the static model class
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
		return 'service_oficial';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, sitio_web, tipodeorden', 'required'),
			array('nombre', 'length', 'max'=>50),
			array('sitio_web', 'length', 'max'=>100),
			array('tipodeorden', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, sitio_web, tipodeorden', 'safe', 'on'=>'search'),
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
			'ordenesSos' => array(self::HAS_MANY, 'OrdenesSo', 'id_serviceo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => Yii::t('general', 'nombre'),
			'sitio_web' => Yii::t('general', 'sitio_web'),
			'tipodeorden' => Yii::t('general', 'tipodeorden'),
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('sitio_web',$this->sitio_web,true);
		$criteria->compare('tipodeorden',$this->tipodeorden,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}