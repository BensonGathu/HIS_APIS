<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use yii\web\Response;

class UsersController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Users';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
       
        // Handle CORS
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
            ],
        ];

        // Ensure JSON response format
        $behaviors['contentNegotiator'] = [
            'class' => \yii\filters\ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        return $behaviors;
    }

    /**
     * Create a new user and generate an access token.
     *
     * @return array
     */
    public function actionCreate()
    {
        $model = new Users();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');

        if ($model->save()) {
        
            return [
                'user' => $model,
                
            ];
        } else {
            Yii::$app->response->statusCode = 400; 
            return [
                'errors' => $model->getErrors()
            ];
        }
    }

    /**
     * User login and return access token.
     *
     * @return array
     */
    public function actionLogin()
    {
        $model = new Users();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');

        $user = Users::findOne(['email' => $model->email]);
        if ($user && $user->validatePassword($model->password)) {
            return [
                'user' => $user,
                'status' => '200',
            ];
        } else {
            Yii::$app->response->statusCode = 401;


            return [
                'error' => 'Invalid email or password'
            ];
        }
    }
   
}