<?php

namespace app\modules\admin;

use yii\filters\AccessControl;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

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
