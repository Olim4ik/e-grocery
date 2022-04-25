<?php

namespace app\modules\admin\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property float $total
 * @property int $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property-read ActiveQuery $orderProduct
 * @property string|null $note
 */
class Order extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'orders';
    }

	public function getOrderProduct(): ActiveQuery
	{
		return $this->hasMany(OrderProduct::class, ['order_id' => 'id']); # order_id (OrderProduct) = id (Order)

		# 1 order - n order_products
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
				'value' => new Expression('NOW()'),
			]
		];
	}

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['created_at', 'updated_at', 'qty', 'name', 'email', 'phone', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty', 'status'], 'integer'],
            [['total'], 'number'],
            [['note'], 'string'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'created_at' => 'Добавленно',
            'updated_at' => 'Обновленно',
            'qty' => 'Кол-во',
            'total' => 'сумма',
            'status' => 'Статус',
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'note' => 'Примечание',
        ];
    }
}
