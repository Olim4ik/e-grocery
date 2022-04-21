<?php

namespace app\models;

use yii\db\ActiveRecord;

class OrderProduct extends ActiveRecord
{
	public static function tableName(): string
	{
		return 'order_product';
	}

	public function rules(): array
	{
		return [
			[['order_id', 'product_id', 'title', 'price', 'qty', 'total'], 'required'],
			[['order_id', 'product_id', 'qty'], 'integer'],
			[['price', 'total'], 'number'],
			[['title'], 'string', 'max' => 255],
//			[['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
//			[['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
		];
	}
}