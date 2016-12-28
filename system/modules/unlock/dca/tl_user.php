<?php

/**
 * Operations
 */
$GLOBALS['TL_DCA']['tl_user']['list']['operations']['unlock'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_user']['unlock'],
	'href'				=> 'key=unlock',
	'attributes'		=> 'onclick="Backend.getScrollOffset ();"',
	'icon'				=> 'system/modules/unlock/assets/img/unlock.png',
	'button_callback'	=> ['Unlock', 'addUnlockButton'],
);
