$("document").ready(function() {
  const modal = $("#modalform");
  const inputFile = $("#imgProductInput");
  const productform = $("#productForm");

  $('.edit').on('click', function() {
    performAction(this);
  });

  $("#crear").on("click", function() {
    console.log('here');
    setCreateModal();
  })

  $('.delete').on('click', function() {
    performAction(this);
  }); 

  $('#submit').on('click', function () {
    const formTarget = $(".show form");
    console.log($(formTarget).attr('id'));     
    // doSubmit(formTarget);
  });

  $('#delete').on('click', function() {
    const formTarget = $(".show form");
    console.log(formTarget);
    doSubmit(formTarget);
  });

  function performAction(element) {
    const action = $(element).attr('edit') ? 'editar' : 'eliminar';
    const id = action === 'editar' ? $(element).attr('edit') : $(element).attr('delete');
    $.ajax({
      method:'get',
      url:'/webmaster/admin/getProductosbyId?id='+id,
      success: (data) => {
        var parsed = JSON.parse(data);
        if(action === 'editar') {
          $("#submit").show();
          $("#delete").hide();
          setEditModal(parsed.producto);
        } else {
          $("#submit").hide();
          $("#delete").show();
          setDeleteModal(parsed.producto);
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
    $("#precio").removeAttr('disabled');
    $("#descripcion").removeAttr('disabled');
    inputFile.removeAttr("disabled");
    $("#product-form").trigger('reset');
    $("#product-form").attr('action', '/webmaster/admin/createProduct');
    const img = document.getElementById("imgPreview");
    console.log(img);
    img.src = "http://localhost/webmaster/images/default.png";
    showForm(productform);
    $("#delete").hide();
    $("#submit").show();
    modal.modal("show");    
  }

  function setEditModal(producto, flag = true) {
    console.log(producto);
    showForm(productform);
    if(flag){
      $("#delete").hide();
      $("#submit").show();
      $("#name").removeAttr('disabled');
      $("#precio").removeAttr('disabled');
      $("#descripcion").removeAttr('disabled');
      $("#product-form").attr('action', '/webmaster/admin/updateProduct');
      $("#product-form").attr('method', 'POST');
    }
    const img = document.getElementById("imgPreview");
    img.src = producto.imagen;
    console.log(img);
    $("#name").val(producto.nombre);
    $("#precio").val(producto.precio);
    $("#descripcion").val(producto.descripcion);
    $("#id").val(producto.id);
    modal.modal("show");
  }

  function setDeleteModal(producto) {
    showForm(productform);
    $("#name").attr('disabled', '');
    $("#precio").attr('disabled', '');
    $("#descripcion").attr('disabled', '');
    $("#product-form").attr('method', 'POST');
    $("#product-form").attr('action', '/webmaster/admin/deleteProduct');
    inputFile.attr('disabled', '');
    $("#delete").show();
    $("#submit").hide();
    setEditModal(producto, false);
  }

  function showForm(form) {
    form.removeClass('hide');
    form.addClass('show');
  }

  inputFile.on('change', function(event) {
    console.log('here', event);
    let file = event.target.files[0];
    let reader = new FileReader();
    reader.onload = function(e) {
      console.log('onload', e)
      const img = document.getElementById("imgPreview");
      img.src = e.target.result;
    }
    reader.readAsDataURL(file);
  })
});