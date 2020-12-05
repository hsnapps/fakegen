<!-- donate modal -->
<div id="donate" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">@lang('donate.link')</h2>
        <div class="uk-grid-divider uk-grid-collapse uk-margin-remove uk-padding-remove" uk-grid>
            <div class="uk-width-1-2 uk-background-muted uk-padding-remove">
                <span class="uk-display-inline" uk-icon="icon: heart; ratio: 1.5"></span>
                <p class="uk-display-inline">@lang('donate.message')</p>
            </div>
            <div class="uk-width-1-2 uk-margin-auto-vertical uk-text-center">
                <a href="https://paypal.me/HassanBaabdullah" target="_blank">
                    <img id="donate-here" src="{{ url('images/paypal-2.png') }}" width="180" uk-img>
                </a>
            </div>
        </div>
    </div>
</div>
