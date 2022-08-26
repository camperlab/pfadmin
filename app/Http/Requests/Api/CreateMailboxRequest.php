<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CreateMailboxRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|unique:mailbox,local_part',
            'password' => 'required|string',
            'domain' => 'required|string',
            'name' => 'nullable|string',
            'quota' => 'required|numeric',
            'active' => 'nullable|bool',
            'send_welcome' => 'nullable|bool',
            'email_other' => 'nullable|string'
        ];
    }
}
