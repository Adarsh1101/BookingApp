<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;
use App\Http\Requests\Auth\Event\CreateRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['events']=Event::orderBy('id','DESC')->get();
        return view('Auth.Events.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('Auth.Events.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        //echo "<pre>"; print_r($request->all());echo"</pre>";exit;

        $category =Category::find($request->category);
        if(!$category){
            return back()->withInput()->withErrors("Unable to find the category,please choose the correct value");
        }
        try{

         Event::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'category_id'=>$category ? $category->id : null,
            'location'=>$request->location,
            'type'=>$request->type,
            'price'=>$request->price,
            'start_date'=>$request->s_date,
            'end_date'=>$request->e_date,
            'max_attendees'=>$request->max_attendance

         ]);
         session()->flash('success_msg','Event Saved Successfully');
         return to_route('events.index');
        }
        catch(\Exception $ex){
            return back()->withErrors('Something went wrong, the error is:'.$ex->getMessage());
            
        }
         
        // echo "<pre>"; print_r($request->all());echo"</pre>";exit;

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
