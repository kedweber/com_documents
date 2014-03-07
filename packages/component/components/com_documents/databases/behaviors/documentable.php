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

class ComDocumentsDatabaseBehaviorDocumentable extends KDatabaseBehaviorAbstract
{
	protected function _beforeTableInsert(KCommandContext $context)
	{
		$this->_saveDocuments();
	}

	protected function _beforeTableUpdate(KCommandContext $context)
	{
		$this->_saveDocuments();
	}

	protected function _saveDocuments()
	{
		foreach($this->documents as $document) {
			$row = $this->getService('com://site/documents.model.documents')->id($document['id'])->getItem();

			$row->setData($document);
			$row->save();

			if($row->isRelationable()) {
				$ids[] = $row->taxonomy_taxonomy_id ? $row->taxonomy_taxonomy_id : $row->getTaxonomy()->id;
			}
		}

		$this->setData(array(
			'documents' => $ids,
		));
	}
}