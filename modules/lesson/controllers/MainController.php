<?php

namespace app\modules\lesson\controllers;

use Yii;
use app\modules\lesson\models\Lesson;
use app\modules\lesson\models\LessonSearch;
use app\modules\lesson\models\Viewed;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii2mod\rbac\filters\AccessControl;

/**
 * MainController implements the CRUD actions for Lesson model.
 */
class MainController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::class,
                    'only' => [ 'delete', 'update', 'index', 'view'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['index' , 'view', 'delete', 'update'],
                            'roles' => ['admin'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['index' , 'view' ],
                            'roles' => ['student'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Lesson models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $class = Lesson::countViewed(Yii::$app->user->identity->id);
        $dataProvider = new ActiveDataProvider([
            'query' => Lesson::find()
                ->with('seen')
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'class' => $class,
        ]);
    }

    /**
     * Displays a single Lesson model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {   
        if($this->request->isAjax){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $viewed = new Viewed();
            $data = Yii::$app->request->post();
            $viewed->lid = $id;
            $viewed->uid = Yii::$app->user->identity->id;
            if($viewed->save()){
                return ['success' => true];
            }
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lesson model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Lesson();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Lesson model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Lesson model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lesson model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Lesson the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lesson::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app.lesson', 'The requested page does not exist.'));
    }
}
