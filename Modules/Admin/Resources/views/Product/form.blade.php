<div class="card-body">
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Loại Sản phẩm</h5></label>
                    <div class="col-sm-6">
                        <select name="pro_category_id" id="" class="form-control">
                            <option value="">---Chọn Loại Sản Phẩm---</option>
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}" {{old('pro_category_id',isset($product->pro_category_id) ? $product->pro_category_id : '') == $category->id ? "selected = 'selected'":""}}>{{$category->c_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Tên Sản phẩm</h5></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder=""
                               value="{{old('pro_name',isset($product->pro_name) ? $product->pro_name : '')}}"
                               name="pro_name">
                        @if($errors->has('pro_name'))
                            <div class="" error-text>
                                {{$errors->first('pro_name')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Giá Sản Phẩm</h5></label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" placeholder="9000000"
                               value="{{old('pro_price',isset($product->pro_price) ? $product->pro_price : '')}}"
                               name="pro_price">
                        @if($errors->has('pro_price'))
                            <div class="" error-text>
                                {{$errors->first('pro_price')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Khuyến Mãi</h5></label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control"
                               value="{{old('pro_sale',isset($product->pro_sale) ? $product->pro_sale : '')}}"
                               name="pro_sale">
                        @if($errors->has('pro_sale'))
                            <div class="" error-text>
                                {{$errors->first('pro_sale')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Số lượng</h5></label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control"
                               value="{{old('pro_number',isset($product->pro_number) ? $product->pro_number : '')}}"
                               name="pro_number">
                        @if($errors->has('pro_number'))
                            <div class="" error-text>
                                {{$errors->first('pro_number')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Mô tả</h5></label>
                    <div class="col-sm-6">
                        <textarea class="form-control " id ="pro_description" placeholder="Mô tả"
                                  value="{{old('pro_description',isset($product->pro_description) ? $product->pro_description : '')}}"
                                  name="pro_description" id="" cols="80" rows="3"></textarea>
                        @if($errors->has('pro_description'))
                            <div class="" error-text>
                                {{$errors->first('pro_description')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Nội dung</h5></label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id ="pro_content" placeholder="Nội dung"
                                  value="{{old('pro_content',isset($product->pro_content) ? $product->pro_content : '')}}"
                                  name="pro_content" id="" cols="80" rows="3"></textarea>
                        <script type="text/javascript">
                            CKEDITOR.config.filebrowserUploadUrl = '{!! route('admin.files.uploadImage', ['_token' => csrf_token()]) !!}';
                        </script>
                        @if($errors->has('pro_content'))
                            <div class="" error-text>
                                {{$errors->first('pro_content')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5></h5></label>
                    <div class="col-sm-3">
                        <img id="output_img" src="{{asset('images/default-image.jpg')}}" alt=""
                             style="width: 80px;height: 80px">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Avatar</h5></label>
                    <div class="col-sm-3">
                        <input type="file" id="input_img" name="pro_avatar" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Meta Title</h5></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Meta title"
                               value="{{old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '')}}"
                               name="pro_title_seo">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Meta Description</h5></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Meta Description"
                               value="{{old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '')}}"
                               name="pro_description_seo">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="custom-checkbox">
                        <label>
                            <input type="checkbox" name="hot">Nổi bật
                        </label>
                    </div>
                </div>
                <div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Cập Nhật</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
@section('script')
    <script src ="{{asset('ckeditor/ckeditor.js')}}" ></script>
    <script>
        CKEDITOR.replace('pro_description');
        CKEDITOR.replace('pro_content');
    </script>
@stop
