<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\GameForm;
use app\models\YatzyForm;
use app\models\Game21;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        var_dump($model);
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionYatzy()
    {
        $model = new YatzyForm();
        
        if ($model->load(Yii::$app->request->post())) {

            return $this->render('yatzy', ['model' => $model]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('yatzy', ['model' => $model]);
        }
    }

    /**
     * Displays game page.
     *
     * @return string
     */

    public function actionGame()
    {
        $model = new GameForm();
        $dice = new Game21();
        $computer = new Game21();
        
        if ($model->load(Yii::$app->request->post())) {
            $dices = $dice->getDices($model->dice);
            $sum = $dice->sumDices($dices);
            $totalSum = $dice->totSum($sum, $model->summa, $model->stop);
            $computerPoint = $computer->rollComputer($model->dice);
            $gameOverMessage = $dice->getGameOver21Message($totalSum, $model->stop);
            $points = $dice->pointsGame($gameOverMessage, $computerPoint, $totalSum);
            $countPoints = $dice->pointsRound($points, $model->PP, $model->CP);
            
            $dice->highscore($points, $computerPoint, $totalSum);

            return $this->render('game', ['model' => $model, 
            'message' => $dices,
            'sumDices' => $sum,
            'totalDices' => $totalSum,
            'gameOverMessage' => $gameOverMessage,
            'computer' => $computerPoint,
            'pointsMessage' => $points,
            'computerPoint' => $countPoints[1],
            'playerPoint' => $countPoints[0]]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('game', ['model' => $model]);
        }
    }   
    
}
