<?php

namespace Orionesque\OeResetPassword\Commands;

use ExpressionEngine\Cli\Cli;

class CommandResetPassword extends Cli
{
    public $name = 'Member Reset Password';

    public $signature = 'member:reset-password';

    public $usage = 'php eecms member:reset-password';

    public $commandOptions = [
        'member_id,m:' => 'command_member_reset_password_option_member_id',
        'password,p:'  => 'command_member_reset_password_option_password',
    ];

    public function handle()
    {
        $memberId = $this->getOptionOrAsk(
            '--member_id',
            lang('command_member_reset_password_ask_member_id'),
            '',
            true
        );

        $member = ee('Model')->get('Member')
            ->filter('member_id', $memberId)
            ->first();

        if (!$member) {
            $this->fail(lang('command_member_reset_password_member_not_found'));
        }

        $this->info(lang('command_member_reset_password_found_member') . $member->username);

        $password = $this->getOptionOrAsk(
            '--password',
            lang('command_member_reset_password_ask_password'),
            '',
            true
        );

        // Hash password manually — hashAndUpdatePassword() requires
        // ee()->session which is not available in CLI context
        ee()->load->library('auth');
        $hashed = ee()->auth->hash_password($password);
        $member->password = $hashed['password'];
        $member->salt = $hashed['salt'];
        $member->save();

        // Kill all existing sessions for this member
        ee('Model')->get('Session')
            ->filter('member_id', $member->member_id)
            ->delete();

        // Invalidate remember-me cookies via direct DB delete
        // ee()->remember is not available in CLI context
        ee()->db->where('member_id', $member->member_id)
            ->delete('remember_me');

        $this->complete(lang('command_member_reset_password_success'));
    }
}
