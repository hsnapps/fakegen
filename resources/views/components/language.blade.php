<select onchange="changeLocale(event)">
    @foreach (__('languages') as $key => $value)
    <option value="{{ $key }}" {{ App::getLocale() === $key ? 'selected' : '' }}>{{ $value }}</option>
    @endforeach
</select>
