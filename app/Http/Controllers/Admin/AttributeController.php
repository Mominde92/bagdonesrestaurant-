<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Attribute_entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Log;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        try {
        if ($request->ajax()) {

            $data = DB::table('attributes as a')
            ->select('a.id','a.name','a.name_locale')
            ->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', 'admin.attributes.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.attributes.index');
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        try {
            return view('admin.attributes.create');
         } catch (\Exception $ex) {
            $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
            
            }
             
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
        ]);


        DB::beginTransaction();
        try {

            $attribute_input = [
                'name'=> $request->input('name'),
                'name_locale'=>$request->input('name_locale'),
            ] ;

            $attribute  = Attribute::create($attribute_input);
            //adding Attribute Components
            $entry_names = $request->input('entry_name'); // input array
            $entry_name_locales = $request->input('entry_name_locale');// input array
            $attribute_components=[];
            foreach ($entry_names as $key => $name) {
                $data = [
                    'name'=>$name,
                    'name_locale'=> $entry_name_locales[$key],
                    'attribute_id'=>$attribute->id
                ];
               array_push($attribute_components ,$data );

            }

            Attribute_entry::insert($attribute_components);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->action([self::class, 'create'])
            ->with('error','Error Creating Attribute.');
        }

        return redirect()->action([self::class, 'index'])->with('success','Attribure created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Attribute  $attribute
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Attribute $attribute)
    {
        try {
        return view('admin.attributes.show',compact('attribute'));
        }catch (\Exception $ex) {
            $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
            
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        try {
        return view('admin.attributes.edit',compact('attribute'));
        }catch (\Exception $ex) {
            $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
            
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Attribute $attribute)
    {
        
        $request->validate([
            'name' => ['required',  'max:255'],
            'name_locale' => ['required', 'max:255'],
        ]);

        DB::beginTransaction();
        try {
        $attribute_input = [
            'name'=> $request->input('name'),
            'name_locale'=>$request->input('name_locale'),
        ] ;


        $attribute->update($attribute_input);


        //adding Attribute Components
        $entry_names = $request->input('entry_name'); // input array
        $entry_name_locales = $request->input('entry_name_locale');// input array
        $is_active = $request->input('is_active');// input array
        $attribute_components=[];

        foreach ($entry_names as $key => $name) {


            $is_active[$name] = $request->input('check'.$name) ;

            if(empty($is_active[$name]))
            {
                $active[$name] = '0';
            }
            else
            {
                $active[$name] = '1';
            }

            $data = [
                'name'=>$name,
                'name_locale'=> $entry_name_locales[$key],
                'attribute_id'=>$attribute->id,
                'is_active'=>$active[$name]
            ];

            array_push($attribute_components ,$data );


        }

         //delete previous entries
        Attribute_entry::where('attribute_id' , $attribute->id)->delete();
        //insert new entries
        Attribute_entry::insert($attribute_components);

        DB::commit();
        // all good
    } catch (\Exception $e) {
        DB::rollback();
        // something went wrong
        return redirect()->action([self::class, 'create'])
        ->with('error','Error Creating Attribute.');
    }

    return redirect()->action([self::class, 'index'])->with('success','Attribure Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
            if ($request->ajax()) {
                $id = $request->input('id');
          
            DB::beginTransaction();
            try {
            $com1 = Attribute_entry::where('attribute_id',$id)->delete();
            $com2 = Attribute::where('id',$id)->delete();
            DB::commit();
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
                return Response()->json('Error Deleting attribute');
            }
            return Response()->json($com2);
        }
    }
}
