<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Attribute_entry;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Multipule_choice;
use App\Models\Multiple_choice;
use App\Models\Multiple_choice_entry;
use App\Models\Log;

class MultipuleChoiceEntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::table('multiple_choice_entries as a')
            ->leftjoin('multiple_choices', 'multiple_choices.id', '=', 'a.multiple_choice_id')
            ->select('a.id','a.name','a.name_locale','multiple_choices.name as multiple_choice')
            ->get();
            return DataTables::of($data)->make(true);
        }

        $page_title = 'Multiple Choices Entries';
        $page_description = 'This page is to show all the records in multiple choice entries table';

        return view('multipule_choice_entries.index', compact('page_title', 'page_description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        //get attributes
        $multipule_choices = Multiple_choice::all();
        $page_title = 'Add New Multipule Choices Entry';
        $page_description = 'This page is to add new record in multipule choice entry table';

        return view('attributes_entries.create', compact('page_title', 'page_description','multipule_choices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required',  'max:255'],
            'name_locale' => ['required', 'max:255'],
            'attribute_id' => ['required'],
        ]);

        Multiple_choice_entry::create($request->all());

        return redirect()->action([self::class, 'index'])
                        ->with('success','Multiple_choice_entry created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
