
{{-- 
WHAT IT IS: Boolean checkbox that sends 1 when checked, 0 when unchecked.
HOW TO USE: 
<x-forms.checkbox name="done" :checked="old('done', $task->done)" />
--}}

@props(['disabled' => false])

<!-- Hidden input sends 0 when unchecked -->
<input type="hidden" name="{{ $attributes->get('name') }}" value="0">

<!-- Checkbox sends 1 when checked and overrides the hidden 0 -->
<input 
    type="checkbox"
    value="1"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500']) }}>



