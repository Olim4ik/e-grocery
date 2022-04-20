<?php

namespace app\controllers;

use app\models\Product;
use yii\web\NotFoundHttpException;

class ProductController extends AppController
{

	/**
	 * @throws NotFoundHttpException
	 */
	public function actionView($id)
	{
		$product = Product::findOne($id);
		if ($product === null) {
			throw new NotFoundHttpException('Такого товара нет');
		}
		$this->setMeta("{$product->title} :: " . \Yii::$app->name, $product->keywords, $product->description);

		return $this->render('view', compact('product'));
	}

}