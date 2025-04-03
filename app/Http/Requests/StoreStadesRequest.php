<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStadesRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'ville' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
{
    return [
        'name.required' => 'Le nom du stade est requis.',
        'name.string' => 'Le nom doit être une chaîne de caractères.',
        'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',

        'capacity.required' => 'La capacité du stade est requise.',
        'capacity.integer' => 'La capacité doit être un nombre entier.',

        'ville.required' => 'La ville est requise.',
        'ville.string' => 'La ville doit être une chaîne de caractères.',
        'ville.max' => 'Le nom de la ville ne peut pas dépasser 255 caractères.',

        'adresse.required' => "L'adresse est requise.",
        'adresse.string' => "L'adresse doit être une chaîne de caractères.",
        'adresse.max' => "L'adresse ne peut pas dépasser 255 caractères.",

        'photo.image' => 'Le fichier doit être une image.',
        'photo.mimes' => 'Le format de l\'image doit être JPG, JPEG ou PNG.',
        'photo.max' => 'L\'image ne doit pas dépasser 2 Mo.',
    ];
}

}
