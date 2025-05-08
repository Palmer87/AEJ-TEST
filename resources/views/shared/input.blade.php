@php
    $label ??= null;
    $name  ??= null;
    $value ??= null;
    $type ??= 'text';
    $class ??= null;
@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    @if ($type === 'textarea')
        <textarea
            class="form-control @error($name) is-invalid @enderror"
            id="{{ $name }}"
            name="{{ $name }}"
        >{{ old($name, $value) }}</textarea>
    @elseif ($type === 'file')
        <input
            class="form-control @error($name) is-invalid @enderror"
            id="{{ $name }}"
            type="{{ $type }}"
            name="{{ $name }}"
        >
    @else

    <input
        class="form-control @error($name) is-invalid @enderror"
        id="{{ $name }}"
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
    >
    @endif

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
