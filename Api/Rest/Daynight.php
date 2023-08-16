<?php

namespace FreePBX\modules\Daynight\Api\Rest;

use FreePBX\modules\Api\Rest\Base;

class Daynight extends Base
{
	protected $module = 'daynight';
	public function setupRoutes($app)
	{

		/**
		 * @verb GET
		 * @returns - a list of daynight settings
		 * @uri /daynight
		 */
		$app->get('/', function ($request, $response, $args) {
			\FreePBX::Modules()->loadFunctionsInc('daynight');
			return $response->withJson(daynight_list());
		})->add($this->checkAllReadScopeMiddleware());

		/**
		 * @verb GET
		 * @returns - daynight state
		 * @uri /daynight/:id
		 */
		$app->get('/{id}', function ($request, $response, $args) {
			\FreePBX::Modules()->loadFunctionsInc('daynight');

			$dn = new \dayNightObject($args['id']);

			if ($dn) {
				$daynight          = [];
				$daynight['state'] = $dn->getState();
			}

			$daynight = $daynight ?: false;

			return $response->withJson($daynight);
		})->add($this->checkAllReadScopeMiddleware());

		/**
		 * @verb PUT
		 * @uri /daynight/:id
		 */
		$app->put('/{id}', function ($request, $response, $args) {
			\FreePBX::Modules()->loadFunctionsInc('daynight');
			$params = $request->getParsedBody();
			$dn     = new \dayNightObject($args['id']);

			if ($dn) {
				$dn->setState($params['state']);

				return $response->withJson(true);
			}

			return $response->withJson(false);
		})->add($this->checkAllWriteScopeMiddleware());
	}
}
