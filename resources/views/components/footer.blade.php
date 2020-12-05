<footer>
    <div class="uk-background-secondary uk-light uk-padding" uk-grid>
        <div class="uk-width-1-3@m uk-width-1-1@s">
            <h6>@lang('app.used-libraries')</h6>
            <ul class="uk-list uk-list-hyphen">
                <li><a href="https://laravel.com/docs/8.x">Laravel 8.x</a></li>
                <li><a href="https://getuikit.com/">UIkit 3.5.10</a></li>
                <li><a href="https://fakerphp.github.io/">FakerPHP / Faker</a></li>
                <li><a href="https://laravel-excel.com/">Laravel Excel</a></li>
            </ul>
        </div>
        <div class="uk-width-1-3@m uk-width-1-1@s">
            <ul class="uk-list uk-list-hyphen">
                <li><a href="{{ route('howto', ['lang' => app()->getLocale()]) }}">@lang('app.howto-title')</a></li>
            </ul>
        </div>
        <div class="uk-width-1-3@m uk-width-1-1@s">
            <h6>@lang('app.contact')</h6>
            <a href="https://github.com/hsnapps/fakegen" class="uk-icon-button uk-margin-small-right" uk-icon="github-alt"></a>
        </div>
    </div>
</footer>
