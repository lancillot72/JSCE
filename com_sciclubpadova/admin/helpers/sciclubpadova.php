<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorld component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since   1.6
 */
abstract class SciClubPadovaHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_SCICLUBPADOVA_SUBMENU_MESSAGES'),
			'index.php?option=com_sciclubpadova',
			$submenu == 'messages'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_SCICLUBPADOVA_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&view=categories&extension=com_sciclubpadova',
			$submenu == 'categories'
		);

		// Set some global property
		$document = JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-sciclubpadova ' .
										'{background-image: url(../media/com_sciclubpadova/images/tux-48x48.png);}');
		if ($submenu == 'categories')
		{
			$document->setTitle(JText::_('COM_SCICLUBPADOVA_ADMINISTRATION_CATEGORIES'));
		}
	}

	/**
	 * Get the actions
	 */
	public static function getActions($messageId = 0)
	{
		$result	= new JObject;

		if (empty($messageId)) {
			$assetName = 'com_sciclubpadova';
		}
		else {
			$assetName = 'com_sciclubpadova.message.'.(int) $messageId;
		}

		$actions = JAccess::getActions('com_sciclubpadova', 'component');

		foreach ($actions as $action) {
			$result->set($action->name, JFactory::getUser()->authorise($action->name, $assetName));
		}

		return $result;
	}
}
