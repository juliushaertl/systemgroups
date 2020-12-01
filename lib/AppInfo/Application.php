<?php
/*
 * @copyright Copyright (c) 2020 Julius Härtl <jus@bitgrid.net>
 *
 * @author Julius Härtl <jus@bitgrid.net>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */

declare(strict_types=1);


namespace OCA\Systemgroups\AppInfo;


use OC\Group\Manager;
use OCA\Systemgroups\SystemGroupBackend;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\IGroupManager;

class Application extends \OCP\AppFramework\App implements IBootstrap {

	public function __construct(array $urlParams = []) {
		parent::__construct('systemgroups', $urlParams);
	}

	public function register(IRegistrationContext $context): void {
		\OC::$server->getGroupManager()->addBackend(\OC::$server->get(SystemGroupBackend::class));
	}

	public function boot(IBootContext $context): void {
		$context->injectFn(function (Manager $groupManager, SystemGroupBackend $systemGroupBackend) {
		});
	}
}
