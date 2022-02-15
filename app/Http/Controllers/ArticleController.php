<?php

namespace App\Http\Controllers;
use App\Models\Article;

use Illuminate\Http\Request;
use App\Models\Add;
class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dil=Add::all();
        $article=Article::all();
        return view('article.index',compact('dil','article'));
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
        $title=$request->title;
        $description=$request->description;
        $content=$request->conte;
        $lang=$request->lang;

        if ($request->has('image')) {


            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);

            Article::create([
                'title'=>$title,
                'description'=>$description,
                'content'=>$content,
                'lang_id'=>$lang,
                'image'=>'images/'.$imageName,

            ]);}
        return back()->with('message','Successful');


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
        $title=$request->title;
        $description=$request->description;
        $content=$request->conte;

        $update=Article::where('id',$id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$content
        ]);
        return back()->with('message','Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Article::find($id);
        $item->delete();
        return \Redirect::back()->with('message','Deleted');
    }
}
