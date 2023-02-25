<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\AssignmentFilter;
use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Http\Requests\V1\StoreAssignmentRequest;
use App\Http\Requests\V1\UpdateAssignmentRequest;
use App\Http\Resources\V1\AssignmentCollection;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['abilities:assignment:create'])->only([
            'store'
        ]);
        $this->middleware(['abilities:assignment:update'])->only([
            'update'
        ]);
        $this->middleware(['abilities:assignment:delete'])->only([
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
        $filter = new AssignmentFilter();
        $queryItems = $filter->transform($request);
        
        if (count($queryItems) == 0){
            return new AssignmentCollection(Assignment::paginate());
        } else {
            $students = Assignment::where($queryItems)->paginate();
            return new AssignmentCollection($students->appends($request->query()));
        }

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
     * @param  \App\Http\Requests\StoreAssignmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssignmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssignmentRequest  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssignmentRequest $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }
}
