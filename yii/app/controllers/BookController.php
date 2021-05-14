<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Book;

class BookController extends Controller
{
    public function actionIndex()
    {
        $query = Book::find();
        $countries = $query->orderBy('title')
            ->all();

        return $this->render('index', [
            'countries' => $countries
        ]);
    }
}