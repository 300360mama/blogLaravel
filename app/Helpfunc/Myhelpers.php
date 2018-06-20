<?php
namespace App\Helpfunc;

use Illuminate\Support\Facades\DB;

/**
 *
 */
class Myhelpers
{

    public static function get_foreign_table( array $key_table, $preg='~([a-zA-Z0-9]+)?_id$~'){

        $list_table = [];

        foreach($key_table as $table){
            $res_match = preg_match($preg, $table, $matches);


            if($res_match){
                $len_str = strlen($matches[1]);
                $first_sym = substr($matches[1], -1) === 'y' ? substr($matches[1], 0, $len_str-1) : $matches[1];
                $end_sym = substr($matches[1], -1) === 'y' ? 'ies' : 's';

                $list_table[$table] = $first_sym.$end_sym;
            }

        }

        return $list_table;


    }


    public static function get_select_key(array $list_foreign_table){
        $res = [];

        foreach ($list_foreign_table as $table) {
            $query =  DB::select("SELECT id, name FROM $table");
            $res[$table] = $query;

        }

        return $res;


    }


    public static function is_empty(array $data){

        if(empty($data)) return false;

        $res = true;

        foreach ($data as $key => $value) {
            $res = $res && $value;
        }

        return $res;
    }
}
