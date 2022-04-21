<?php

namespace app\models;

use yii\base\Model;

/**
 * Array (
		['cart'] => [
 *          2 => [
 *              'title' => 'TITLE',
 *              'price' => 10,
 *              'qty' => 2
 *          ],
 *      ],
 *      'cart.qty' => 2,
 *      'cart.sum' => 20,
 * )
 */

class Cart extends Model
{

	public function addToCart($product, $qty = 1): void
	{
		if (isset($_SESSION['cart'][$product->id])) {
			$_SESSION['cart'][$product->id]['qty'] += $qty;
		} else {
			$_SESSION['cart'][$product->id] = [
				'qty' => $qty,
				'title' => $product->title,
				'price' => $product->price,
				'img' => $product->img,
			];
		}
		$_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
		$_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
	}

}