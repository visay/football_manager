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
class Player extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * The player's photo
	 *
	 * @var \string
	 */
	protected $photo;

	/**
	 * The player's nickname
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $nickname;

	/**
	 * Returns the photo
	 *
	 * @return \string $photo
	 */
	public function getPhoto() {
		return $this->photo;
	}

	/**
	 * Sets the photo
	 *
	 * @param \string $photo
	 * @return void
	 */
	public function setPhoto($photo) {
		$this->photo = $photo;
	}

	/**
	 * Returns the nickname
	 *
	 * @return \string $nickname
	 */
	public function getNickname() {
		return $this->nickname;
	}

	/**
	 * Sets the nickname
	 *
	 * @param \string $nickname
	 * @return void
	 */
	public function setNickname($nickname) {
		$this->nickname = $nickname;
	}

}
?>