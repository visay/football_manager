<?php
namespace Visay\FootballManager\Controller;

use Visay\FootballManager\Domain\Model;
use TYPO3\CMS\Core\Tests\Unit\Cache;
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
class MatchController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * matchRepository
	 *
	 * @var \Visay\FootballManager\Domain\Repository\MatchRepository
	 * @inject
	 */
	protected $matchRepository;

	/**
	 * Player Repository
	 *
	 * @var \Visay\FootballManager\Domain\Repository\PlayerRepository
	 * @inject
	 */
	protected $playerRepository;

	/**
	 * Player Repository
	 *
	 * @var \Visay\FootballManager\Domain\Repository\PlayerResponseRepository
	 * @inject
	 */
	protected $playerResponseRepository;

	/**
	 * action list
	 *
	 * @param \string $message
	 * @param \string $messageType
	 * @return void
	 */
	public function listAction($message = '', $messageType = '') {
		$match = $this->matchRepository->getNextMatch();
		$this->view->assign('match', $match);
		if (is_object($match)) {
			$playerResponses = $this->playerResponseRepository->findByMatch($match);
			$players = $this->playerRepository->findAll();

			$confirmed = 0;
			$declined = 0;
			foreach ($playerResponses as $playerResponse) {
				if ($playerResponse->getResponse()) {
					$confirmed = $confirmed + 1;
				} else {
					$declined = $declined + 1;
				}
			}

			$this->view->assign('confirmed', $confirmed);
			$this->view->assign('declined', $declined);
			$this->view->assign('pending', count($players) - count($playerResponses));
			$this->view->assign('players', $players);
			$this->view->assign('message', $message);
			$this->view->assign('messageType', $messageType);
		}
	}

	/**
	 * action filter
	 *
	 * @param \Visay\FootballManager\Domain\Model\Player $player
	 * @param \string $message
	 * @param \string $messageType
	 * @return void
	 */
	public function filterAction(\Visay\FootballManager\Domain\Model\Player $player = NULL, $message = '', $messageType = '') {
		if (! $player) $this->redirect('list');

		$match = $this->matchRepository->getNextMatch();
		$this->view->assign('match', $match);
		if (is_object($match)) {
			$playerResponses = $this->playerResponseRepository->findByMatch($match);
			$players = $this->playerRepository->findAll();

			$confirmed = 0;
			$declined = 0;
			foreach ($playerResponses as $playerResponse) {
				if ($playerResponse->getResponse()) {
					$confirmed = $confirmed + 1;
				} else {
					$declined = $declined + 1;
				}
			}

			$this->view->assign('confirmed', $confirmed);
			$this->view->assign('declined', $declined);
			$this->view->assign('pending', count($players) - count($playerResponses));
			$this->view->assign('players', $players);
			$this->view->assign('activePlayer', $player);
			$this->view->assign('message', $message);
			$this->view->assign('messageType', $messageType);

			$activePlayerResponse = $this->playerResponseRepository->findByMatchAndPlayer($match, $player);
			if ($activePlayerResponse) {
				if ($activePlayerResponse->getResponse()) {
					$this->view->assign('confirmedResponse', TRUE);
					$this->view->assign('declinedResponse', FALSE);
				} else {
					$this->view->assign('confirmedResponse', FALSE);
					$this->view->assign('declinedResponse', TRUE);
				}
			}
		}
	}

	/**
	 * action confirm
	 *
	 * @param \Visay\FootballManager\Domain\Model\Match $match
	 * @param \Visay\FootballManager\Domain\Model\Player $player
	 * @return void
	 */
	public function confirmAction(\Visay\FootballManager\Domain\Model\Match $match, \Visay\FootballManager\Domain\Model\Player $player) {
		$code = $this->request->getArgument('code');
		if (! empty($code) && ($code == $player->getCode())) {
			$playerResponse = $this->playerResponseRepository->findByMatchAndPlayer($match, $player);
			if ($playerResponse) {
				$playerResponse->setResponse(TRUE);
				$this->playerResponseRepository->update($playerResponse);
			} else {
				$playerResponse = new \Visay\FootballManager\Domain\Model\PlayerResponse();
				$playerResponse->setResponse(TRUE);
				$playerResponse->setPlay($match);
				$playerResponse->setPlayer($player);
				$this->playerResponseRepository->add($playerResponse);
			}
			$this->redirect('list', NULL, NULL, array('message' => 'Response recorded!', 'messageType' => 'success'));
		} else {
			$this->redirect('filter', NULL, NULL, array('player' => $player, 'message' => 'Invalid code!', 'messageType' => 'error'));
		}
	}

	/**
	 * action decline
	 *
	 * @param \Visay\FootballManager\Domain\Model\Match $match
	 * @param \Visay\FootballManager\Domain\Model\Player $player
	 * @return void
	 */
	public function declineAction(\Visay\FootballManager\Domain\Model\Match $match, \Visay\FootballManager\Domain\Model\Player $player) {
		$code = $this->request->getArgument('code');
		if (! empty($code) && ($code == $player->getCode())) {
			$playerResponse = $this->playerResponseRepository->findByMatchAndPlayer($match, $player);
			if ($playerResponse) {
				$playerResponse->setResponse(FALSE);
				$this->playerResponseRepository->update($playerResponse);
			} else {
				$playerResponse = new \Visay\FootballManager\Domain\Model\PlayerResponse();
				$playerResponse->setResponse(FALSE);
				$playerResponse->setPlay($match);
				$playerResponse->setPlayer($player);
				$this->playerResponseRepository->add($playerResponse);
			}
			$this->redirect('list', NULL, NULL, array('message' => 'Response recorded!', 'messageType' => 'success'));
		} else {
			$this->redirect('filter', NULL, NULL, array('player' => $player, 'message' => 'Invalid code!', 'messageType' => 'error'));
		}
	}

}
?>