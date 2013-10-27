<?php
namespace Visay\FootballManager\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Visay Keo <keo@visay.info>, Visay.Info
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
class PlayerResponse extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * The response yes/no from the player
	 *
	 * @var boolean
	 * @validate NotEmpty
	 */
	protected $response = FALSE;

	/**
	 * The player who response to this match
	 *
	 * @var \Visay\FootballManager\Domain\Model\Player
	 */
	protected $player;

	/**
	 * The match that this response is for
	 *
	 * @var \Visay\FootballManager\Domain\Model\Match
	 */
	protected $play;

	/**
	 * Returns the response
	 *
	 * @return boolean $response
	 */
	public function getResponse() {
		return $this->response;
	}

	/**
	 * Sets the response
	 *
	 * @param boolean $response
	 * @return void
	 */
	public function setResponse($response) {
		$this->response = $response;
	}

	/**
	 * Returns the boolean state of response
	 *
	 * @return boolean
	 */
	public function isResponse() {
		return $this->getResponse();
	}

	/**
	 * Returns the player
	 *
	 * @return \Visay\FootballManager\Domain\Model\Player $player
	 */
	public function getPlayer() {
		return $this->player;
	}

	/**
	 * Sets the player
	 *
	 * @param \Visay\FootballManager\Domain\Model\Player $player
	 * @return void
	 */
	public function setPlayer(\Visay\FootballManager\Domain\Model\Player $player) {
		$this->player = $player;
	}

	/**
	 * Returns the play
	 *
	 * @return \Visay\FootballManager\Domain\Model\Match $play
	 */
	public function getPlay() {
		return $this->play;
	}

	/**
	 * Sets the play
	 *
	 * @param \Visay\FootballManager\Domain\Model\Match $play
	 * @return void
	 */
	public function setPlay(\Visay\FootballManager\Domain\Model\Match $play) {
		$this->play = $play;
	}

}
?>