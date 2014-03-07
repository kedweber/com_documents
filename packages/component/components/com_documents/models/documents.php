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

class ComDocumentsModelDocuments extends ComDefaultModelDefault
{
	/**
	 * @param KConfig $config
	 */
	public function __construct(KConfig $config)
	{
		parent::__construct($config);

		$this->_state
			->insert('taxonomy_taxonomy_id',	'int')
		;
	}

	/**
	 * @param KDatabaseQuery $query
	 */
	protected function _buildQueryWhere(KDatabaseQuery $query)
	{
		$state = $this->_state;

		parent::_buildQueryWhere($query);

		if(is_array($state->taxonomy_taxonomy_id)) {
			$query->where('taxonomy_taxonomy_id', 'IN', $state->taxonomy_taxonomy_id);
		}
	}
}