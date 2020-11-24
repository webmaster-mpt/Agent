<?php
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile as WebUploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $photo;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['photo'], 'file'],
        ];
    }
}