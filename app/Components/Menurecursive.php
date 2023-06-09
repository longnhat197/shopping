<?php

namespace App\Components;

use App\Models\Menu;

class MenuRecursive
{
    private $html;
    public function __construct()
    {
        $this->html = '';
    }

    public function menuRecursiveAdd($parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $item) {
            $this->html .= "<option value='" . $item->id . "'>" . $subMark . $item->name . "</option>";
            $this->menuRecursiveAdd($item->id, $subMark . '-- ');
        }
        return $this->html;
    }

    public function menuRecursiveEdit($parenIdMenuEdit, $parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $item) {
            if($parenIdMenuEdit == $item->id){
                $this->html .= "<option selected value='" . $item->id . "'>" . $subMark . $item->name . "</option>";
            }else{
                $this->html .= "<option value='" . $item->id . "'>" . $subMark . $item->name . "</option>";
            }

            $this->menuRecursiveEdit($parenIdMenuEdit,$item->id, $subMark . '-- ');
        }
        return $this->html;
    }
}
