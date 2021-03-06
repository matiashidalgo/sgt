<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property integer $id
 * @property string $cuenta
 * @property integer $admin
 * @property string $password
 * @property string $nombre
 * @property string $apellido
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $ciudad
 * @property string $email
 * @property string $observaciones
 *
 * The followings are the available model relations:
 * @property Ordenes[] $ordenes
 */
class Clientes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Clientes the static model class
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
		return 'clientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password', 'required'),
			array('admin', 'numerical', 'integerOnly'=>true),
			array('cuenta, password', 'length', 'max'=>16),
			array('nombre, apellido', 'length', 'max'=>30),
			array('direccion', 'length', 'max'=>40),
			array('telefono', 'length', 'max'=>13),
			array('celular', 'length', 'max'=>20),
			array('ciudad', 'length', 'max'=>20),
			array('email', 'length', 'max'=>50),
			array('observaciones', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cuenta, admin, password, nombre, apellido, direccion, telefono, celular, ciudad, email, observaciones', 'safe', 'on'=>'search'),
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
			'ordenes' => array(self::HAS_MANY, 'Ordenes', 'id_cliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cuenta' => Yii::t('general', 'cuenta'),
			'admin' => Yii::t('general', 'cliadmin'),
			'password' => Yii::t('general', 'password'),
			'nombre' => Yii::t('general', 'nombre'),
			'apellido' => Yii::t('general', 'apellido'),
			'direccion' => Yii::t('general', 'direccion'),
			'telefono' => Yii::t('general', 'telefono'),
			'celular' => Yii::t('general', 'celular'),
			'ciudad' => Yii::t('general', 'ciudad'),
			'email' => Yii::t('general', 'email'),
			'observaciones' => Yii::t('general', 'observaciones'),
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
		$criteria->compare('cuenta',$this->cuenta,true);
		$criteria->compare('admin',$this->admin);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('observaciones',$this->observaciones,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getAllConcat()
	{
		return $this->id . "- " . $this->nombre . " - " . $this->apellido . " - " . $this->direccion . " - " . $this->telefono . " - " . $this->celular;
	}
}