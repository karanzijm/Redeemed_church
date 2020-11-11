<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\CongregationExport;
use App\Imports\CongregationImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Congregation;
use App\Student;
use Yajra\DataTables\Datatables;

class CongregationController extends Controller
{
    private $filter=null;
    public function __construct()
    {
        $this->middleware('auth',['except' => ['importExport']]);
        // $this->par = 'ka';
    }      
   
    public function importExport()
            {
                return view('generic.home');
            }

            public function export()
            {
                return Excel::download(new CongregationExport, 'Congregation.xlsx');
            }

            public function import()
            {
                // dd(request()->file('file'));
                Excel::import(new CongregationImport, request()->file('file'));

                return back();
            }

            //show all on the view
            public function showAll()
            {
                // $users = DB::table('congregations')->paginate('10');
                $users = Congregation::select('*')->where('status','1')->paginate(10);
                return view('view',['users' => $users]);

            
            
            }

            //edit
            public function edit($id, $action = null, Request $request){
                // dd($action);
                if($action != null){
                    $user = Congregation::find($id);
                    $user->name = $request->get('name');
                    $user->email = $request->get('email');
                    $user->contact = $request->get('contact');
                    $user->location = $request->get('location');
                    $user->home_cell = $request->get('home_cell');
                    $user->marital_status = $request->get('marital_status');
                    $user->no_of_children = $request->get('no_of_children');
                    $aa = $user->save();
                    return redirect('/getUsers');
                } else{
                    return view('edit',['user' => Congregation::find($id)]);

                }

            }

            public function delete($id){
                $user = Congregation::find($id);
                $user->status = 0;
                $user->save();
                return redirect('/getUsers');   
             }

            public function send()
            {
                $numbers = request('selected_values');
                if(!$numbers) 
                return redirect()
                ->back()
                ->withInput()
                ->withErrors('error', 'There was a failure while sending the message!');
            
                return view('numbers',['numbers' => $numbers]);     
            }

            public function sort()
            {
                $users = Congregation::sortable()->paginate(5);
                return view('view',['users' => $users]);

            }

            public function indexFiltering(Request $request)
             {
                    $filter = $request->query('filter');

                    if (!empty($filter)) {
                        $users = Congregation::sortable()
                            ->where('name', 'like', '%'.$filter.'%')
                            ->orWhere('email', 'like', '%'.$filter.'%')
                            ->orWhere('contact', 'like', '%'.$filter.'%')
                            ->orWhere('location', 'like', '%'.$filter.'%')
                            ->orWhere('home_cell', 'like', '%'.$filter.'%')
                            ->paginate(10);
                    } else {
                        $users = Congregation::sortable()
                            ->paginate(5);
                    }

                    return view('view')->with('users', $users)->with('filter', $filter);
                }

        public function indexDatatables()
        {
            return view('welcome');
        }

