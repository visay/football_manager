plugin.tx_footballmanager {
	view {
		# cat=plugin.tx_footballmanager/file; type=string; label=Path to template root (FE)
		templateRootPath = EXT:football_manager/Resources/Private/Templates/
		# cat=plugin.tx_footballmanager/file; type=string; label=Path to template partials (FE)
		partialRootPath = EXT:football_manager/Resources/Private/Partials/
		# cat=plugin.tx_footballmanager/file; type=string; label=Path to template layouts (FE)
		layoutRootPath = EXT:football_manager/Resources/Private/Layouts/
	}
	persistence {
		# cat=plugin.tx_footballmanager//a; type=string; label=Default storage PID
		storagePid =
	}
}