<?php
namespace Visay\FootballManager\Domain\Repository;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Visay Keo <keo@visay.info>, Visay.Info
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class MatchRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * Find upcoming match
	 *
	 * @return \Visay\FootballManager\Domain\Model\Match
	 */
	public function getNextMatch() {
		$query = $this->createQuery();
		$now = new \DateTime();
		return $query->matching(
				$query->greaterThanOrEqual('date', $now)
			)
			->setOrderings(array('date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING))
			->execute()
			->getFirst();
	}

}
?>