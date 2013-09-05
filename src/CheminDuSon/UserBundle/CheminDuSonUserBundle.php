<?php

namespace CheminDuSon\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CheminDuSonUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
