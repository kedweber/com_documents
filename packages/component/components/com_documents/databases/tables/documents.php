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

class ComDocumentsDatabaseTableDocuments extends KDatabaseTableDefault
{
	/**
	 * @param KConfig $config
	 */
	protected function  _initialize(KConfig $config)
	{
		$relationable = $this->getBehavior('com://admin/taxonomy.database.behavior.relationable',
			array(
				'descendants' => array(
					'files' => array(
						'identifier' => 'com://site/documents.model.files'
					)
				)
			)
		);

		$config->append(array(
			'behaviors' => array(
				'sluggable',
				'lockable',
				'creatable',
				'modifiable',
				'identifiable',
				$relationable,
			)
		));

		parent::_initialize($config);
	}
}