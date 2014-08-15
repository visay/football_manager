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
	 * The end time of the match
	 *
	 * @var \DateTime
	 * @validate NotEmpty
	 */
	protected $endtime;

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
	 * red card players
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Visay\FootballManager\Domain\Model\Player>
	 * @cascade remove
	 */
	protected $redCardPlayers = NULL;


	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->redCardPlayers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

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
	 * Returns the end time
	 *
	 * @return \DateTime $endtime
	 */
	public function getEndtime() {
		return $this->endtime;
	}

	/**
	 * Sets the end time
	 *
	 * @param \DateTime $endtime
	 * @return void
	 */
	public function setEndtime($endtime) {
		$this->endtime = $endtime;
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

	/**
	 * Adds a Player
	 *
	 * @param \Visay\FootballManager\Domain\Model\Player $redCardPlayer
	 * @return void
	 */
	public function addRedCardPlayer(\Visay\FootballManager\Domain\Model\Player $redCardPlayer) {
		$this->redCardPlayers->attach($redCardPlayer);
	}

	/**
	 * Removes a Player
	 *
	 * @param \Visay\FootballManager\Domain\Model\Player $redCardPlayerToRemove The Player to be removed
	 * @return void
	 */
	public function removeRedCardPlayer(\Visay\FootballManager\Domain\Model\Player $redCardPlayerToRemove) {
		$this->redCardPlayers->detach($redCardPlayerToRemove);
	}

	/**
	 * Returns the redCardPlayers
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Visay\FootballManager\Domain\Model\Player> $redCardPlayers
	 */
	public function getRedCardPlayers() {
		return $this->redCardPlayers;
	}

	/**
	 * Sets the redCardPlayers
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Visay\FootballManager\Domain\Model\Player> $redCardPlayers
	 * @return void
	 */
	public function setRedCardPlayers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $redCardPlayers) {
		$this->redCardPlayers = $redCardPlayers;
	}

}
?>
