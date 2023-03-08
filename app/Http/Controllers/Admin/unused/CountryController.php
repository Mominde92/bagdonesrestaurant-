<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;


class CountryController extends Controller
{
    protected $namespace = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Country::select('id','name','name_local' , 'iso' , 'phone', 'image')->get();
            $results = [];

        foreach($data as $country){
            // $country->image = env('APP_URL') . '/uploads/country/' . $country->image;
            $country->image = asset('uploads/country/' . $country->image);
            array_push($results, $country);
        }
            return DataTables::of($results)->addIndexColumn()
                ->addColumn('action', 'admin.countries.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }


        return view('admin.countries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('countries.create');
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
            'iso' => ['required', 'unique:countries', 'max:2'],
            'name' => ['required', 'unique:countries', 'max:50'],
            'name_local' => ['unique:countries', 'max:50'],
            'phone' => ['required', 'unique:countries', 'max:6'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/country/';
            $recordImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $recordImage);
            $input['image'] = "$recordImage";
        }

        Country::create($input);

        return redirect()->route('country.index')
                        ->with('success','Country created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('countries.show',compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {

        return view('countries.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
        $request->validate([
            'iso' => ['required', Rule::unique('countries', 'iso')->ignore($country), 'max:2'],
            'name' => ['required', Rule::unique('countries', 'name')->ignore($country), 'max:50'],
            'name_local' => [Rule::unique('countries', 'name_local')->ignore($country), 'max:50'],
            'phone' => ['required', Rule::unique('countries', 'phone')->ignore($country), 'max:8'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/country/';
            $recordImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $recordImage);
            $input['image'] = "$recordImage";
        }else{
            unset($input['image']);
        }


        $country->update($input);

        return redirect()->route('country.index')
                        ->with('success','Country updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Country::where('id',$request->id)->delete();
        return Response()->json($com);
    }

    /**
     * get country Arabic names list
     */
    public function getCountryArabicNames(){
        $data = Country::select('id','name_local', 'iso' , 'phone', 'image')->get();
        $results = [];
        foreach($data as $country){
            $country->image = asset('uploads/country/' . $country->image);
            array_push($results, $country);
        }

        return $results;
    }
    /**
     * get country Arabic names list
     */
    public function getCountryEnglishNames(){

        $data = Country::select('id','name', 'iso' , 'phone', 'image')->get();
        $results = [];
        foreach($data as $country){
            $country->image = asset('uploads/country/' . $country->image);
            array_push($results, $country);
        }

        return $results;
    }
}
