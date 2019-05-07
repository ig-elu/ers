<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
    public static function getcheckboxlist($ddtype, $table, $sortfield, $has, $index, $link, $wherefield, $whereval)
    {

        $list = array();

        $html = '';
        $query = $table::orderBy($sortfield, "asc");
        if(!is_null($wherefield) && isset($whereval)){
            $query->where($wherefield, $whereval);
        }
        $list = $query->get();
        foreach ($list as $item){
            $html .=  '<li class="list-group-item borderless"><input type="checkbox" name="' . $ddtype . '[]" value="' . $item->code . ' "';
            foreach($has as $got){
                if($got[$index] == $item[$link])
                    $html .= ' checked';
            }
            $html .= '> ' . $item->name . '</li>';
        }
        return $html;

    }

    public static function getdropdown($ddtype, $table, $sortfield, $has, $index, $link, $wherefield, $whereval)
    {
        $list = [];
        if(!isset($has))
            $has = '';

        $html = '<select name="' . $ddtype . '">';

        $query = $table::orderBy($sortfield, "asc");
        if(!is_null($wherefield) && isset($whereval)){
            $query->where($wherefield, $whereval);
        }
        $list = $query->get();

        $html .= '<option value=""></option>';
        foreach ($list as $item){
            $html .= '<option value="' . $item[$link] . '"';
            if($has == $item[$link])
                $html .= ' selected';

            $html .= '> ' . $item->name . '</option>';
        }

        $html .= '</select>';

        return $html;

    }

    public static function reconcileLinkedTable($id, $idfield, $selected, $table, $selectfield)
    {

        $has = $table::where($idfield, $id)->select([$selectfield])->get();

        $list = [];
        $remove = [];
        $add = [];

        foreach($has as $got){
            array_push($list, $got->$selectfield);
        }
        // compare checked to has - if in has, but not checked, remove
        // if in checked but not has, add

        if(isset($selected) && isset($list)){
            $remove = array_diff($list, $selected);
        }else{
            $remove = $list;
        }
        if(isset($list) && isset($selected)){
            $add = array_diff($selected, $list);
        }else{
            $add = $selected;
        }

        $adding = [];
        foreach($add as $ad){
            array_push($adding, array($idfield => $id, $selectfield => $ad));
        }

        if(isset($remove))
            $r = $table::where($idfield, $id)->whereIn($selectfield, $remove)->delete();

        if(isset($add))
            $a = $table::insert($adding);

    }
}