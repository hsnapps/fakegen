<form id="delete-form" action="{{ route('remove', ['lang' => app()->getLocale()]) }}" method="post">
    @csrf
    <input type="hidden" name="key" id="delete-key">
</form>

<form id="up-form" action="{{ route('move-up') }}" method="post">
    @csrf
    <input type="hidden" name="key" id="up-key">
</form>

<form id="down-form" action="{{ route('move-down') }}" method="post">
    @csrf
    <input type="hidden" name="key" id="down-key">
</form>

<form id="remove-all" action="{{ route('remove-all', ['lang' => app()->getLocale()]) }}" method="post">
    @csrf
</form>
