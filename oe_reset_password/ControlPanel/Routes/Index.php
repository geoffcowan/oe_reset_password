<?php

namespace Orionesque\OeResetPassword\ControlPanel\Routes;

use ExpressionEngine\Service\Addon\Controllers\Mcp\AbstractRoute;

class Index extends AbstractRoute
{
    protected $route_path = 'index';
    protected $cp_page_title = 'oe_reset_password_settings';

    public function process($id = false)
    {
        $this->setView('Settings');

        return $this;
    }
}
