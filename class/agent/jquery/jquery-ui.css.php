<?php

class extends agentTemplate
{
	const contentType = 'text/css';

	protected $watch = array('public/css');

	function compose($o)
	{
		$o = jquery::compose($o);

		return parent::compose($o);
	}
}
