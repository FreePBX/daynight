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
			$response->getBody()->write(json_encode(daynight_list()));
			return $response->withHeader('Content-Type', 'application/json');
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

			$daynight = $daynight ?? false;
			$response->getBody()->write(json_encode($daynight));
			return $response->withHeader('Content-Type', 'application/json');
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
				$response->getBody()->write(json_encode(true));
				return $response->withHeader('Content-Type', 'application/json');
			}

			$response->getBody()->write(json_encode(false));
			return $response->withHeader('Content-Type', 'application/json');
		})->add($this->checkAllWriteScopeMiddleware());
	}
}
