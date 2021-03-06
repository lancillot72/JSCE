<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Set some global property
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-sciclubpadova {background-image: url(../media/com_sciclubpadova/images/Tux-16x16.png);}');

// Access check: is this user allowed to access the backend of this component?
if (!JFactory::getUser()->authorise('core.manage', 'com_sciclubpadova'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Require helper file
JLoader::register('SciClubPadovaHelper', JPATH_COMPONENT . '/helpers/sciclubpadova.php');

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('SciClubPadova');

// Perform the Request task
$controller->execute(JFactory::getApplication()->input->get('task'));

// Redirect if set by the controller
$controller->redirect();
