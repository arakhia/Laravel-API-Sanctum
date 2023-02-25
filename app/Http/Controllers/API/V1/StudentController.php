<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\StudentFilter;
use App\Http\Controllers\Controller;

use App\Models\Student;
use App\Http\Requests\V1\UpdateStudentRequest;
use App\Http\Requests\V1\StoreStudentRequest;
use App\Http\Resources\V1\StudentCollection;
use App\Http\Resources\V1\StudentResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['abilities:delete'])->only([
            'destroy'
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $filter = new StudentFilter();
        $queryItems = $filter->transform($request);
        
        // if the url has assignments=true
        $withAssignments = $request->query("assignments");

        $students = Student::where($queryItems);

        if($withAssignments){
            $students = $students->with('assignments');
        }

        return new StudentCollection($students->paginate()->appends($request->query()));

        // if (count($queryItems) == 0){
        //     return new StudentCollection(Student::paginate());
        // } else {
        //     $students = Student::where($queryItems)->paginate();
        //     return new StudentCollection($students->appends($request->query()));
        // } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        return new StudentResource(Student::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $withAssignments = request()->query("assignments");

        if($withAssignments){
            return new StudentResource($student->loadMissing('assignments'));
        }

        return new StudentResource($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            "message" => "The item was deleted successfully",
            "code" => 200
        ]);
    }

    /***
     * To get the token's user
     * dd(auth('sanctum')->user()->id);
     */
}
