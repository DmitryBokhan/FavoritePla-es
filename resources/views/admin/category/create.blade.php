@extends('layouts.admin_layout')

@section('title', 'Добавить категорию')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Добавить категорию</h1>
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
               <form action="{{ route('category.store') }}" method="POST">
                  @csrf
                  <div class="card-body">
                     <div class="form-group">
                        <label for="newCategoryName">Название категории</label>
                        <input type="text" class="form-control" id="newCategoryName" name="title"
                           placeholder="Название категории" required>
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