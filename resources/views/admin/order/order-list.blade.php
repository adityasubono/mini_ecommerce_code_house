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
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
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
                                <th>Datetime</th>
                                <th>Invoice</th>
                                <th>Subtotal</th>
                                <th>Payment Metode</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->date_order}}</td>
                                    <td><a href="#" data-toggle="modal"
                                           data-target="#staticBackdrop{{$data->id}}">{{$data->invoice}}</a></td>
                                    <td>{{$data->subtotal}}</td>
                                    <td>{{$data->payment_method}}</td>
                                    <td>@if($data->status == 1)
                                            <b class="text-danger">{{ __('Belum Diterima') }}</b>
                                        @elseif($data->status == 2)
                                            <b class="text-success">{{ __('Sudah Diterima') }}</b>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success"><i class="fas fa-edit"></i>
                                            </button>
                                            <a href="/seller/invoice-order" type="button" class="btn btn-info"><i class="fas fa-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->

                                <div class="modal fade" id="staticBackdrop{{$data->id}}" data-backdrop="static"
                                     data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Status Order</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/seller/update-status" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="status">Status Order</label>
                                                        <select class="form-control" id="status" name="status">
                                                            <option selected>-- Choosse Status Order --</option>
                                                            <option value="1">Belum Terima Transaksi</option>
                                                            <option value="2">Terima Transaksi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                            class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Datetime</th>
                                <th>Invoice</th>
                                <th>Subtotal</th>
                                <th>Method Payment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>

@endsection
