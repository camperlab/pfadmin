<?php

namespace App\Repositories;

use App\Models\Mailbox;
use Illuminate\Support\Facades\Hash;

class MailboxRepository
{
    /**
     * @param array $attributes
     * @return Mailbox
     */
    public function create(array $attributes): Mailbox
    {
        $mailbox = new Mailbox();
        $mailbox->username = $attributes['username'] . '@' . $attributes['domain'];
        $mailbox->local_part = $attributes['username'];
        $mailbox->domain = $attributes['domain'];
        $mailbox->name = $attributes['name'] ?? '';
        $mailbox->maildir = "{$attributes['domain']}/{$attributes['domain']}/";
        $mailbox->password = Hash::make($attributes['password']);
        $mailbox->quota = $attributes['quota'] ?? 0;
        $mailbox->active = $attributes['active'];
        $mailbox->email_other = $attributes['email_other'] ?? '';

        if ($attributes['send_welcome']) {
            // TODO SEND WELCOME MAIL
        }

        $mailbox->save();

        return $mailbox;
    }

    /**
     * @param $username
     * @return null
     */
    public function findByUsername($username)
    {
        if ($mailbox = Mailbox::where('username', $username)->first()) return $mailbox;

        return null;
    }

    /**
     * @param $username
     * @param $attributes
     * @return bool
     */
    public function update($attributes): bool
    {
        if ($mailbox = Mailbox::where('username', $attributes['username'])->first()) {

            if (isset($attributes['password']))
                $mailbox->password = Hash::make($attributes['password']);

            if (isset($attributes['name']))
                $mailbox->name = $attributes['name'];

            if (isset($attributes['email_other']))
                $mailbox->email_other = $attributes['email_other'];

            $mailbox->quota = $attributes['quota'];
            $mailbox->active = $attributes['active'];
            $mailbox->save();

            return true;
        }

        return false;
    }

    /**
     * @param $username
     * @return bool
     */
    public function delete($username): bool
    {
        if ($mailbox = Mailbox::where('username', $username)->first()) {
            $mailbox->delete();

            return true;
        }

        return false;
    }
}
