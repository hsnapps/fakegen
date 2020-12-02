@if ($errors->any())
    <div id="err-alert" class="uk-alert-danger" style="display: none" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <ul class="uk-list uk-list-hyphen uk-list-disc uk-list-emphasis">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
