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
        $i = 0;
        $list = $query->get();
        foreach ($list as $item){
            $html .=  '<li class="list-group-item"><div class="custom-control custom-switch"><input class="custom-control-input" id="' . $table . $i . '" type="checkbox" name="' . $ddtype . '[]" value="' . $item->code . ' "';
            foreach($has as $got){
                if($got[$index] == $item[$link])
                    $html .= ' checked';
            }
            $html .= '><label class="custom-control-label" for="' . $table . $i . '">' . $item->name . '</label></div></li>';
            $i++;
        }
        return $html;

    }


    public static function getdropdown($vars)
    {

        $list = [];
        if(!isset($vars['has']))
            $vars['has'] = '';

        $html = '<select name="' . $vars['name'] . '" class="custom-select';
        if(array_key_exists('classes', $vars)) { $html .= ' ' . $vars['classes']; } 
        $html .= '">';

        $query = $vars['model']::orderBy($vars['sort'], "asc");
        if(!is_null($vars['wherefield']) && isset($vars['whereval'])){
            $query->where($vars['wherefield'], $vars['whereval']);
        }
        $list = $query->get();

        $html .= '<option value=""></option>';
        foreach ($list as $item){
            $html .= '<option value="' . $item[$vars['link']] . '"';
            if($vars['has'] == $item[$vars['link']])
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
    public static function getStatusBadgeStyle($status){
            $class = "badge-primary";
            if($status == 'Already Voted On' || $status == 'Not Votable'  || $status == 'Withdrawn'){ $class = "badge-danger"; }
            if($status == 'Votable'){ $class = "badge-success"; }
            return $class;
    }

}