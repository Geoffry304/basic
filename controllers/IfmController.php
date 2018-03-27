<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class IfmController extends Controller
{
    /**
     * @inheritdoc
     */
    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'only' => ['logout'],
    //             'rules' => [
    //                 [
    //                     'actions' => ['logout'],
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'logout' => ['post'],
    //             ],
    //         ],
    //     ];
    // }

    /**
     * @inheritdoc
     */
    /*public function actions()
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
    }*/

    public function beforeAction($action)
    {
        if ($action->id == "wrapper" || $action->id == "apiwrapper") {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionWrapper()
    {
        $this->layout = false;
        $path = $_REQUEST['path'];
        return $this->render('wrapper', ['path' => $path]);

    }

    public function actionApiwrapper()
    {
        $alias = Yii::getAlias("@webroot");
        $path = $_REQUEST['path'];
        require_once "$alias\libifm.php";
        $config = [
            "root_dir" => "uploads" . "/" . $path,
        ];
        $IFM = new \IFM($config); // $config is an array with your options
        $IFM->run("api");

    }
}
