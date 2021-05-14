<?php

namespace app\models;

use Yii;
use yii\base\Model;

class GameForm extends Model
{
    public $dice;
    public $stop;
    public $summa;
    public $CP;
    public $PP;

    public function rules()
    {
        return [
            [['dice', 'summa', 'stop', 'PP', 'CP'], 'required'],
        ];
    }

}



