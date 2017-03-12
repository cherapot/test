<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use app\models\Posts;

class SiteController extends Controller
{
    /**
     * Controller implements the CRUD actions for app\models\Posts model
     */
    public function behaviors()
    {
        return [            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }   

    /**
     * Displays 5 posts from app\models\Posts
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Posts::find()->where(['status' => '1', 'isDeleted' => 0]);

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $model = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->orderBy([
                'id' => SORT_DESC,
            ])
            ->all();

        return $this->render('index', [
            'model' => $model,
            'pagination' => $pagination,
        ]);
    }

    /**
     * If post is exists, the browser will be displayed this post from app\models\Posts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = Posts::findOne($id);

        if ($model) {
            return $this->render('view', [
                'model' => $model,
            ]);
        } else {
            throw new NotFoundHttpException('This post does not exist.');
        }        
    }

    /**
     * Creates a new app\models\Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * If creation is not successful, the browser will be rendered the 'create' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Posts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates one post from app\models\Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * If creation is not successful, the browser will be rendered the 'update' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Posts::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing app\models\Posts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Posts::findOne($id)->delete();

        return $this->redirect(['index']);
    }
}
