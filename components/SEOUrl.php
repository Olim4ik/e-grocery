<?php
namespace app\components;

use yii\base\BaseObject;
use yii\web\UrlRuleInterface;
use app\models\Category;

class SEOUrl extends BaseObject implements UrlRuleInterface
{
	public function createUrl($manager, $route, $params){
		if($route === 'category/view'){
			if (isset($params['id'])) {
				$category = Category::findOne($params['id']);
				if(isset($category)){
					return 'view/' . str_replace(" ", "-", $category->title);
				}
			}
		}
		return false;
	}

	/**
	 * @throws \yii\base\InvalidConfigException
	 */
	public function parseRequest($manager, $request){
		$pathInfo = $request->getPathInfo();
		$pathExplode = explode('/', $pathInfo);
		$actionName = $pathExplode[0];
		if ($actionName === 'view') {
			if(preg_match('%^(\w+)(?:/(\w+))$%', $pathInfo, $matches)){
				$title = str_replace("-", " ", $matches[2]);
				$category = Category::findOne(['title' => $title]);
				$params['id'] = $category->id;
				return [
					'category/view',
					$params
				];
			}
		}
		return false;
	}
}
?>