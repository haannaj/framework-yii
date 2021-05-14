<?php

namespace app\models;

use Yii;
use yii\base\Model;

class YatzyForm extends Model
{
    public $dice;

    public function rules()
    {
        return [
            [['dice'], 'required'],
        ];
    }

}



