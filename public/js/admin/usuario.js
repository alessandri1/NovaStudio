$("document").ready(function() {
  const modal = $("#modalform");
  const userform = $("#userForm");

  $('.edit-user').on('click', function() {
    performAction(this);
  });

  $("#crear-user").on("click", function() {
    console.log('here');
    setCreateModal();
  })

  $('.delete-user').on('click', function() {
    performAction(this);
  }); 

  $('#submit').on('click', function () {
    const formTarget = $('.show form');
    console.log($(formTarget).attr('id')); 
    doSubmit(formTarget);
  });

  $('#delete').on('click', function() {
    const formTarget = $(".show form");
    doSubmit(formTarget);
  });
  

  function performAction(element) {
    const action = $(element).attr('edit') ? 'editar' : 'eliminar';
    const id = action === 'editar' ? $(element).attr('edit') : $(element).attr('delete');
    $.ajax({
      method:'get',
      url:'/webmaster/admin/getUserById?id='+id,
      success: (data) => {
        var { user } = JSON.parse(data);
        if(action === 'editar') {
          $("#submit").show();
          $("#delete").hide();
          setEditModal(user);
        } else {
          $("#submit").hide();
          $("#delete").show();
          setDeleteModal(user);
        }
      },
      fail: (error) => {
        console.log(error);
      }
    });
  }

  function doSubmit(form) {
    form.submit();
  }

  function setCreateModal() {
    $("#name").removeAttr('disabled');
    $("#apellido").removeAttr('disabled');
    $("#username").removeAttr('disabled');
    $("#password").removeAttr('disabled');
    $("#password-repeat").removeAttr('disabled');
    $("#admin").removeAttr('disabled');
    $("#product-form").trigger('reset');
    $("#user-form").attr('action', '/webmaster/admin/createUser');
    showForm(userform);
    $("#delete").hide();
    $("#submit").show();
    modal.modal("show");    
  }

  function setEditModal(user, flag = true) {
    console.log(user);
    showForm(userform);
    if(flag){
      $("#delete").hide();
      $("#submit").show();
      $("#name").removeAttr('disabled');
      $("#apellido").removeAttr('disabled');
      $("#username").removeAttr('disabled');
      $("#password").removeAttr('disabled');
      $("#password-repeat").removeAttr('disabled');
      $("#user-form").attr('action', '/webmaster/admin/updateUser');
      $("#user-form").attr('method', 'POST');
    }
    $("#name-user").val(user.nombre);
    $("#apellido").val(user.apellido);
    $("#username").val(user.usuario);
    $("#password").val(user.clave);
    $("#admin").val(user.super_admin ? "admin" : "normal");
    $("#id-usuario").val(user.id);
    modal.modal("show");
  }

  function setDeleteModal(user) {
    showForm(userform);
    $("#name-user").attr('disabled', '');
    $("#apellido").attr('disabled', '');
    $("#username").attr('disabled', '');
    $("#password").attr('disabled', '');
    $("#password-repeat").attr('disabled', '');
    $("#user-form").attr('method', 'POST');
    $("#user-form").attr('action', '/webmaster/admin/deleteUser');
    $("#delete").show();
    $("#submit").hide();
    setEditModal(user, false);
  }

  function showForm(form) {
    form.removeClass('hide');
    form.addClass('show');
  }
});