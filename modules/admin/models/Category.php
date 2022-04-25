<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 * @property string|null $description
 * @property string|null $keywords
 * @property-read ActiveQuery $category
 * @property string|null $img
 */
class Category extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName(): string
	{
		return 'category';
	}

	public function getCategory(): ActiveQuery
	{
		return $this->hasOne(Category::class, ['id' => 'parent_id']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['parent_id'], 'integer'],
			[['title'], 'required'],
			[['title', 'description', 'keywords'], 'string', 'max' => 255],
			[['img'], 'string', 'max' => 155],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels(): array
	{
		return [
			'id' => 'ID',
			'parent_id' => 'Родительская категория',
			'title' => 'Наименование',
			'description' => 'Описание',
			'keywords' => 'Ключевые слова',
			'img' => 'Изображение',
		];
	}
}
