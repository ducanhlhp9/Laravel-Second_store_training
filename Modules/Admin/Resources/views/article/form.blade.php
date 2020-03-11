<div class="card-body">
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Tên bài viết</h5></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder=""
                               value="{{old('a_name',isset($article->a_name) ? $article->a_name : '')}}"
                               name="a_name">
                        @if($errors->has('a_name'))
                            <div class="" error-text>
                                {{$errors->first('a_name')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Mô tả</h5></label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id ="a_description"placeholder="Mô tả"
                                  value="{{old('a_description',isset($article->a_description) ? $article->a_description : '')}}"
                                  name="a_description" id="" cols="80" rows="3"></textarea>
                        @if($errors->has('a_description'))
                            <div class="" error-text>
                                {{$errors->first('a_description')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Nội dung</h5></label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id ="a_content" placeholder="Nội dung"
                                  value="{{old('a_content',isset($article->a_content) ? $article->a_content : '')}}"
                                  name="a_content" id="" cols="80" rows="3"></textarea>
                        @if($errors->has('a_content'))
                            <div class="" error-text>
                                {{$errors->first('a_content')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Avatar</h5></label>
                    <div class="col-sm-3">
                        <input type="file" name="a_avatar" class="form-control">
                        @if($errors->has('a_avatar'))
                            <div class="" error-text>
                                {{$errors->first('a_avatar')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Meta Title</h5></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Meta title"
                               value="{{old('a_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '')}}"
                               name="a_title_seo">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><h5>Meta Description</h5></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Meta Description"
                               value="{{old('a_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '')}}"
                               name="a_description_seo">
                    </div>
                </div>
                <div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
@section('script')
    <script src ="{{asset('ckeditor/ckeditor.js')}}" ></script>
    <script>
        CKEDITOR.replace('a_content');
        CKEDITOR.replace('a_description');
    </script>
@stop
