<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Student::query();
        return DataTables::of($projects)
        ->addColumn('action', function ($project) {
            
            $editBtn =  '
            
                        <div class="dropdown">
                            <button class="dropbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                </svg>
                            </button>
                            <div class="dropdown-content">
                                <a href="javascript:void(0)" onclick="editProject(' . $project->id . ')">Edit</a>
                                <a href="javascript:void(0)" onclick="destroyProject(' . $project->id . ')" >Delete</a>
                            </div>
                        </div>
                    ';

 
            // $editBtn =  '<button ' .
            //                 ' class="btn btn-outline-success" ' .
            //                 ' onclick="editProject(' . $project->id . ')">Edit' .
            //             '</button> ';
 
            // $deleteBtn =  '<button ' .
            //                 ' class="btn btn-outline-danger" ' .
            //                 ' onclick="destroyProject(' . $project->id . ')">Delete' .
            //             '</button> ';
 
            return $editBtn ;
        })
        ->rawColumns(
        [
            'action',
        ])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        request()->validate([
            'name' => 'required|max:255',
            'subject' => 'required|max:255',
            'marks'=>'required|numeric|min:0|max:99',
        ]);


        $valiExisting  = Student::where('name', $request->name)->where('subject', $request->subject )->count();


       if($valiExisting > 0 )
       {
        return response()->json(['message'=>'Student record already exists.'], 422);
       }


        
   
        $project = new Student();
        $project->name = $request->name;
        $project->subject = $request->subject;
        $project->marks = $request->marks;
        $project->save();
        return response()->json(['status'=>'Student Added successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Student::find($id);
        return response()->json(['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'name' => 'required|max:255',
            'subject' => 'required|max:255',
            'marks'=>'required|numeric|min:0|max:99',
        ]);


        $valiExisting  = Student::where('name', $request->name)->where('subject', $request->subject )->count();


        if($valiExisting > 0 )
        {
         return response()->json(['message'=>'Student record already exists.'], 422);
        }
   
        $project = Student::find($id);
        $project->name = $request->name;
        $project->subject = $request->subject;
        $project->marks = $request->marks;
        $project->save();
        return response()->json(['status'=>'Student Updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::destroy($id);
        return response()->json(['status'=>'Student Deleted successfully.']);
    }
}
