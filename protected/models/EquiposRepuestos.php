<?php

/**
 * This is the model class for table "equipos_repuestos".
 *
 * The followings are the available columns in table 'equipos_repuestos':
 * @property integer $id
 * @property integer $id_equipo
 * @property integer $id_repuesto
 *
 * The followings are the available model relations:
 * @property Equipos $idEquipo
 * @property Repuestos $idRepuesto
 */
class EquiposRepuestos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EquiposRepuestos the static model class
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
		return 'equipos_repuestos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_equipo, id_repuesto', 'required'),
			array('id_equipo, id_repuesto', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_equipo, id_repuesto', 'safe', 'on'=>'search'),
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
			'idEquipo' => array(self::BELONGS_TO, 'Equipos', 'id_equipo'),
			'idRepuesto' => array(self::BELONGS_TO, 'Repuestos', 'id_repuesto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_equipo' => 'Id Equipo',
			'id_repuesto' => 'Id Repuesto',
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
		$criteria->compare('id_equipo',$this->id_equipo);
		$criteria->compare('id_repuesto',$this->id_repuesto);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}