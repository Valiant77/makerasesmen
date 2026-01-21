@props([
    'label',
    'name',
    'type' => 'text',
    'placeholder' => ''
])

<div class="form-group">
    <label>{{ $label }}</label>

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name) }}"
        placeholder="{{ $placeholder }}"
    >

    @error($name)
        <div class="form-error">{{ $message }}</div>
    @enderror
</div>
