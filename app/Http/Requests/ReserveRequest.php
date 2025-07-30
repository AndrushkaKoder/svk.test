<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property  array $places
 */
class ReserveRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'   => ['required', 'string'],
            'places' => ['required', 'array']
        ];
    }
}
