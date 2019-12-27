$(function () {
    var select = $('#data-table');
    var column = eval(select.attr('data-column'));
    var url = select.attr('data-url');

    $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: url,
        columns: column
    });

    $(document).on('click','#btn-modal',function(){
        $('#form-modal').removeAttr('data-id');
        $('#form-modal').find('input[name="id"]').remove();
        $('#form-modal').find('input[name="_method"]').remove();
        $('#title-status').html('Add');
        $('#form-modal').trigger("reset");
        $('#add').modal('show');
    })

    $('#form-modal').submit(function(e){
        e.preventDefault()
        var data = $(this).serialize();
        if( $('input[name="_method"]').val() !== undefined ){
            var url =  window.location.origin+window.location.pathname+"/"+$(this).attr('data-id');
        }else{
            var url =  window.location.origin+window.location.pathname;
        }
        $.ajax({
              type: 'POST',
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              url: url,
              data: data,
              beforeSend: function () {
                  $('button[type="submit"]').prop('disabled',true);
              },
              success: function (res) {
                $('#add').modal('hide');
                swal("Good job!", "", "success");
                setTimeout("location.reload()", 1000);
              }
          });
    })

    $(document).on('click','.show-data',function(){
        var id = $(this).attr('data');
        $('#add').modal('show');
        $.ajax({
            type: 'GET',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: window.location.origin+window.location.pathname+'/'+id+'/edit',
            beforeSend: function () {
                $('#form-modal').find('input[name="id"]').remove();
                $('#form-modal').find('input[name="_method"]').remove();
            },
            success: function (res) {
                // var key = Object.keys(res);
                // console.log(key);
                // $(key).each(function(a,b){
                //     console.log(res.b)
                // })
                $('#title-status').html('Edit');
                $('#form-modal').attr('data-id',res.id);
                $('#form-modal').append('<input type="hidden" name="id" value="'+id+'">');
                $('#form-modal').append('<input type="hidden" name="_method" value="PUT">');
                for (var key in res) {
                    if (res.hasOwnProperty(key)) {
                        // console.log(key + " -> " + res[key]);
                        $('input[name="'+key+'"]').val(res[key]);
                        $('select[name="'+key+'"]').val(res[key]);
                    }
                }
            }
        });
    });

    $(document).on('click','.del-data',function(){
        var id = $(this).attr('data');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: window.location.origin+window.location.pathname+'/'+id,
                    data: { '_method': 'DELETE' },
                    // beforeSend: function () {
                    // },
                    success: function (res) {
                        swal("Deleted!", "Your data has been deleted.", "success");
                        setTimeout("location.reload()", 1000);
                    }
                });
            } else {
                swal("Cancelled", "Your data is safe :)", "error");
            }
        });
    });

});