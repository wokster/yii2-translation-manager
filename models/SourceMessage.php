<?php

namespace wokster\translationmanager\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "source_message".
 *
 * @property integer $id
 * @property string $category
 * @property string $message
 *
 * @property Message[] $messages
 */
class SourceMessage extends \yii\db\ActiveRecord
{
    public $ru;
    public $en;
    public $fr;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'source_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message','ru','en','fr'], 'string'],
            [['category'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'category',
            'message' => 'key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['id' => 'id']);
    }

    public function getTranslations()
    {
        return ArrayHelper::map($this->messages,'language','translation');
    }

    public function getTranslation($lang){
        return (isset($this->translations[$lang]))?$this->translations[$lang]:null;
    }

    public function afterFind()
    {
        $arr = ['ru','en','fr'];
        foreach ($arr as $one){
            $this->$one = $this->getTranslation($one);
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            Message::deleteAll(['id'=>$this->id]);
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            $arr = ['ru','en','fr'];
            foreach ($arr as $one){
                $model = new Message();
                $model->id = $this->id;
                $model->language = $one;
                if(empty($this->$one)){
                    $model->translation = null;
                }else{
                    $model->translation = $this->$one;
                }
                $model->save();
            }
        }else{
            foreach ($this->messages as $one){
                $lang = $one->language;
                if(empty($this->$lang)){
                    $one->translation = null;
                }else{
                    $one->translation = $this->$lang;
                }
                $one->save();
            }
        }

        parent::afterSave($insert, $changedAttributes);
    }
}
