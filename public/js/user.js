$(document).ready(function(){
    $('#user-datatable').DataTable();
    $('.addUser').click(function(){
       $('.modal-title,.user-button').text('Add User');
       $('.password').show();
       $('[name=firstname]').val('');
       $('[name=middlenmae]').val('');
       $('[name=surname]').val('');
       $('[name=email]').val('');
       $('[name=role]').val('');
    })
    $('.edit').click(function() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/user/edit/' + this.id,
        method: 'get',
        data: {

        },
        success: function(data) {
              console.log(data.users[0].name);
              var user = data.users[0];
              $('.modal-title, .user-button').text('Update User');
              $('[name=firstname]').val(user.firstname);
              $('[name=middlename]').val(user.middlename);
              $('[name=surname]').val(user.surname);
              $('[name=email]').val(user.email);
              $('[name=role]').val(user.role);
              $('.password').hide();
              $('#user-form').attr('action', 'user/update/' + user.id);
        }
    });
});
})