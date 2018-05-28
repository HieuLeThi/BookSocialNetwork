$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    /**
     * Show delete confimation when click button delete
     */
    $('.btn-delete-item').bind('click', function (e) {
        var form = $(this.form);
        var title = $(this).attr('data-title');
        var body = '<i>' + $(this).attr('data-confirm') + '</i>';
        $('#title-content').html(title);
        $('#body-content').html(body);
        $('#confirm').modal('show');
        $('#delete-btn').one('click', function () {
            form.submit();
        })
    });
    $('.btn-approval-item').bind('click', function (e) {
        var form = $(this.form);
        var title = $(this).attr('data-title');
        var body = $(this).attr('data-confirm');
        $('#title-p-content').html(title);
        $('#body-p-content').html(body);
        $('#confirmAppr').modal('show');
        $('#btn-approval').one('click', function () {
            form.submit();
        })
    });
    $('.btn-detail-item').bind('click', function (e) {
        var form = $(this.form);
        var title = $(this).attr('data-title');
        var body = $(this).attr('data-confirm');
        $('#title-d-content').html(title);
        $('#body-d-content').html(body);
        $('#detail').modal('show');
        $('#btn-approval').one('click', function () {
            form.submit();
        })
    });
    $('#btn-add-category').bind('click', function (e) {
    $('#add-category').modal('show');
    });
});

