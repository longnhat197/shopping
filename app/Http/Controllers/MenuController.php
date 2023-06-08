<?php

namespace App\Http\Controllers;

use App\Components\MenuRecursive;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    private $menuRecursive;
    public function __construct(MenuRecursive $menuRecursive){
        $this->menuRecursive = $menuRecursive;
    }
    public function index()
    {
        return view('menu.index');
    }

    public function create()
    {
        $htmlOption = $this->menuRecursive->menuRecursiveAdd();
        return view('menu.add',compact('htmlOption'));
    }
}
