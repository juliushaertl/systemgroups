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


namespace OCA\Systemgroups;


use OCP\Group\Backend\ABackend;
use OCP\Group\Backend\IHideFromCollaborationBackend;
use OCP\IUser;

class SystemGroupBackend extends ABackend implements IHideFromCollaborationBackend {


	public function inGroup($uid, $gid) {
		if ($gid === 'HIDDEN') {
			return true;
		}
		return false;
	}

	public function getUserGroups($uid) {
		return ['HIDDEN'];
	}

	public function getGroups($search = '', $limit = -1, $offset = 0) {
		return ['HIDDEN'];
	}

	public function groupExists($gid) {
		if ($gid === 'HIDDEN') {
			return true;
		}
		return false;
	}

	public function usersInGroup($gid, $search = '', $limit = -1, $offset = 0) {
		return array_map(function(IUser $user) {
			return $user->getUID();
		}, \OC::$server->getUserManager()->search($search, $limit, $offset));
	}

	public function hideGroup(string $groupId): bool {
		return true;
	}
}
