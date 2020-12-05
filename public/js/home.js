const headers = {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
};

var changeLabel = true;
const qstring = new URLSearchParams(window.location.search);
const lang = qstring.get('lang');
var options = {
    labels: {ok: 'OK', cancel: 'Cancel'}
}

fetch('/api/buttons?lang=' + lang)
    .then(res => res.json())
    .then(data => {
        options.labels.ok = data.ok;
        options.labels.cancel = data.cancel;
    })
    .catch(err => {});

document.getElementById('label').addEventListener('change', () => {
    changeLabel = false;
});

async function fillCategories() {
    const url = '/api/categories?lang=' + lang;

    document.getElementById('category').innerHTML = '';
    await fetch(url, headers)
            .then(res => res.json())
            .then(data => {
                var html = '';
                for (const item in data) {
                    html += `<option value="${item}">${data[item]}</option>`;
                }
                document.getElementById('category').innerHTML = html;

                if (document.getElementById('category').childNodes.length > 0) {
                    fillSubCategories(document.getElementById('category').childNodes[0].value);

                }
            })
            .catch(err => showError(err));
}

async function fillSubCategories(category) {
    const url = '/api/types/' + category + '?lang=' + lang;
    await fetch(url, headers)
            .then(res => res.json())
            .then(data => {
                document.getElementById('sub-category').innerHTML = '';
                var html = '';
                for (const item in data) {
                    html += `<option value="${item}">${data[item]}</option>`;
                }
                document.getElementById('sub-category').innerHTML = html;

                if (document.getElementById('sub-category').childNodes.length > 0) {
                    renderProperties(document.getElementById('sub-category').childNodes[0].value);
                }
            })
            .catch(err => showError(err));
}

async function renderProperties(subcategory) {
    const category = document.getElementById('category').value;
    const url = '/api/render/' + category + '/' + subcategory + '?lang=' + lang;
    const caption = document.getElementById('label').value;

    if(document.getElementById('label').value.length === 0 || changeLabel) {
        const sel = document.getElementById('sub-category');
        document.getElementById('label').value = sel.options[sel.selectedIndex].text;
        changeLabel = true;
    }

    document.getElementById('init').setAttribute('type', 'text');
    await fetch(url, headers)
            .then(res => res.json())
            .then(data => {
                document.getElementById('type').innerHTML = '';

                for (const item in data) {
                    if (item === 'title') continue;

                    if (item === 'help') {
                        document.getElementById('help').innerHTML = `<footer>${data['help']}</footer>`;
                        continue;
                    }

                    var show = data[item] === null ? 'none' : 'block';
                    var min = document.getElementById('min');
                    var max = document.getElementById('max');
                    var init = document.getElementById('init');

                    document.getElementById(item + '_div').style.display = show;

                    if (item === 'type') {
                        if (Array.isArray(data[item])) {
                            var options = data[item];
                            var html = '';
                            for (const option in options) {
                                html += `<option value="${options[option]}">${options[option]}</option>`;
                            }
                            document.getElementById('type').innerHTML = html;
                        } else {
                            var val = data['type'];
                            document.getElementById('type_div').style.display = 'none';

                            switch (val) {
                                case 'date':
                                    init.setAttribute('type', 'date');
                                    min.setAttribute('type', 'date');
                                    max.setAttribute('type', 'date');
                                    break;

                                case 'number':
                                    init.setAttribute('type', 'number');
                                    min.setAttribute('type', 'number');
                                    min.setAttribute('min', data['min']);
                                    min.setAttribute('max', data['max']);
                                    max.setAttribute('type', 'number');
                                    max.setAttribute('min', data['min']);
                                    max.setAttribute('max', data['max']);
                                    break;

                                default:
                                    break;
                            }

                            if (data['init']) {
                                init.value = data['init'];
                            }
                        }
                    }

                    min.value = data['min'];
                    max.value = data['max'];
                }
            })
            .then(() => {
                document.getElementById('label').focus();
            })
            .catch(err => showError(err));
}

function showError(err) {
    document.getElementById('err-message').innerText = err;
    document.getElementById('err-alert').style.display = 'block';
    console.error(err);
}

async function removeRow(key) {
    const url = '/api/message/remove-row?lang=' + lang;
    await fetch(url)
            .then(res => res.text())
            .then(data => {
                UIkit.modal.confirm(data, options).then(function() {
                    document.getElementById('delete-key').value = key;
                    document.getElementById('delete-form').submit();
                }, function() {});
            })
            .catch(err => showError(err));
}

async function removeAll() {
    var table = document.getElementById("fields-list");
    var rows = table.tBodies[0].rows.length;
    if(rows === 0) return;

    const url = '/api/message/remove-all?lang=' + lang;
    await fetch(url)
        .then(res => res.text())
        .then(data => {
            UIkit.modal.confirm(data, options).then(function() {
                document.getElementById('remove-all').submit();
            }, function() {});
        })
        .catch(err => showError(err));
}

function up(key, index) {
    if (index === 0) return;
    document.getElementById('up-key').value = key;
    document.getElementById('up-form').submit();
}

function down(key, index, count) {
    if (index === count) return;
    document.getElementById('down-key').value = key;
    document.getElementById('down-form').submit();
}

function changeLocale(e) {
    // window.location.host
    document.location.assign('?lang=' + e.target.value)
}

function generate() {
    var table = document.getElementById("fields-list");
    var rows = table.tBodies[0].rows.length;
    if(rows === 0) return;

    UIkit.modal('#modal-generate').show();
    //  uk-toggle="target: #modal-generate"
}

//  uk-toggle="target: #donate-here; mode: hover; cls: uk-box-shadow-large"
document.getElementById('donate-here').addEventListener('mouseover', (e) => {
    e.target.classList.add('uk-box-shadow-medium');
});
document.getElementById('donate-here').addEventListener('mouseleave', (e) => {
    e.target.classList.remove('uk-box-shadow-medium');
});

fillCategories();
