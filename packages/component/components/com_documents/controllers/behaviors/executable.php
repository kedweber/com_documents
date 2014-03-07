<?php
/**
 * Com
 *
 * @author      Dave Li <dave@moyoweb.nl>
 * @category    Nooku
 * @package     Socialhub
 * @subpackage  ...
 * @uses        Com_
 */
 
defined('KOOWA') or die('Protected resource');

class ComDocumentsControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{
	public function canAdd()
	{
		return true;
	}

	protected function _checkToken()
	{
		return true;
	}
}