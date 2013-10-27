<?php

if (! defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Visay.' . $_EXTKEY,
	'FootballSchedule',
	array(
		'Match' => 'list, filter, confirm, decline',
	),
	// non-cacheable actions
	array(
		'Match' => 'filter, confirm, decline',
	)
);

?>