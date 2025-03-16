<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMatchsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'time' => 'required',
            'Stadium' => 'required|string|max:255',
            'home_team_id' => 'required|exists:equipes,id',
            'away_team_id' => 'required|exists:equipes,id',
            'home_team_score' => 'nullable|integer',
            'away_team_score' => 'nullable|integer',
        ];
    }
}
