<?php

namespace app\modules\admin\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class AppAdminController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors(): array
	{
		return [
			'access' => [
				'class' => AccessControl::class,
//				'only' => ['/auth/logout'],
				'rules' => [
					[
						'actions' => ['login'],
						'allow' => true,
						'roles' => ['?'],
					],
					[
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
//			'verbs' => [
//				'class' => VerbFilter::class,
//				'actions' => [
//					'logout' => ['post'],
//				],
//			],
		];
	}
}
