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

class ComDocumentsControllerUpload extends ComDefaultControllerDefault
{
	protected $_documents = array();

	public function __construct(KConfig $config)
	{
		parent::__construct($config);

		$this->registerCallback('before.add', array($this, 'beforeAdd'));
	}

	public function beforeAdd(KCommandContext $context)
	{
		$context->data->file = KRequest::get('files.file.tmp_name', 'raw');
		$context->data->name = KRequest::get('files.file.name', 'koowa:filter.filename');
	}

	protected function _actionAdd(KCommandContext $context)
	{
		$file = $this->getService('com://site/documents.model.files')->name($context->data->name)->folder($context->data->folder)->getItem();

		if($file->isNew()) {
			$controller = $this->getService('com://admin/files.controller.file', array('request' => array('container' => 'fileman-files')));

			$data = $controller->add(array(
				'file' => $context->data->file,
				'name' =>  $context->data->name,
				'override' => 1,
			));

			$file->setData($data);
			$file->save();
		}

		if($file->isRelationable()) {
			$id = $file->getTaxonomy()->id;
		} else {
			$id = $file->id;
		}

		$context->status = KHttpResponse::OK;

		echo json_encode((int) $id);
		exit;
	}
}