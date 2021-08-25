$("form#company").submit(function (e) {
    e.preventDefault();
    //debugger;
    var formData = new FormData(this);
    //alert("working");
    $.ajax({
        url: 'actions/signup/company',
        type: 'POST',
        data: formData,
        success: function (data) {
            //debugger;
            result = $.parseJSON(data);
            if (result.response == 'y') {
                postForm('account',result,'post');
            } else {
                swal("Oh ho!", result.message, "error");
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});

function postForm(path, params, method) {
    method = method || 'post';

    var form = document.createElement('form');
    form.setAttribute('method', method);
    form.setAttribute('action', path);

    for (var key in params) {
        if (params.hasOwnProperty(key)) {
            var hiddenField = document.createElement('input');
            hiddenField.setAttribute('type', 'hidden');
            hiddenField.setAttribute('name', key);
            hiddenField.setAttribute('value', params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}