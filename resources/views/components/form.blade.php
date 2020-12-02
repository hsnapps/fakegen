<div class="uk-grid-small uk-child-width-expand" uk-grid>
    <div>
        <label class="uk-form-label" for="label">Label</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="label" name="label" type="text" placeholder="Label" required autocomplete="off">
        </div>
    </div>

    <div>
        <label class="uk-form-label" for="category">Data Category</label>
        <div class="uk-form-controls">
            <select class="uk-select" id="category" name="category" onchange="fillSubCategories(event.target.value)"></select>
        </div>
    </div>

    <div>
        <label class="uk-form-label" for="sub-category">Sub Category</label>
        <div class="uk-form-controls">
            <select class="uk-select" id="sub-category" name="sub_category" onchange="renderProperties(event.target.value)"></select>
        </div>
    </div>
</div>

<div class="uk-grid-small uk-child-width-expand" uk-grid>
    <div id="size_div">
        <label class="uk-form-label" for="size">Size</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="size" name="size" type="text" placeholder="Size" autocomplete="off">
        </div>
    </div>

    <div id="min_div">
        <label class="uk-form-label" for="min">Min</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="min" name="min" type="text" placeholder="Min" autocomplete="off">
        </div>
    </div>

    <div id="max_div">
        <label class="uk-form-label" for="max">Max</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="max" name="max" type="text" placeholder="Max" autocomplete="off">
        </div>
    </div>

    <div id="init_div">
        <label class="uk-form-label" for="init">Init.</label>
        <div class="uk-form-controls">
            <input class="uk-input" id="init" name="init" type="text" placeholder="Init." autocomplete="off">
        </div>
    </div>

    <div id="type_div">
        <label class="uk-form-label" for="type">Type / Gender</label>
        <div class="uk-form-controls">
            <select class="uk-select" name="type" id="type"></select>
        </div>
    </div>
</div>
