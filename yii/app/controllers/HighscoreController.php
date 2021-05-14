<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Highscore;

class HighscoreController extends Controller
{
    public function actionIndex()
    {
        $query = Highscore::find();
        $highscores = $query->orderBy('closest')
            ->all();

        return $this->render('index', [
            'highscores' => $highscores
        ]);
    }
}