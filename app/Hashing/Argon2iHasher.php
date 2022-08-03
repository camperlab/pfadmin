<?php
namespace App\Hashing;

use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Hashing\AbstractHasher;

class Argon2iHasher extends AbstractHasher implements Hasher
{
    public function make($value, array $options = []): string
    {
        return '{ARGON2I}' . password_hash($value, 'argon2i');
    }

    public function check($value, $hashedValue, array $options = []): bool
    {
        return password_verify($value, str_replace('{ARGON2I}', '', $hashedValue));
    }

    public function needsRehash($hashedValue, array $options = []): bool
    {
        return false;
    }
}
