$('#user-manager-content').ready(function () {
    loadUser('/search-users');

    $('#search-user-btn').click(function (e) {
        e.preventDefault();
        loadUser('/search-users');
    })

    $('#add-user-btn').click(function () {
        $('#store-user-modal-title').html('Thêm mới Khách sạn:');
        $('#storeUserForm').trigger('reset'),
        showErrorInput('');
        $('#store-user-modal').modal('show');
    });
});

$('body').on('click', '.pagination a', function(e) {
    e.preventDefault();
    loadUser($(this).attr('href'));
});

$('body').on('click', '#delete-user-btn', function () {
    $.get('/delete-user/'+ $(this).data('id'), function (data) {
        displayNotice(data.status, data.message);
        loadUser($('#hidden-current-page').val());
    })
});

$('body').on('click', '#edit-user-btn', function () {
    $.get('/show-user/'+ $(this).data('id'), function (data) {
        $('#store-user-modal-title').html('Cập nhật thông tin Khách sạn:');
        $('#storeUserForm').trigger('reset'),
        showErrorInput('');
        $('#store-user-modal').modal('show');
        $('#user-id-input').val(data.id);
        $('#user-name-input').val(data.name);
        $('#user-birthday-input').val(data.birthday);
        $('#user-hotelName-input').val(data.hotel_id);
        $('#user-hotelName-input').val(data.role);
    });
});

$('body').on('click', '#save-user', function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/save-user',
        type: 'POST',
        data: $('#storeUserForm').serialize(),
        success: function (data) {
            if(data.status != undefined) {
                $('#store-user-modal').modal('hide');
                displayNotice(data.status, data.message);
                loadUser($('#hidden-current-page').val());
            } else {
                showErrorInput(data.errors);
            }
        }
    })
});


function loadUser(url) {
    $.ajax({
        url: url,
        type: 'GET',
        data: $('#search-user-form').serialize(),
        success: function (data) {
            $('#user-list').empty();
            $('#user-list').html(data.usersTable);
        }
    });
}

function displayNotice(status, message) {
    if(status == 'success') {
        createNoticeBar('alert-danger', 'alert-success', message);
    } else {
        createNoticeBar('alert-success', 'alert-danger', message);
    }
    setTimeout(function () {
        $('.add-notice-area').hide();
    }, 5000);
}

function createNoticeBar(old_class, new_class, message) {
    $('.add-notice-area').show();
    $('.add-notice-area').removeClass(old_class);
    $('.add-notice-area').addClass(new_class);
    $('#notice-content').html(message);
}

function showErrorInput(data) {
    $('#name-error').html(data === '' ? '' : data.name);
    $('#birthday-error').html(data === '' ? '' : data.birthday);
    $('#hotelName-error').html(data === '' ? '' : data.hotel_id);
    $('#role-error').html(data === '' ? '' : data.role);
}
