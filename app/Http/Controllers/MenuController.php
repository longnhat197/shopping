<?php

namespace App\Http\Controllers;

use App\Components\MenuRecursive;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    //
    private $menuRecursive;
    private $menu;
    public function __construct(MenuRecursive $menuRecursive, Menu $menu){
        $this->menuRecursive = $menuRecursive;
        $this->menu = $menu;
    }
    public function index()
    {
        $menus = $this->menu->latest()->paginate(8);
        return view('menu.index',compact('menus'));
    }

    public function create()
    {
        $htmlOption = $this->menuRecursive->menuRecursiveAdd();
        return view('menu.add',compact('htmlOption'));
    }

    public function store(Request $request){
        try{
            $data = [
                'name' => $request->name,
                'parent_id'=>$request->parent_id,
                'slug' => Str::slug($request->name)
            ];
            $this->menu->create($data);
        }catch(\Exception $err){
            return redirect('menu')->with('error',$err->getMessage());
        }
        return redirect('menu')->with('success','Thêm mới menu thành công');
    }

    public function edit($id){
        $menu = $this->menu->find($id);
        $htmlOption = $this->menuRecursive->menuRecursiveEdit($menu->parent_id);
        return view('menu.edit',compact('menu','htmlOption'));
    }

    public function update($id,Request $request){
        try {
            $data = [
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name)
            ];
            $this->menu->find($id)->update($data);
        } catch (\Exception $err) {
            return redirect('menu')->with('error', $err->getMessage());
        }

        return redirect('menu')->with('success', 'Update menu thành công');
    }
}
