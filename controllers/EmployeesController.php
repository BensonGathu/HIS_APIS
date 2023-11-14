<?php

namespace app\controllers;

use yii\rest\ActiveController;

class EmployeesController extends ActiveController
{
    public $modelClass = 'app\models\Employees'; 



    public function behaviors()
{
    return [
        'corsFilter' => [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                'Origin' => ['*'], 
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
            ],
        ],
    ];
}
  

    public function actions()
    {
        $actions = parent::actions();

        
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        $query = \app\models\EmployeeS::find();

        return new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
    }
}

