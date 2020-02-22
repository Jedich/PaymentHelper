<?php

namespace app\controllers;

use app\calculations\Calculations;
use app\models\Payments;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\models\GroupMembers;
use app\models\GroupsInfo;

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
    public function actionIndex($id = 1)
    {
    	$groups=[];
        //$groupsId = GroupMembers::find()->where(["user_id" => $id])->all();
        $groupsAll = GroupsInfo::find()->all();
        foreach($groupsAll as $group)
		{
			$groups[$group->attributes['group_id']] = $group->attributes['group_name'];

		}
            print_r($groups);
        return $this->render('index', ["groups" => $groups]);
    }
	public function actionCalculate($group_id) {
		$membersFull = GroupMembers::find()->where(["group_id" => $group_id])->all();
		$paymentsFull = Payments::find()->where(["group_id" => $group_id])->all();
		$payments = [];
		$members= [];
		foreach ($paymentsFull as $payment)
			array_push($payments, [$payment['user_id'], $payment['cash']]);
		foreach($membersFull as $member)
			array_push($members, $member['user_id']);
		$calculation = new Calculations();
		$debt = $calculation->Calculations($payments, $members);
		print_r($debt);
		return $this->render('index', [
			'debt' => $debt,
		]);
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
    public function actionHistory()
    {
        return $this->render('history');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionDebt()
    {
        return $this->render('debt');
    }

    public function actionInfo($groupId)
    {
        $groupInfo = $this->actionCalculate($groupId);
        $this->render('index', ['groupInfo' => $groupInfo]);
    }
}
