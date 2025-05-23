<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Provider::findOrFail($id);
        return view('company.show', compact(var_name: 'user'));
    }
}
