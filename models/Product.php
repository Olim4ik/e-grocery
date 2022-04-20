<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

	public static function tableName()
	{
		return 'product';
	}

	public function getCategory(): ActiveQuery
	{
		return $this->hasOne(Category::class, ['id' => 'category_id']);
	}

}