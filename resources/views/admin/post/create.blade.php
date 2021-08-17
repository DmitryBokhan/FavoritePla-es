@extends('layouts.admin_layout')

@section('title', 'Добавить статью')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Добавить статью</h1>
         </div><!-- /.col -->
      </div><!-- /.row -->
      @if (session('success'))
      <div class="alert alert-success" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
      </div>
      @endif
   </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-12">
            <div class="card card-primary">
               <!-- form start -->
               <form action="{{ route('post.store') }}" method="POST">
                  @csrf
                  <div class="card-body">
                     <div class="form-group">
                        <label for="newCategoryName">Название статьи</label>
                        <input type="text" class="form-control" id="newCategoryName" name="title"
                           placeholder="Название статьи" required>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <label>Категория</label>
                              <select multiple="multiple" id="bootstrap-duallistbox-nonselected-list_category"
                                 name="selected_category[]" style="height: 102px;" required>
                                 @foreach ($categories as $category)
                                 <option value="{{ $category->id }}">{{ $category->title }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                     </div>
                     <!-- /.row -->
                  </div>
                  <div class="card-body">
                     <div class="form-group">
                        <textarea name="text_post" id="editor-body" class="form-control" style="height: 300px;">
                     </textarea>
                     </div>
                  </div>
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Добавить</button>
                  </div>
               </form>
            </div>
         </div>

      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
         <!-- Left col -->
         <section class="col-lg-7 connectedSortable">


            <!-- /.card -->
         </section>
         <!-- /.Left col -->
         <!-- right col (We are only adding the ID to make the widgets sortable)-->
         <section class="col-lg-5 connectedSortable">

         </section>
         <!-- right col -->
      </div>
      <!-- /.row (main row) -->
   </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@push('link')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
   integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
   // //Инициализируем HTML редактор Summernote
   //    $(document).ready(function() {
   //       $('#seditor-body').summernote({
   //          lang: 'ru-RU', // default: 'en-US'
   //          tabsize: 2,
   //          height: 200,
   //          popover: {
   //             image: [
   //                // This is a Custom Button in a new Toolbar Area
   //                ['custom', ['examplePlugin']],
   //                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
   //                ['float', ['floatLeft', 'floatRight', 'floatNone']],
   //                ['remove', ['removeMedia']]
   //             ]
   //          }
   //       });
   //    });


$(document).ready(function () {

   $(document).ready(function () {
      var editor = $('#editor-body');
      
      var configFull = {
      lang: 'ru-RU', // default: 'en-US'
      shortcuts: false,
      airMode: false,
      minHeight: 300, // set minimum height of editor
      maxHeight: null, // set maximum height of editor
      focus: false, // set focus to editable area after initializing summernote
      disableDragAndDrop: false,
      callbacks: {
      onImageUpload: function (files) {
      uploadFile(files);
      },

      onMediaDelete: function ($target, editor, $editable) {

      var fileURL = $target[0].src;
      deleteFile(fileURL);

      // remove element in editor
      $target.remove();
      }
   }
};

// Featured editor
editor.summernote(configFull);

// Upload file on the server.
function uploadFile(filesForm) {
   formData = new FormData();
   
   
   // Add all files from form to array.
   for (var i = 0; i < filesForm.length; i++) {
      formData.append('files[]', filesForm[i]);
   }


   $.ajax({
      data: formData,
      type: "POST",
      url: "/upload",
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      cache: false,
      contentType: false,
      processData: false,
      success: function (images) {
      console.log("GOOD!");
      console.log(images);

      // If not errors.
      if (typeof images['error'] == 'undefined') {
         // Get all images and insert to editor.
         for (var i = 0; i < images['URL'].length; i++) {
            editor.summernote('insertImage', images['URL'][i], function ($image) {
            //$image.css('width', $image.width() / 3);
            //$image.attr('data-filename', 'retriever')
            });
         }
      }else {
      // Get user's browser language.
         var userLang = navigator.language || navigator.userLanguage;

         if (userLang == 'ru-RU') {
            var error = 'Ошибка, не могу загрузить файл! Пожалуйста, проверьте файл или ссылку. ' +
            'Изображение должно быть не менее 500px!';
         }else {
            var error = 'Error, can\'t upload file! Please check file or URL. Image should be more then 500px!';
         }

         alert(error);
      }
   }
});
}

// Delete file from the server.
function deleteFile(file) {
   data = new FormData();
   data.append("file", file);
   $.ajax({
      data: data,
      type: "POST",
      url: "/admin_panel/post/store",
      cache: false,
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      // headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      contentType: false,
      processData: false,
      success: function (image) {
      //console.log(image);
      }
   });
}

});

});

</script>
@endpush