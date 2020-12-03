@if (session('file'))
<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>To download your generated file click <a href="{{ session('file') }}"><b>here</b></a> &nbsp;<small>Filse stays in the server for only 1 hour</small></p>
</div>
@endif
