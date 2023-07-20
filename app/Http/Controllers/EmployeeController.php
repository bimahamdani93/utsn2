<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!Auth::check() || auth()->user()->role !== 'admin') {
            return redirect()->route('welcome')->with('message', 'Anda bukan admin');
        }
        $pageTitle = 'Employee List';

        // RAW SQL QUERY
        $employees = DB::select('
            SELECT *
            FROM employees
        ');

        return view('employee.index', [
            // 'pageTitle' => $pageTitle,
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('welcome')->with('message', 'Anda bukan admin');
        }
        $pageTitle = 'Create Employee';
        // RAW SQL Query
        return view('employee.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka',
            'min' => ':Attribute minimal :min karakter',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'nohp' => 'required|min:12',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // INSERT QUERY
        DB::table('employees')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'nohp' => $request->nohp,
        ]);

        return redirect('/welcome')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Employee Detail';

        // RAW SQL QUERY
        $employee = collect(DB::select('
            SELECT *
            FROM employees
            WHERE id = ?
        ', [$id]))->first();

        return view('employee.show', compact('pageTitle', 'employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();

        // ...
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka',
            'min' => ':Attribute minimal :min karakter',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'nohp' => 'required|min:10',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        DB::table('employees')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'nohp' => $request->nohp,
            ]);

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // QUERY BUILDER
        DB::table('employees')
            ->where('id', $id)
            ->delete();

        return redirect()->route('employees.index');
    }
}
