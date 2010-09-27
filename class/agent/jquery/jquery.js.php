<?php

class extends agent_js
{
	public $get = array('__0__:c:' => '', 'src:b');

	protected $extension = '';

	function compose($o)
	{
		if ($this->debug || $this->get->src)
		{
			$o = jquery::compose($o);
		}

		return parent::compose($o);
	}
}
