<?php

/**
 * This is the model class for table "material".
 *
 * The followings are the available columns in table 'material':
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property integer $author_id
 * @property integer $teacher_id
 * @property integer $subj_id
 * @property integer $type_id
 * @property integer $kind_id
 * @property string $term
 * @property string $year
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property File $file
 * @property Kind $kind
 * @property Teacher $teacher
 * @property Subject $subj
 * @property Type $type
 */
class Material extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Material the static model class
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
		return 'material';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author_id, teacher_id, subj_id, type_id, kind_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>300),
			array('term', 'length', 'max'=>2),
			array('year', 'length', 'max'=>4),
                    array('state', 'length', 'max'=>4),
			array('desc, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, desc, author_id, teacher_id, subj_id, type_id, kind_id, term, year, created, updated, state', 'safe', 'on'=>'search'),
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
			'file' => array(self::HAS_ONE, 'File', 'id'),
			'kind' => array(self::BELONGS_TO, 'Kind', 'kind_id'),
			'teacher' => array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
			'subj' => array(self::BELONGS_TO, 'Subject', 'subj_id'),
			'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'desc' => 'Desc',
			'author_id' => 'Author',
			'teacher_id' => 'Teacher',
			'subj_id' => 'Subj',
			'type_id' => 'Type',
			'kind_id' => 'Kind',
			'term' => 'Term',
			'year' => 'Year',
			'created' => 'Created',
			'updated' => 'Updated',
                    'state' => 'Статус',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('teacher_id',$this->teacher_id);
		$criteria->compare('subj_id',$this->subj_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('kind_id',$this->kind_id);
		$criteria->compare('term',$this->term,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
                $criteria->compare('state',$this->state,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function behaviors(){
	return array(
		'CTimestampBehavior' => array(
			'class' => 'zii.behaviors.CTimestampBehavior',
			'createAttribute' => 'created',
			'updateAttribute' => 'updated',
		)
	);
}
}