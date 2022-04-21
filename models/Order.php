<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Order extends ActiveRecord
{
	public static function tableName(): string
	{
		return 'orders';
	}

	public function behaviors(): array
	{
		return [
			[
				'class' => TimestampBehavior::class,
				'attributes' => [
				ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
				ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
				],
				// если вместо метки времени UNIX используется datetime:
				'value' => new Expression('NOW()'),
			],
		];
	}

	public function rules(): array
	{
		return [
			[['name', 'email', 'phone', 'address'], 'required'],
			[['name'], 'string'],
			[['email'], 'email'],
			[['created_at', 'updated_at'], 'safe'],
			['qty' => 'integer'],
			['total' => 'number'],
			['status' => 'boolean'],
		];
	}

	public function attributeLabels(): array
	{
		return [
			'name' => 'Имя',
			'email' => 'E-mail',
			'phone' => 'Телефон',
			'address' => 'Адрес',
			'note' => 'Примечание',
			'qty' => 'Количество',
			'total' => 'Сумма',
			'status' => 'Статус',
			'created_at' => 'Создан',
			'updated_at' => 'Обновлен',
		];
	}


}