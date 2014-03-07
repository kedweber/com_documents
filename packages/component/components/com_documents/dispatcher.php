<?php

class ComDocumentsDispatcher extends ComDefaultDispatcher
{
	/**
	 * @param KCommandContext $context
	 * @return false|mixed
	 */
	protected function _actionForward(KCommandContext $context)
	{
		if($this->getRequest()->format == 'json')
		{
			$context->result = $this->getController()->execute('display', $context);
			return $context->result;
		}

		parent::_actionForward($context);
	}
}