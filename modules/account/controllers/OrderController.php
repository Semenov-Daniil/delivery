<?php

namespace app\modules\account\controllers;

use app\models\Order;
use app\models\Outpost;
use app\models\Status;
use app\models\TypePay;
use app\modules\account\models\OrderSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
            ]
        );
    }

    /**
     * Lists all Order models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($product_id)
    {
        $model = new Order(['scenario' => Order::SCENARIO_OUTPOST]);
        $model->product_id = $product_id;
        $model->user_id = Yii::$app->user->id;
        $model->status_id = Status::getStatusId('Новый');

        $typePay = TypePay::getTypePay();
        $outpost = Outpost::getOutpost();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                if ($model->check) {
                    $model->scenario = Order::SCENARIO_COMMENT;
                }

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'typePay' => $typePay,
            'outpost' => $outpost,
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate2($product_id)
    {
        $model = new Order();
        $model->product_id = $product_id;
        $model->user_id = Yii::$app->user->id;
        $model->status_id = Status::getStatusId('Новый');

        $typePay = TypePay::getTypePay();
        $outpost = Outpost::getOutpost();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->scenario = $model->check ? Order::SCENARIO_COMMENT : Order::SCENARIO_OUTPOST;

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }

                $model->scenario = Order::SCENARIO_DEFAULT;
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create2', [
            'model' => $model,
            'typePay' => $typePay,
            'outpost' => $outpost,
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate3($product_id)
    {
        $model = new Order();
        $model->product_id = $product_id;
        $model->user_id = Yii::$app->user->id;
        $model->status_id = Status::getStatusId('Новый');

        $typePay = TypePay::getTypePay();
        $outpost = Outpost::getOutpost();

        if ($this->request->isAjax) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create3', [
            'model' => $model,
            'typePay' => $typePay,
            'outpost' => $outpost,
        ]);
    }

    /**
     * Updates an existing Order model.
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
     * Deletes an existing Order model.
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
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
