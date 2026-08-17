<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * UpdateCategoryRequest
 *
 * Validates and authorizes updates to an existing Category.
 *
 * Authorization: only the category owner can update it (delegated to CategoryPolicy).
 */
class UpdateCategoryRequest extends FormRequest
{
    /**
     * Only the category owner may update it.
     *
     * Delegates to CategoryPolicy::update() via the can() helper.
     * The route model binding provides the $category instance.
     */
    public function authorize(): bool
    {
        $category = $this->route('category');

        return $this->user()->can('update', $category);
    }

    /**
     * Validation rules for updating a category.
     *
     * The unique rule ignores the current category's own name so users can
     * "save" without changing the name and not get a duplicate error.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $category = $this->route('category');

        return [
            // A category name only needs to be unique for this user.
            'name' => [
                'required',
                'min:2',
                Rule::unique('categories', 'name')
                    ->ignore($category->id)
                    ->where(fn ($query) => $query->where('user_id', $this->user()->id)),
            ],
        ];
    }
}
