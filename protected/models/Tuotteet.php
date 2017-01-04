<?php

/**
 * This is the model class for table "tuotteet".
 *
 * The followings are the available columns in table 'tuotteet':
 * @property integer $id
 * @property string $time
 * @property string $nimi
 * @property string $merkki
 * @property string $malli
 * @property string $url_osoite
 * @property integer $hinta
 * @property string $vari
 * @property string $valon_maara
 * @property string $teho
 * @property string $jannite
 * @property string $lampun_koko
 * @property string $avauskulma
 * @property string $himmennettava
 * @property string $lisatiedot
 * @property string $icon_tiedoston_nimi
 */
class Tuotteet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tuotteet the static model class
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
		return 'tuotteet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nimi, url_osoite, hinta, icon_tiedoston_nimi', 'required'),
			array('hinta', 'numerical', 'integerOnly'=>true),
			array('nimi, merkki, malli, vari, valon_maara, teho, jannite, lampun_koko, avauskulma, himmennettava, icon_tiedoston_nimi', 'length', 'max'=>255),
			array('url_osoite', 'length', 'max'=>500),
			array('time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, time, nimi, merkki, malli, url_osoite, hinta, vari, valon_maara, teho, jannite, lampun_koko, avauskulma, himmennettava, lisatiedot, icon_tiedoston_nimi', 'safe', 'on'=>'search'),
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
			'time' => 'Time',
			'nimi' => 'Nimi',
			'merkki' => 'Merkki',
			'malli' => 'Malli',
			'url_osoite' => 'Url-osoite',
			'hinta' => 'Hinta €',
			'vari' => 'Vari',
			'valon_maara' => 'Valon Maara',
			'teho' => 'Teho',
			'jannite' => 'Jannite',
			'lampun_koko' => 'Lampun Koko',
			'avauskulma' => 'Avauskulma',
			'himmennettava' => 'Himmennettava',
			'lisatiedot' => 'Lisatiedot',
			'icon_tiedoston_nimi' => 'Ikoni tiedosto',
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
		$criteria->compare('time',$this->time,true);
		$criteria->compare('nimi',$this->nimi,true);
		$criteria->compare('merkki',$this->merkki,true);
		$criteria->compare('malli',$this->malli,true);
		$criteria->compare('url_osoite',$this->url_osoite,true);
		$criteria->compare('hinta',$this->hinta);
		$criteria->compare('vari',$this->vari,true);
		$criteria->compare('valon_maara',$this->valon_maara,true);
		$criteria->compare('teho',$this->teho,true);
		$criteria->compare('jannite',$this->jannite,true);
		$criteria->compare('lampun_koko',$this->lampun_koko,true);
		$criteria->compare('avauskulma',$this->avauskulma,true);
		$criteria->compare('himmennettava',$this->himmennettava,true);
		$criteria->compare('lisatiedot',$this->lisatiedot,true);
		$criteria->compare('icon_tiedoston_nimi',$this->icon_tiedoston_nimi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
