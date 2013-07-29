<?php

namespace Proximit\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ProximitUserBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}
