const headers = {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
};

function fillCategories() {
    const url = '/api/categories';

    document.getElementById('category').innerHTML = '';
    fetch(url, headers)
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

function fillSubCategories(category) {
    const url = '/api/types/' + category;
    fetch(url, headers)
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

function renderProperties(subcategory) {
    const category = document.getElementById('category').value;
    const url = '/api/render/' + category + '/' + subcategory;

    document.getElementById('init').setAttribute('type', 'text');
    fetch(url, headers)
        .then(res => res.json())
        .then(data => {
            document.getElementById('type').innerHTML = '';

            for (const item in data) {
                if(item === 'title') continue;

                var show = data[item] === null ? 'none' : 'block';
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
                        document.getElementById('type_div').style.display = 'none';
                        var val = data['type'];
                        switch (val) {
                            case 'date':
                                document.getElementById('init').setAttribute('type', 'date');
                                document.getElementById('min').setAttribute('type', 'date');
                                document.getElementById('max').setAttribute('type', 'date');
                                break;

                            default:
                                break;
                        }

                        if(data['init']) {
                            document.getElementById('init').value = data['init'];
                        }
                    }
                }
            }
        })
        .catch(err => showError(err));
}

function showError(err) {
    document.getElementById('err-message').innerText = err;
    document.getElementById('err-alert').style.display = 'block';
    // console.error(err);
}

fillCategories();
