<?php

namespace app\controllers;

use Yii;
use app\models\Asistencia;
use app\models\AsistenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AsistenciaController implements the CRUD actions for Asistencia model.
 */
class AsistenciaController extends Controller
{
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
     * Lists all Asistencia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AsistenciaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Asistencia model.
     * @param integer $id_asistencia
     * @param string $rut_parvulo
     * @return mixed
     */
    public function actionView($id_asistencia, $rut_parvulo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_asistencia, $rut_parvulo),
        ]);
    }

    /**
     * Creates a new Asistencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Asistencia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_asistencia' => $model->id_asistencia, 'rut_parvulo' => $model->rut_parvulo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Asistencia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_asistencia
     * @param string $rut_parvulo
     * @return mixed
     */
    public function actionUpdate($id_asistencia, $rut_parvulo)
    {
        $model = $this->findModel($id_asistencia, $rut_parvulo);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_asistencia' => $model->id_asistencia, 'rut_parvulo' => $model->rut_parvulo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Asistencia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_asistencia
     * @param string $rut_parvulo
     * @return mixed
     */
    public function actionDelete($id_asistencia, $rut_parvulo)
    {
        $this->findModel($id_asistencia, $rut_parvulo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Asistencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_asistencia
     * @param string $rut_parvulo
     * @return Asistencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_asistencia, $rut_parvulo)
    {
        if (($model = Asistencia::findOne(['id_asistencia' => $id_asistencia, 'rut_parvulo' => $rut_parvulo])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
