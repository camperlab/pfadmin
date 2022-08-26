<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMailboxRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string',
            'quota' => 'required|numeric',
            'active' => 'required|bool',
            'send_welcome' => 'required|bool',
            'name' => 'nullable|string',
            'password' => 'nullable|string',
            'email_other' => 'nullable|string'
        ];
    }
}
