<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;    
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $post
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property integer $isDeleted
 */
class Posts extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'post'], 'required'],
            [['post'], 'string'],
            [['created_at', 'updated_at', 'isDeleted', 'status'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'post' => 'Post',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'isDeleted' => 'Is Deleted',
        ];
    }

    /**
     * Add Timestamp for model
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            // Можно добавить поведение для мягкого удаления
        ];
    }
}
