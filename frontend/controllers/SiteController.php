<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\SignupForm;
use common\models\LoginForm;
use common\models\User;


/**
 * Site controller
 */
class SiteController extends Controller
{   
    public $layout = '@app/views/layouts/eshoper.php';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'index'],
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout',],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
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
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $signUp = new SignupForm();
        $login = new LoginForm();   
        
        //debug(Yii::$app->user->isGuest);
        if ($login->load(Yii::$app->request->post()) && $login->login()) {
            return $this->goHome();
        } else {
            $login->password = '';

            return $this->render('login', [
                'login' => $login,
                'signUp' => $signUp,
            ]);
        }
    }

    public function actionSignUp()
    {   
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $login = new LoginForm(); 
        $signUp = new SignupForm();

        if ($signUp->load(Yii::$app->request->post()) && $signUp->signup()) {
            return $this->goHome();
        } else {
            $signUp->password = '';
            $signUp->email = '';

            return $this->render('login', [
                'login' => $login,
                'signUp' => $signUp,
            ]);
        }
    }
    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
   
}
