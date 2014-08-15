<?php
namespace Visay\FootballManager\ViewHelpers;

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
 * ViewHelper to render red card flag
 */
class RedCardViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {


	/**
	 * Renders an icon tag
	 *
	 * @param \Visay\FootballManager\Domain\Model\Match $match
	 * @param \Visay\FootballManager\Domain\Model\Player $player
	 * @return void
	 */
	public function render(\Visay\FootballManager\Domain\Model\Match $match, \Visay\FootballManager\Domain\Model\Player $player) {
		$output = '';

		$redCardPlayers = $match->getRedCardPlayers();
		foreach ($redCardPlayers as $redCardPlayer) {
			if ($redCardPlayer === $player) {
				$output = '&nbsp;<img width="20" height="30" src="/typo3conf/ext/football_manager/Resources/Public/Icons/red-card.jpg" alt="Red card player" title="Red card player" />';
				break;
			}
		}

		return $output;
	}
}

?>
