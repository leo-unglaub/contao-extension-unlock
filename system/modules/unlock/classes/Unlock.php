<?php

/**
 * Class Unlock
 * Provired methods to unlock member and user accounts
 */
class Unlock extends Backend
{
	/**
	 * Unlock the member based on the $_GET parameter id
	 *
	 * @param	void
	 * @return	void
	 */
	public function unlockMember ()
	{
		// find the member
		$objMember = MemberModel::findBy ('id', \Input::get ('id'));

		// unlock the member
		$objMember->loginCount = Config::get ('loginCount');
		$objMember->locked = 0;
		$objMember->save ();

		// jump back to the member list
		$this->redirect ('contao/main.php?do=member');
	}


	/**
	 * Unlock the user based on the $_GET parameter id
	 *
	 * @param	void
	 * @return	void
	 */
	public function unlockUser ()
	{
		// find the user
		$objUser = UserModel::findBy ('id', \Input::get ('id'));

		// unlock the user
		$objUser->loginCount = Config::get ('loginCount');
		$objUser->locked = 0;
		$objUser->save ();

		// jump back to the user list
		$this->redirect ('contao/main.php?do=user');
	}


	/**
	 * Display the unlock button if the user is locked
	 *
	 * @param	array	$row			The current row as array.
	 * @param	string	$href			The current url.
	 * @param	string	$label			The current label.
	 * @param	string	$title			The current title.
	 * @param	string	$icon			The current icon.
	 * @param	array	$attributes		An array with all attributes.
	 * @return	string					The new generted image.
	 */
	public function addUnlockButton ($row, $href, $label, $title, $icon, $attributes)
	{
		if ($row['locked'] + Config::get ('lockPeriod') > time ())
		{
			return sprintf
			(
				'<a href="%s" title="%s" %s>%s</a>',

				$this->addToUrl ($href . '&amp;id=' . $row['id']),
				specialchars ($title),
				$attributes,
				$this->generateImage ($icon, $label),
			);
		}
	}
}
