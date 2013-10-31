<?php
namespace Visay\FootballManager\Domain\Model;

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
class Match extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * The date of the match
	 *
	 * @var \DateTime
	 * @validate NotEmpty
	 */
	protected $date;

	/**
	 * location
	 *
	 * @var \Visay\FootballManager\Domain\Model\Location
	 */
	protected $location;

	/**
	 * team
	 *
	 * @var \Visay\FootballManager\Domain\Model\Team
	 */
	protected $team;

	/**
	 * Returns the date
	 *
	 * @return \DateTime $date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * Sets the date
	 *
	 * @param \DateTime $date
	 * @return void
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * Returns the location
	 *
	 * @return \Visay\FootballManager\Domain\Model\Location $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the location
	 *
	 * @param \Visay\FootballManager\Domain\Model\Location $location
	 * @return void
	 */
	public function setLocation(\Visay\FootballManager\Domain\Model\Location $location) {
		$this->location = $location;
	}

	/**
	 * Returns the team
	 *
	 * @return \Visay\FootballManager\Domain\Model\Team $team
	 */
	public function getTeam() {
		return $this->team;
	}

	/**
	 * Sets the team
	 *
	 * @param \Visay\FootballManager\Domain\Model\Team $team
	 * @return void
	 */
	public function setTeam(\Visay\FootballManager\Domain\Model\Team $team) {
		$this->team = $team;
	}

}
?>