<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * StoreCategoryRequest
 *
 * Validates and authorizes the creation of a new Category.
 *
 * Authorization: any authenticated user can create a category.
 *
 * Ownership injection: user_id is automatically merged into the validated data
 * via prepareForValidation() so the controller doesn't have to set it manually.
 * This also ensures user_id always comes from the server session — never the form.
 */
class StoreCategoryRequest extends FormRequest
{
    /**
     * Any authenticated user can create a category.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for a new category.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // A category name only needs to be unique for this user.
            'name' => [
                'required',
                'min:2',
                Rule::unique('categories', 'name')
                    ->where(fn ($query) => $query->where('user_id', $this->user()->id)),
            ],

            // user_id: merged server-side in prepareForValidation(); not from the form.
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    /**
     * Inject the authenticated user's ID before validation runs.
     *
     * This guarantees the category is always attributed to the logged-in user,
     * regardless of what the form submits.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => $this->user()->id,
        ]);
    }
}
