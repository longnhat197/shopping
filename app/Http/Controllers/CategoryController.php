<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.category.add', compact('htmlOption'));
    }


    public function index()
    {
        $categories = $this->category->latest()->paginate(8);
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {

        try {
            $data = [
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name)
            ];
            $this->category->create($data);
        } catch (\Exception $err) {
            return redirect('admin.category')->with('error', $err->getMessage());
        }

        return redirect('admin.category')->with('success', 'Thêm mới danh mục thành công');
    }

    public function getCategory($parentId){
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);
        return $htmlOption;
    }

    public function edit($id){

        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit',compact('category','htmlOption'));
    }

    public function update($id, Request $request){
        try {
            $data = [
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name)
            ];
            $this->category->find($id)->update($data);
        } catch (\Exception $err) {
            return redirect('admin.category')->with('error', $err->getMessage());
        }

        return redirect('admin.category')->with('success', 'Update danh mục thành công');
    }

    public function delete($id){
        try{
            $category = $this->category->find($id);
            $this->category->find($id)->delete();
        }catch (\Exception $err){
            return redirect('admin.category')->with('error', $err->getMessage());
        }
        return redirect('admin.category')->with('success', 'Xoá danh mục '. $category->name . ' thành công');
    }
}
