<?php

use ExpressionEngine\Service\Addon\Installer;

class Oe_reset_password_upd extends Installer
{
    public $has_cp_backend = 'y';

    public function install()
    {
        parent::install();

        return true;
    }

    public function uninstall()
    {
        parent::uninstall();

        return true;
    }

    public function update($current = '')
    {
        return true;
    }
}
