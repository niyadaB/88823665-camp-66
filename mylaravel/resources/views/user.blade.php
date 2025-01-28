@extends('layouts.default')

@section('content')
    <div class="layout-fixed sidebar-expand-lg">
        <div class="app-wrapper">

            @include('components.header')
            @include('components.menu')

            <main class="app-main">
                <!--begin::App Content Header-->
                <div class="app-content-header">
                  <!--begin::Container-->
                  <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                      <div class="col-sm-12"><h3 class="mb-0">User Tables</h3></div>
                      <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-end">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">User Tables</li>
                        </ol>
                      </div>
                    </div>
                    <!--end::Row-->
                  </div>
                  <!--end::Container-->
                </div>
                <!--end::App Content Header-->
                <!--begin::App Content-->
                <div class="app-content">
                  <!--begin::Container-->
                  <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card mb-12">
                          <div class="card-header"><h3 class="card-title">User Tables</h3></div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th style="width: 10px">#</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($users as $index => $user ){ ?>
                                <tr class="align-middle">
                                  <td>{{ $index + 1}}.</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td>
                                    <button class="btn btn-warning">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                  </td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-end">
                              <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                          </div>
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!--end::Row-->
                  </div>
                  <!--end::Container-->
                </div>
                <!--end::App Content-->
              </main>
              @include('components.footer')
        </div>
    </div>
@endsection
