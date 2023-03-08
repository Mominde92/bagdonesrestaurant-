<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Attribute_entry;
use App\Models\Compulsory_choice;
use App\Models\Compulsory_choice_entry;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Log;

class CompulsoryChoiceEntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::table('compulsory_choice_entries as a')
            ->leftjoin('compulsory_choices', 'compulsory_choices.id', '=', 'a.compulsory_choice_id')
            ->select('a.id','a.name','a.name_locale','compulsory_choices.name as compulsory_choice')
            ->get();
            return DataTables::of($data)->make(true);
        }

        $page_title = 'Compulsory Choice Entries';
        $page_description = 'This page is to show all the records in Compulsory Choice entries table';

        return view('compulsory_choice_entries.index', compact('page_title', 'page_description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        //get attributes
        $compulsory_choices = Compulsory_choice::all();
        $page_title = 'Add New Compulsory Choice Entry';
        $page_description = 'This page is to add new record in Compulsory Choice entry table';

        // return view('attributes_entries.store', compact('page_title', 'page_description','attributes'));
        return view('compulsory_choice_entries.create', compact('page_title', 'page_description','compulsory_choices'));
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
            'compulsory_choice_id' => ['required'],
        ]);

        Compulsory_choice_entry::create($request->all());

        return redirect()->action([self::class, 'index'])
                        ->with('success','Compulsory_choice_entry created successfully.');
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
