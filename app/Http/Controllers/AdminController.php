<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpfunc\Myhelpers as Help;

class AdminController extends Controller
{

    protected $quantityRow = 5;
    protected $updateRowForbidden = ['id', 'created_at', 'updated_at', 'remember_token'];
    protected $defaultTable = 'articles';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $db = env('DB_DATABASE');
        $key = 'Tables_in_'.$db;
        $exclude_table = ["migrations", "password_resets"];

        $tables = DB::select('SHOW TABLES FROM '.$db);

        $list_tables = [];

        foreach ($tables as $table) {

            if(in_array($table->$key, $exclude_table)) continue;
            $list_tables[] = $table->$key;

        }



        return view('admin.crud.show_tables', ['tables'=>$list_tables, 'db'=>$db]);
    }

    public function read(Request $request){

        $table = $request->table ? $request->table : $this->defaultTable;
        $list_data = DB::table($table)->paginate($this->quantityRow);
        $columns = DB::select("SHOW COLUMNS FROM $table");

        return view('admin.crud.read', ['table'=>$table, 'list_data'=>$list_data, 'columns'=>$columns]);
    }

    public function delete(Request $request){

        $table = $request->table ? $request->table : $this->defaultTable;
        $row_id = $request->row_id ? $request->row_id : 1;
        $page = $request->page ? $request->page : 1;
        $offset = ($page-1)*$this->quantityRow + 1;


        $delete = DB::table($table)->where('id',  '=', $row_id)->delete();
        $list_data = DB::table($table)->orderBy('created_at')->offset($offset)->paginate($this->quantityRow);
        $columns = DB::select("SHOW COLUMNS FROM $table");


        if($request->ajax()){
            if($delete) return view('admin.crud.table_read', ['table'=>$table,
             'list_data'=>$list_data,
             'columns'=>$columns]) ;
        }else{

            $get_path = 'admin/'.$table.'/read?page='.$page;
            return redirect($get_path);
        }



    }

    public function update(Request  $request){
        $table = $request->table ? $request->table : $this->defaultTable;
        $row_id = $request->row_id ? $request->row_id : 1;
        $update_row = (array) DB::table($table)->where('id',  '=', $row_id)->first();

        $key = array_keys($update_row);
        $select_row = Help::get_foreign_table($key);
        $select_key = Help::get_select_key($select_row);
        dump(date('Y-m-d',time()));


        return view('admin.crud.update', ['update_row'=>$update_row, 'select_row'=>$select_row,
                                          'select_key'=>$select_key, 'update_row_forbidden'=>$this->updateRowForbidden,
                                          'table'=>$table

                                      ]);
    }

    public function save(Request $request){

        $table = $request->table ? $request->table : 'articles';
        $id = $request->id ? $request->id : 1;
        $update_arr=  [];
        if(!empty($_POST)){
            $update_arr = $_POST;
            if(key_exists('_token', $update_arr)) unset($update_arr['_token']);
            $update_arr['updated_at'] = date('Y-m-d', time());
        }

        $update = DB::table($table)->where('id', $id)->update($update_arr);


        return redirect()->route('admin_update', ['table'=>$table, 'row_id'=>$id]);
    }

    public function add(Request $request){

        $table = $request->table ? $request->table : $htis->defaultTable;
        $fields = DB::select("SHOW COLUMNS FROM $table");
        $columns = [];

        foreach($fields as $field){
            $columns[] = $field->Field;
        }

        // dump($columns);
        $select_row = Help::get_foreign_table($columns);
        $select_key = Help::get_select_key($select_row);
        // dump($select_row);
        // dump($select_key);


        return view('admin.crud.create', ['columns'=>$columns, 'update_row_forbidden'=>$this->updateRowForbidden,
                                          'table'=>$table, 'select_row'=>$select_row,'select_key'=>$select_key]);

    }

    public function insert(Request $request){

        $table = $request->table ? $request->table : $this->defaultTable;
        $data_to_insert = [];

        if(!empty($_POST)) $data_to_insert = $_POST;
        if(key_exists('_token', $data_to_insert)) unset($data_to_insert['_token']);
        if(key_exists('insert', $data_to_insert)) unset($data_to_insert['insert']);

        $empty = Help::is_empty($data_to_insert);


        if(!$empty){
            $request->session()->flash('error_msg', 'Заполните все поля!!');
            return redirect()->route('admin_add', ['table'=>$table]);
        }

         $insert = DB::table($table)->insert($data_to_insert);
         return redirect()->route('admin_read', ['table'=>$table]);


     }
}
