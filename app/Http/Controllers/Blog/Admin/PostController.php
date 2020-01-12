<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Repositories\BlogPostRepository;

class PostController extends BaseAdminBlogController
{
    /** @var BlogPostRepository $blogCategoryRepository */
    private $blogPostRepository;
    private static $limitPerPage = 25;

    public function __construct()
    {
        parent::__construct();
        $this->blogPostRepository = app(BlogPostRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->blogPostRepository->getAllWithPaginate(self::$limitPerPage);

        return view('blog.admin.posts.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogPost();
        $categoryList = $this->blogCategoryRepository->getListForComboBox();
        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();
        if (empty($data['slug'])) {
            $data['slug'] = str_slug($data['title']);
        }
        $item = new BlogCategory($data);
        $item->save();
        if ($item) {
            return redirect()->route('blog.admin.categories.edit', $item->id)->with(['success' => "Успешно сохранено"]);
        } else {
            return back()->withErrors(['msg' => "Ошибка сохранения"])->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param BlogCategoryRepository $blogCategoryRepository
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(__METHOD__);
        $item = $this->blogPostRepository->getEdit($id);
        abort_unless($item->exists(), 404);
        $categoryList = $this->blogCategoryRepository->getListForComboBox();
        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $item = $this->blogCategoryRepository->getEdit($id);;

        // Update existed article
        if (empty($item)) {
            return back()->withErrors(['msg' => "Запись id = $id не найдена"])->withInput();
        }
        $data = $request->all();
        $result = $item->fill($data)->save();

        if ($result) {
            return redirect()->route('blog.admin.categories.edit', $item->id)->with(['success' => "Успешно сохранено"]);
        } else {
            return back()->withErrors(['msg' => "Ошибка сохранения"])->withInput();
        }
    }

    public function destroy()
    {
        dd(__METHOD__);
    }

}
