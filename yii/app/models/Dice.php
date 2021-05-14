<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Dice is the model behind dice.
 */
class Dice extends Model
{
    // const FACES = 6;
    private ?int $roll = null;
    private string $rolls = "";

    public function roll(): int
    {
        $this->roll = rand(1, 6);
        return $this->roll;
    }

    public function getLastRoll(): int
    {
        return $this->roll();
    }
}



