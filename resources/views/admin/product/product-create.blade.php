@extends('layouts.admin')

@section('title', 'Category')

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

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{$page_name}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="/seller/product-store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name Product</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       placeholder="Example : Sayur Sawi"
                                       value="{{old('name')}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                         </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Select Category Product</label>
                                <select name="category"
                                        id="category"
                                        class="form-control select2bs4 @error('category') is-invalid @enderror"
                                        style="width: 100%;">
                                    <option selected="selected" disabled>-- Choose category Product --</option>
                                    @foreach($category as $data)
                                        @if(old('category') == $data->id)
                                            <option value="{{old('category')}}" selected>{{$data->name}}</option>
                                        @else
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="info_product">Information Products</label>
                                <textarea class="form-control @error('info_product') is-invalid @enderror"
                                          rows="3"
                                          id="info_product"
                                          name="info_product"
                                          placeholder="Enter ...">{{old('info_product')}}</textarea>
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="benefit">Benefit Products</label>
                                <textarea class="form-control @error('benefit') is-invalid @enderror"
                                          rows="3"
                                          id="benefit"
                                          name="benefit"
                                          placeholder="Enter ...">{{old('benefit')}}</textarea>
                                @error('benefit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="storage">Storage Way</label>
                                <textarea class="form-control @error('storage') is-invalid @enderror"
                                          rows="3"
                                          id="storage"
                                          name="storage"
                                          placeholder="Enter ...">{{old('storage')}}</textarea>
                                @error('storage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <input type="text"
                                       class="form-control @error('weight') is-invalid @enderror"
                                       id="weight"
                                       name="weight"
                                       placeholder="Example 225 - 275 gram/pack"
                                       value="{{old('weight')}}">
                                @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text"
                                           class="form-control @error('price') is-invalid @enderror"
                                           id="price"
                                           name="price"
                                           placeholder="Example Rp.18.000"
                                           value="{{old('price')}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="volume">Volume</label>
                                <input type="text"
                                       class="form-control @error('volume') is-invalid @enderror"
                                       id="volume"
                                       name="volume"
                                       placeholder="Example 100/gram"
                                       value="{{old('volume')}}">
                                @error('volume')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <div class="input-group">
                                    <input type="text"
                                           class="form-control @error('discount') is-invalid @enderror"
                                           id="discount"
                                           name="discount"
                                           placeholder="Example 10%"
                                           value="{{old('discount') ?? 0}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                    @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number"
                                       class="form-control @error('stock') is-invalid @enderror"
                                       id="stock"
                                       name="stock"
                                       placeholder="Example 40 units"
                                       value="{{old('stock') ?? 0}}">
                                @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="custom-file">
                                    <input type="file"
                                           class="custom-file-input @error('image') is-invalid @enderror"
                                           name="image"
                                           id="imgInp" value="{{old('image')}}">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <img src="{!!asset('assets/AdminLTE/dist/img/noimage.png')!!}"
                                 class="img-fluid img-thumbnail"
                                 alt="Responsive image"
                                 id="blah"
                                 style="width: 700px; height: 450px">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });

    </script>
@endsection
