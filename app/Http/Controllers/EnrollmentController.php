<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Enrollment;
use Illuminate\View\View;
use App\Models\Batch;
use App\Models\Student;
class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $enrollments = Enrollment::all();
    
        foreach ($enrollments as $enrollment) {
            $enrollment->fee = $enrollment->batch->course->credits * 500000;
        }
    
        return view('enrollments.index', compact('enrollments'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batches = Batch::pluck('name', 'id'); 
        $students = Student::pluck('name', 'id'); 
    
        return view('enrollments.create', compact('batches', 'students'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Enrollment::create($input);
        return redirect('enrollments')->with('flash_message', 'enrollment Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enrollment = Enrollment::find($id);
        
        if (!$enrollment) {
            return redirect()->route('enrollments.index')->with('error', 'Enrollment not found');
        }
    
        // Tính lại phí dựa trên số tín chỉ
        $enrollment->fee = $enrollment->batch->course->credits * 500000;
    
        return view('enrollments.show', compact('enrollment'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enrollments = Enrollment::findOrFail($id);
        $batches = Batch::pluck('name', 'id');
        $students = Student::pluck('name', 'id');
    
        return view('enrollments.edit', compact('enrollments', 'batches', 'students'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $enrollments = Enrollment::find($id);
        $input = $request->all();
        $enrollments->update($input);
        return redirect('enrollments')->with('flash_message', 'enrollment Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message', 'enrollment deleted!'); 
    }
}
