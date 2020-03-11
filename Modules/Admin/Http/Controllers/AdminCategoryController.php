<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\category;
use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = category::paginate(4);
        $viewData =[
          'categories'=>$categories
        ];
        return view('admin::Category.index',$viewData);
    }
    public function create()
    {
        return view('admin::Category.create');

    }
    public function store(RequestCategory $requestCategory){
        //Thêm vào cơ sở dữ liệu
        $this->InsertOrUpdate($requestCategory);
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id){
        $category   =category::find($id);
        return view('admin::Category.update',compact('category'));// lấy danh mục cần update
    }
    public function update(RequestCategory $requestCategory, $id){

        $this->InsertOrUpdate($requestCategory,$id);
        return redirect()->back();
    }
    // Thêm hoặc sửa danh mục
    public function InsertOrUpdate($requestCategory,$id =''){
        $code =1;
        try{
            $category                       =   new Category();
            if($id)
            {
                $category = category::find($id);
            }
            $category->c_name               =   $requestCategory->Name;
            $category->c_icon               =   $requestCategory->icon;
            $category->c_slug               =   str_slug($requestCategory->Name);
            $category->c_title_seo          =   $requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->Name;
            $category->c_description_seo    =   $requestCategory->c_description_seo;
            $category->save();
        }catch (\Exception $exception){
            $code = 0;
            Log::error("[erorr InsertOrUpdate Category]").$exception->getMessage();
        }
        return $code;
    }
    // Xóa danh mục
    public function action( $action, $id){
        if($action)
        {
            $category = category::find($id);
            switch ($action){
                case 'delete':
                    $category->delete();
                    break;
                case 'active':
                    $category->c_active = $category->c_active ? 0: 1;
                    $category->save();
                    break;
            }
        }
        return redirect()->back();
    }
}
