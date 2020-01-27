var editor_config = {
    path_absolute : "/",
    selector: "textarea.textEditor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
 
      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }
 
      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };
 
  tinymce.init(editor_config);

    // CATEGORY
    $(document).ready(function(){

        var result;
        var n;
        var j;

        $.ajax({
            type: 'GET',
            url: window.location.origin+"/administrator/management/post/create/categories",
            success: function (res) {
                $.each(res, function(key, val) {
                    $('#parent_cat').append($("<option></option>").attr("value",val.id).text(val.name));
                })
                result = res;
            }
        });

        $('#parent_cat').on('change', function(){
            
            let select = this.value;

            $('.sub-categories').remove();

            $('#tipe_jasa').empty().append('<option selected="Pilih Tipe Jasa" disabled>Pilih Tipe Jasa</option>');
            $.each(result, function(i, val) {
                if ( val.id == select ) {
                    n = i;
                    return;
                }
            });
            
            $('#category').append('<div class="col-md-4 sub-categories" data-ref="'+result[n].name+'"><select class="form-control sub" name="category" id="'+result[n].name+'"><option selected disabled>- Please Select -</option></select><div>');

            $.each(result[n].children_categories, function(key, val) {
                $('#'+result[n].name).append($("<option></option>").attr("value",val.id).text(val.name));
            })

        });

        $(document).on('change','.sub', function(){
            let select = this.value;

            if( j !== undefined ) $('div[data-ref="'+result[n].children_categories[j].name+'"]').remove();

            $.each(result[n].children_categories, function(i, val) {
                if ( val.id == select ) {
                    j = i;
                    return;
                }
            });
            
            $('#category').append('<div class="col-md-4 sub-categories" data-ref="'+result[n].children_categories[j].name+'"><select class="form-control" name="category" id="'+result[n].children_categories[j].name+'"><option selected disabled>- Please Select -</option></select><div>');

            $.each(result[n].children_categories[j].categories, function(key, val) {
                $('#'+result[n].children_categories[j].name).append($("<option></option>").attr("value",val.id).text(val.name));
            })

        });

    });