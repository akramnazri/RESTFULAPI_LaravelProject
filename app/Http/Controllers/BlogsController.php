<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blogs::all();

        return response()->json([
            'data' => $blogs,
            'msg' => 'success'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'Tittle' => 'required',
            'Content' => 'required',
        ]);

        $blogs = new Blogs;
        $blogs->Tittle = $request->Tittle;
        $blogs->Content = $request->Content;

        $blogs->save();

        return response()->json([
            'data' => $blogs,
            'msg' => 'create success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogs $blogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Tittle' => 'required',
            'Content' => 'required',
        ]);
        
        $blogs =  Blogs::find($id);
        $blogs->Tittle = $request->Tittle;
        $blogs->Content = $request->Content;

        $blogs->save();

        return response()->json([
            'data' => $blogs,
            'msg' => 'update success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $blogs =  Blogs::find($id);
        $blogs->deleted_at = now();
        $blogs->save();;

        return response()->json([
            'data' => $blogs,
            'msg' => 'delete success'
        ]);
    }
}
