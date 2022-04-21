<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Product;
use Yii;
use yii\web\Response;

class CartController extends AppController
{

	public function actionChangeCart()
	{
		$id = \Yii::$app->request->get('id');
		$qty = \Yii::$app->request->get('qty');
		$product = Product::findOne($id);
		if($product === null){
			return false;
		}
		$session = \Yii::$app->session;
		$session->open();
		$cart = new Cart();
		$cart->addToCart($product, $qty);
		return $this->renderPartial('cart-modal', compact('session'));
	}

	public function actionAdd($id)
	{
		$product = Product::findOne($id);
		if ($product === null) {
			return false;
		}
		$session = Yii::$app->session;
		$session->open();
		$cart = new Cart();
		$cart->addToCart($product);
		if (Yii::$app->request->isAjax) {
			return $this->renderPartial('cart-modal', compact('session'));
		}
		return $this->redirect([Yii::$app->request->referrer]);
	}

	public function actionShow(): string
	{
		$session = Yii::$app->session;
		$session->open();
		return $this->renderPartial('cart-modal', compact('session'));

	}

	public function actionDelItem()
	{
		$id = Yii::$app->request->get('id');

		$session = Yii::$app->session;
		$session->open();
		$cart = new Cart();
		$cart->recalc($id);

		if (Yii::$app->request->isAjax) {
			return $this->renderPartial('cart-modal', compact('session'));
		}

		return $this->redirect(Yii::$app->request->referrer);
	}

	public function actionClear(): string
	{
		$session = Yii::$app->session;
		$session->open();
		$session->remove('cart');
		$session->remove('cart.qty');
		$session->remove('cart.sum');
		return $this->renderPartial('cart-modal', compact('session'));
//		$this->layout = false;
//		return $this->render('cart-modal', compact('session'));
	}

	public function actionCheckout(): string
	{
		$this->setMeta('Оформление заказа :: ' . Yii::$app->name);

		$session = Yii::$app->session;

		return $this->render('checkout', compact('session'));
	}

}