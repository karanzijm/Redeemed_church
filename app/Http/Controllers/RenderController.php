<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Congregation;
use Yajra\DataTables\DataTables;

class RenderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Congregation::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
            //     ->editColumn('selected', static function ($row) {
            //     return '<input type="checkbox" name="registrations[]"
            //     value="'.$row->id.'"/>';
            // })->rawColumns(['selected'])
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->addColumn('checkbox', function($row){
                    return '<input type="checkbox" name="selected_values[]" value="'.$row->id.'"/>';
                })
                ->rawColumns(['action','checkbox'])
                ->make(true);
        }

        return view('gyrocode');
    }

    public function get(Request $request)
    {

        if ($request->ajax()) {
            $search = $request->query('search', array('value' => '', 'regex' => false));
            $order = $request->query('order', array(1, 'asc'));

            $filter = $search['value'];

            $sortColumns = array(
                0 => 'congregation.name',
                1 => 'email',
                2 => 'column',
            );
            $data = Congregation::latest();
            if (!empty($filter)) {
                // var_dump($filter);exit();
                $data->where('email', 'like', '%kara%');
            }
            $data->get();
            return Datatables::of($data)->make(false);
        }

        return view('gyrocode');
    }

    public function send(){
        return view('import');
    }
}
