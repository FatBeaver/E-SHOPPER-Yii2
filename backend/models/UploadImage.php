<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadImage extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload($oldImage, $partPath)
    {
        if ($this->validate()) {

            $fileName = $this->imageFile->baseName . time() . 
            '.' . $this->imageFile->extension;
            $path = "/web/images/$partPath/" . $fileName;

            $this->imageFile->saveAs(Yii::getAlias('@frontend') . $path);
            $this->unlinkImage($oldImage, $partPath);
            return $fileName;
        } else {
            return false;
        }
    }

    protected function unlinkImage($oldImage, $partPath)
    {
        @unlink(Yii::getAlias('@frontend') . "/web/images/$partPath/" . $oldImage);
    }
}