<?php 
/*
 * @package component bannermaker for Joomla! 3.x
 * @version $Id: com_bannermaker 1.0.0 2017-7-10 23:26:33Z $
 * @author Kian William Nowrouzian
 * @copyright (C) 2017- Kian William Nowrouzian
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 
 This file is part of bannermaker.
    bannermaker is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
    bannermaker is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with bannermaker.  If not, see <http://www.gnu.org/licenses/>. 
*/
?>
<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.view');
class BannermakerViewBanner extends JViewLegacy
{
	protected $state;
	protected $item;
	function display($tpl = null)
	{
		$app = JFactory::getApplication();
        $params = $app->getParams();	
		$this->assignRef('params',$params);
    	$this->setLayout('default.php');
		$this->_prepareDocument();			
		parent::display($tpl);
	}
	protected function _prepareDocument()
	{
		$app		= JFactory::getApplication();
		$title 		= null;		
		if (empty($title)) {
			$title = $app->getCfg('sitename');
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
			$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
		}
		if (empty($title)) {
			$title = $this->item->title;
		}
		$this->document->setTitle($title);
	}
}