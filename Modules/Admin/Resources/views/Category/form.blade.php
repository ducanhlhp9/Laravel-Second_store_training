<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" action="" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Tên danh mục</h5></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Tên danh mục"
                               value="{{old('Name',isset($category->c_name) ? $category->c_name : '')}}" name="Name">
                        @if($errors->has('Name'))
                            <div class="" error-text>
                                {{$errors->first('Name')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Icon</h5></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="fa fa-home"
                               value="{{old('icon',isset($category->c_icon) ? $category->c_icon : '')}}" name="icon">
                        @if($errors->has('icon'))
                            <div class="" error-text>
                                {{$errors->first('icon')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Meta Title</h5></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Meta title"
                               value="{{old('c_title_seo',isset($category->c_title_seo) ? $category->c_title_seo : '')}}"
                               name="c_title_seo">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Meta Description</h5></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Meta Description"
                               value="{{old('c_description_seo',isset($category->c_description_seo) ? $category->c_description_seo : '')}}"
                               name="c_description_seo">
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-checkbox">
                        <label>
                            <input type="checkbox" name="hot">Nổi bật
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Cập Nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
