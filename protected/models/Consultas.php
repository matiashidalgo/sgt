<?php

/**
 * This is the model class for table "consultas".
 *
 * The followings are the available columns in table 'consultas':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $email
 * @property string $consulta
 */
class Consultas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Consultas the static model class
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
		return 'consultas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('consulta', 'required'),
			array('nombre, apellido', 'length', 'max'=>30),
			array('telefono', 'length', 'max'=>14),
			array('email', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, apellido, telefono, email, consulta', 'safe', 'on'=>'search'),
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
			'apellido' => Yii::t('general', 'apellido'),
			'telefono' => Yii::t('general', 'telefono'),
			'email' => Yii::t('general', 'email'),
			'consulta' => Yii::t('general', 'consulta'),
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
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('consulta',$this->consulta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}