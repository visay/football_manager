<?php

if (! defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Visay.' . $_EXTKEY,
	'FootballSchedule',
	array(
		'Match' => 'list',
	),
	// non-cacheable actions
	array(
	)
);

?>