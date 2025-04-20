<?php
namespace App\Http\Controllers;

use App\Models\DeletedStudent;
use App\Models\Student;
use Illuminate\Http\Request;

// Make sure to import the Worker model

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function forms()
    {
        return view('admin.form');
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $incomingRegister = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255',
            'password'   => 'required|string|min:5|max:50',
            'number'     => 'nullable|string|max:11',
        ]);

        try {
            // Hash the password
            $incomingRegister['password'] = bcrypt($incomingRegister['password']);

            // Create student
            Student::create($incomingRegister);

            return redirect()->back()->with('success', 'Student registered successfully!');
        } catch (\Exception $e) {
                             // Log the error and show message
            \Log::error($e); // Logs error to storage/logs/laravel.log

            return redirect()->back()->with('error', 'Failed to register student: ' . $e->getMessage());
        }
    }

    public function tables()
    {
        // Fetch all active students
        $students = Student::all();

        // Fetch all deleted students
        $deletedStudents = DeletedStudent::all();

        // Pass both students and deleted students data to the view
        return view('admin.tables', compact('students', 'deletedStudents'));
    }

    public function update(Request $request)
    {
        $student = Student::findOrFail($request->id);
        $student->update($request->only(['first_name', 'last_name', 'password', 'email', 'number']));

        return redirect()->back()->with('success', 'Student updated!');
    }

    public function remove(Request $request)
    {
        $student = Student::findOrFail($request->id);

        // Log the student information for debugging
        \Log::info('Deleting student:', ['id' => $student->id]);

        DeletedStudent::create([
            'first_name' => $student->first_name,
            'last_name'  => $student->last_name,
            'password'   => $student->password,
            'email'      => $student->email,
            'number'     => $student->number,
            'created_at' => $student->created_at,
            'updated_at' => $student->updated_at,
            'deleted_at' => now(),
        ]);

        // Remove from original students table
        $student->delete();

        return redirect()->back()->with('success', 'Student moved to deleted list.');
    }

    public function restore(Request $request)
    {
        // Find the deleted student by ID
        $deletedStudent = DeletedStudent::findOrFail($request->id);

        Student::create([
            'first_name' => $deletedStudent->first_name,
            'last_name'  => $deletedStudent->last_name,
            'password'   => $deletedStudent->password,
            'email'      => $deletedStudent->email,
            'number'     => $deletedStudent->number,
            'created_at' => $deletedStudent->created_at,
            'updated_at' => $deletedStudent->updated_at,
        ]);

        // Optionally, delete the record from the deleted_students table
        $deletedStudent->delete();

        return redirect()->back()->with('success', 'Student restored successfully!');
    }

    public function delete(Request $request)
    {
                                                             // Find the student by ID and delete it
        $student = DeletedStudent::findOrFail($request->id); // Assuming you have a DeletedStudent model
        $student->delete();                                  // This will delete the record from the database

        return redirect()->back()->with('success', 'Student deleted successfully.');
    }

}
