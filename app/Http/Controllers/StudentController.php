<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // show data
    public function index()
    {
        return Student::all();
    }

    public function create(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->address = $request->address;
        $student->save();

        return 'Data successfully created';
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        $student->save();

        return 'Data successfully updated';
    }

    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();

        return 'Data successfully deleted';
    }
}
