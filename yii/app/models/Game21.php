<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Dice;

class Game21 extends Model
{
    private string $rolls = "";
    private int $sum = 0;
    private int $totSum = 0;

    public function getDices($numberOfDices): string
    {
        $dice = new Dice();
        for ($i = 0; $i < intval($numberOfDices); $i++) {
            $this->rolls .= $dice->getLastRoll() . " ";
        }
        return $this->rolls;
    }

    public function sumDices($dices): string
    {
        
        for ($i = 0; $i < strlen($dices); $i++) {
            $this->sum += intval($dices[$i]);
            $i += 1;
        }
        return $this->sum;
    }

    public function totSum($sum, $totsum, $stop): string
    {
        
        if ($stop == "stop") :
            return $totsum;
        else :
            return intval($totsum) + intval($sum);
        endif;

    }

    public function getGameOver21Message(int $totSum, $stop): string
    {
        if ($totSum > 21 || $stop == "stop") :
            return "Game Over";
        elseif ($totSum == 21) :
            return "Congratulations, you got 21!";
        else :
            return"";
        endif;
    }

    public function rollComputer(): int
    {
        $ComputerRoll = rand(21, 27);
        return $ComputerRoll;
    }

    public function pointsGame($message, $CP, $PP): string
    {
        if ($message !== "") :
            $CP = intval($CP) - 21;

            if (intval($PP) > 21) :
                $PP = intval($PP) - 21;
            else :
                $PP = 21 - intval($PP);
            endif; 

            if ($CP == $PP || $CP < $PP) :
                return "Computer Won!";
            endif;
            return "Player won!";
        endif;
        return "";
    }

    public function pointsRound($winner, $PP, $CP): array
    {
        if ($winner == "Player won!") :
            $PP = $PP + 1;
            return [$PP, $CP];
        elseif ($winner == "Computer Won!") : 
            $CP = $CP + 1;
            return [$PP, $CP];
        endif;
        return [$PP, $CP];
    }

    public function highscore($points, $CP, $PP): void
    {
        if ($points == "Player won!") 
            Yii::$app->db->createCommand()->insert('highscore', [
                'name' => 'Player',
                'score' => $PP,
                'game' => 'Game 21',
                'closest' => abs($PP - 21)
            ])->execute();
        elseif ($points == "Computer Won!")
            Yii::$app->db->createCommand()->insert('highscore', [
                'name' => 'Computer',
                'score' => $CP,
                'game' => 'Game 21',
                'closest' => abs($CP - 21)
            ])->execute();
    }
}

