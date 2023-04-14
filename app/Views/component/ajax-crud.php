function crud() {
    $.ajax({
      url: window.location.href + '/show',
      dataType: "json",
      success: function(response) {
        $('#tabel').html(response.tabel);
        $('#modal').html(response.modal);

        $('#tabel').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });

        $('.form-add').submit(function(e) {
        e.preventDefault();
        $.ajax({
          type: "post",
          url: window.location.href + '/save',
          data: $(this).serialize(),
          dataType: "json",
          beforeSend: function() {
            $('.btn-save').attr('disable', 'disabled');
            $('.btn-save').html('<i class="fas fa-spin fa-spinner"></i>');
          },
          complete: function() {
            $('.btn-save').removeAttr('disable');
            $('.btn-save').html('Save');
          },
          success: function(response) {
            if (response.error) {
              if (response.error.name) {
                $('#name').addClass('is-invalid');
                $('.errorName').html(response.error.name);
              } else {
                $('#name').removeClass('is-invalid');
                $('.errorName').html('');
              }
            } else {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.success,
                showConfirmButton: false,
                timer: 1800
              })

              $('input').val('')
              $('.modal').modal('hide');
              crud()
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
      return false;
    })
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      }
    })
  }

  function deletes(id) {
              Swal.fire({
                title: 'Anda Yakin?',
                text: `Data yang dipilih akan dihapus!`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
              }).then((result) => {
                if (result.value) {
                  $.ajax({
                    type: "post",
                    url: window.location.href + '/delete',
                    data: {
                      id: id
                    },
                    dataType: "json",
                    success: function(response) {
                      if (response.output) {
                        Swal.fire({
                          icon: 'success',
                          title: 'Deleted',
                          text: response.output,
                        });
                        crud();
                      }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                  });
                }
              });
            }