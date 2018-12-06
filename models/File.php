<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * @property string $file
 * @property string $filename
 * @property string $display_name
 * @property string $description
 *
 * @var string $filePath
 *
 * @property Task $task
 * @property User $user
 *
 * @mixin \yii\web\UploadedFile
 */
class File extends \yii\db\ActiveRecord
{
    public $file;
    public $filePath;

    const SCENARIO_FILE_CREATE = 'file_create';
    const SCENARIO_FILE_UPDATE = 'file_update';

    const RELATION_TASK = 'task';
    const RELATION_USER = 'user';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['filename', 'display_name'], 'string', 'max' => 300],
            [['file'], 'file', 'extensions' => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'xlsm', 'jpg', 'png', 'txt', 'zip', 'rar'], 'maxSize' => 2097152,
                'tooBig' => 'Максимальный размер файла 2 Мб.',
                'wrongExtension' => 'Файл, должен иметь формат: .pdf, .doc, .docx, .xls, .xlsx, .xlsm, .txt, .zip, .rar, .jpg, .png'
            ],
            [['task_id', 'user_id', 'filename'], 'required',
                'on' => [self::SCENARIO_FILE_CREATE, self::SCENARIO_FILE_UPDATE]],
            [['file'], 'required',
                'on' => [self::SCENARIO_FILE_CREATE]],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => 'Task ID',
            'user_id' => 'User ID',
            'file' => 'File',
            'filename' => 'Filename',
            'display_name' => 'Display Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return bool
     */
    public function setFields()
    {
        if ($this->file) {
            $this->filename = time() . '.' . $this->file->extension;

            if ($this->display_name == false) {
                $this->display_name = $this->file->baseName;
            }

            if ($this->validate()) {

                $filePath = Yii::$app->basePath . '/web/files/';
                if (!file_exists($filePath)) {
                    mkdir($filePath);
                }

                $filePath .=  $this->user_id;
                if (!file_exists($filePath)) {
                    mkdir($filePath);
                }

                $this->filePath = $filePath . '/' . $this->filename;

                return true;
            }
        } else {
            return false;
        }
    }

    /**
     * @param $filename
     * @return bool
     */
    public function uploadFile($filename) {

        if ($this->file->saveAs($filename)) {
            return true;
        } else {
            return false;
        }

    }
    /**
     * @return bool
     */
    public  function  deleteFile()
    {
        $filePath = Yii::$app->basePath . '/web/files/' . $this->user_id  . '/' . $this->filename;
        if (file_exists($filePath)) {
            unlink($filePath);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }



    /**
     * {@inheritdoc}
     * @return \app\models\query\FileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\FileQuery(get_called_class());
    }
}
