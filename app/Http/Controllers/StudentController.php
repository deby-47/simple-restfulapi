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

        return response()->json([
            "message" => "Data successfully created"
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        $student->save();
        
        return response()->json([
            "message" => "Data successfully updated"
        ], 201);
    }

    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();

        return response()->json([
            "message" => "Data successfully deleted"
        ], 201);;
    }

    public function getStudent($id)
    {
        if (Student::where('id', $id)->exists())
        {
            $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        } else {
            return response()->json([
                "message" => "Data not found"
            ], 404);
        }
    }
}