        public function index(Request $request){
            if ($request->ajax()) {
                $data = Congregation::latest()->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
          
            return view('welcome');
        }

        public function filters(Request $request){

            $this->filter = $request->input('filter');
            $paginate = $request->input('paginate');
            // $orQuery = 
            if (!empty($this->filter)) {
                // dd($this->par);
                $users = Congregation::select('*')
                    ->where('status',1)
                    ->where(function($query){
                        $query->where('name', 'like', '%'.$this->filter.'%')
                              ->orWhere('email', 'like', '%'.$this->filter.'%')
                              ->orWhere('contact', 'like', '%'.$this->filter.'%')
                              ->orWhere('location', 'like', '%'.$this->filter.'%')
                              ->orWhere('home_cell', 'like', '%'.$this->filter.'%');

                    })
                   
                    ->paginate($paginate);
            } else {
                $users = Congregation::select('*')->where('status',1)
                    ->paginate($paginate);
            }
            return view('view',['users'=>$users]);
        }

        public function userDataSource(Request $request) {

                ## Read value
                $draw = $request->get('draw');
                $start = $request->get("start");
                $rowperpage = $request->get("length"); // Rows display per page

                $columnIndex_arr = $request->get('order');
                $columnName_arr = $request->get('columns');
                $order_arr = $request->get('order');
                $search_arr = $request->get('search');

                $columnIndex = $columnIndex_arr[0]['column']; // Column index
                $columnName = $columnName_arr[$columnIndex]['data']; // Column name
                $columnSortOrder = $order_arr[0]['dir']; // asc or desc
                $searchValue = $search_arr['value']; // Search value

                // Total records
                $totalRecords = Congregation::select('count(*) as allcount')->count();
                $totalRecordswithFilter = Congregation::select('count(*) as allcount')
                                               ->where('name', 'like', '%' .$searchValue . '%')
                                               ->orWhere('email', 'like', '%'.$searchValue.'%')
                                                ->orWhere('contact', 'like', '%'.$searchValue.'%')
                                                ->orWhere('location', 'like', '%'.$searchValue.'%')
                                                ->orWhere('home_cell', 'like', '%'.$searchValue.'%')
                                               ->count();

                // Fetch records
                $records = Congregation::orderBy($columnName,$columnSortOrder)
                ->where('name', 'like', '%' .$searchValue . '%')
                ->orWhere('email', 'like', '%'.$searchValue.'%')
                ->orWhere('contact', 'like', '%'.$searchValue.'%')
                ->orWhere('location', 'like', '%'.$searchValue.'%')
                ->orWhere('home_cell', 'like', '%'.$searchValue.'%')
                ->select('*')
                ->skip($start)
                ->take($rowperpage)
                ->get();

                $data_arr = array();
                $sno = $start+1;
                foreach($records as $record){
                    $name = $record->name;
                    $email = $record->email;
                    $contact = $record->contact;
                    $location = $record->location;
                    $home_cell = $record->home_cell;

                    $data_arr[] = array(
                    "name" => $name,
                    "email" => $email,
                    "contact" => $contact,
                    "location" => $location,
                    "home_cell" => $home_cell,
                    );
                }

                $response = array(
                    "draw" => intval($draw),
                    "iTotalRecords" => $totalRecords,
                    "iTotalDisplayRecords" => $totalRecordswithFilter,
                    "aaData" => $data_arr
                );

                echo json_encode($response);
                exit;




            
            // var_dump($request);

            // $search = $request->query('search', array('value' => '', 'regex' => false));
            // $draw = $request->query('draw', 0);
            // $start = $request->query('start', 0);
            // $length = $request->query('length', 25);
            // $order = $request->query('order', array(1, 'asc'));        
        
            // $filter = $search['value'];
            // var_dump($filter);
        
            // $sortColumns = array(
            //     0 => 'name',
            //     1 => 'email',
            //     2 => 'contact',
            //     3 => 'location',
            //     4 => 'home_cell'
            // );
        
            // $query = Congregation::select('name', 'email', 'location', 'contact', 'home_cell', 'marital_status',
            // 'no_of_children');
            
                    
        
            // if (!empty($filter)) {
            //     $query->where('name', 'like', '%'.$filter.'%')
            //             ->orWhere('email', 'like', '%'.$filter.'%')
            //             ->orWhere('contact', 'like', '%'.$filter.'%')
            //             ->orWhere('location', 'like', '%'.$filter.'%')
            //             ->orWhere('home_cell', 'like', '%'.$filter.'%');
                
            // }
        
            // $recordsTotal = $query->count();
        
            // $sortColumnName = $sortColumns[$order[0]['column']];
        
            // $query->orderBy($sortColumnName, $order[0]['dir'])
            //         ->take($length)
            //         ->skip($start);
        
            // $json = array(
            //     'draw' => $draw,
            //     'recordsTotal' => $recordsTotal,
            //     'recordsFiltered' => $recordsTotal,
            //     'data' => [],
            // );
        
            // $users = $query->get();
        
            // foreach ($users as $user) {
        
            //     $json['data'][] = [
            //         $user->name,
            //         $user->email,
            //         $user->contact,
            //         $user->location,
            //         $user->home_cell,
            //         $user->marital_status,
            //         $user->no_of_children,
            //         view('welcome', ['users' => $users])->render(),
            //     ];
            // }
        
            // return $json;
        }
}
