@props([
    'label',
    'name',
    'type' => 'text',
    'placeholder' => '',
    'value' => null,
    'usePlaceholder' => false
])

<div class="form-group">
    <label>{{ $label }}</label>

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        placeholder="{{ $usePlaceholder ? (old($name) ?? $value) : $placeholder }}"
        value="{{ $usePlaceholder ? '' : old($name, $value) }}"
        class="form-control"
    >

    @error($name)
        <div class="form-error">{{ $message }}</div>
    @enderror
</div>
