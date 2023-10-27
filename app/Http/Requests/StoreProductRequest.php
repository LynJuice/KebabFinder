<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = User::with("roles")->find(Auth::user()->id);
        if ($user->hasRole('svetaines administratorius')) {
            return true;
        } else if ($user->hasRole('kebabines administratorius')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'stirng|max:255',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
