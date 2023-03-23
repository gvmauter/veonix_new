<?php

namespace Yandex\Metrika;

use Bitrix\Main\Engine\Controller;


class Ajax extends Controller
{
	public function getEcommerceActionsAction()
	{
		$response = [];

		$actions = Ecommerce::getDBActions();

		$response['actions'] = $actions; //\Bitrix\Main\Web\Json::encode($actions);

		return $response;
	}

	public function removeEcommerceActionsAction()
	{
		$actionsIds = $_POST['actionsIds'];

		if (is_array($actionsIds)) {
			Ecommerce::clearDBActions($actionsIds);
			return true;
		}

		return false;
	}

	public function configureActions()
	{
		return [
			'getEcommerceActions' => [
				'-prefilters' => [
					\Bitrix\Main\Engine\ActionFilter\Authentication::class,
				],
			],
			'removeEcommerceActions' => [
				'-prefilters' => [
					\Bitrix\Main\Engine\ActionFilter\Authentication::class,
				],
			]
		];
	}
}