@if (session('file'))
<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    {!! __('app.click-here', ['file' => session('file')]) !!}
</div>
@endif
