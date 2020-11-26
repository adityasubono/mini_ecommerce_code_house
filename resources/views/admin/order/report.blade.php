@extends('layouts.admin')

@section('title', 'Order')

@section('content-wrapper')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{$page_name}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{$page_name}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Table Category</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Month</th>
                        <th>Total Income</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($report as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->date_order}}</td>
                            <td>Rp.{{ number_format($data->total,2)}}</td>
                        </tr>
                        @endforeach

                        <!-- Modal -->

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Month</th>
                        <th>Total Income</th>
                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.container-fluid -->
        </div>
    </div>


@endsection
