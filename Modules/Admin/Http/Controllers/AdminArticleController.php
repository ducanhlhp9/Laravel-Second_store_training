<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestArticle;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::whereRaw(1);
        if ($request->a_name) $articles->where('a_name', 'like', '%' . $request->a_name . '%');

        $articles = $articles->paginate(2);

        $viewData = [
            'articles' => $articles
        ];
        return view('admin::article.index', $viewData);
    }

    public function create()
    {
        return view('admin::article.create');

    }

    public function store(RequestArticle $requestArticle)
    {
        //Thêm vào cơ sở dữ liệu
        $this->InsertOrUpdate($requestArticle);
        return redirect()->back();
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin::article.update', compact('article'));// lấy danh mục cần update
    }

    public function update(RequestArticle $requestArticle, $id)
    {
        $this->InsertOrUpdate($requestArticle, $id);
        return redirect()->back();
    }

    // Thêm hoặc sửa danh mục
    public function InsertOrUpdate($requestArticle, $id = '')
    {
        $article = new Article();
        if ($id) {
            $article = article::find($id);
        }
        $article->a_name = $requestArticle->a_name;
        $article->a_slug = str_slug($requestArticle->a_name);
        $article->a_content = $requestArticle->a_content;
        $article->a_description = $requestArticle->a_description;
        $article->a_title_seo = $requestArticle->a_title_seo ? $requestArticle->a_title_seo : $requestArticle->a_name;
        $article->a_description_seo = $requestArticle->a_description_seo ? $requestArticle->a_description_seo : $requestArticle->a_description_seo;
        if ($requestArticle->hasFile('a_avatar')) {
            $file = upload_image('a_avatar');
            if (isset($file['name'])) {
                $article->a_avatar = $file['name'];
            }
        }
        $article->save();
    }

    // Xóa danh mục
    public function action($action, $id)
    {
        if ($action) {
            $article = article::find($id);
            switch ($action) {
                case 'delete':
                    $article->delete();
                    break;
                case 'active':
                    $article->a_active = $article->a_active ? 0 : 1;
                    $article->save();
                    break;
            }
        }
        return redirect()->back();
    }
}
