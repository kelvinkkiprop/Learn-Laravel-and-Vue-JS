<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Return all articles
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        return $articles;
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
        //Store Article
        $this -> validate($request, [
            'uid'       =>      'required|integer', 
            'title'     =>      'required',  
            'body'      =>      'required',          
         ]);
         $article = new Article;
         $article->uid = $request -> input('uid');
         $article->title = $request -> input('title');
         $article->body = $request -> input('body');
         $article->save();
         return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Article saved',
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Show Article
        $article = Article::find($id);
        //return $article;
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Articles found',
            'article' => $article,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Edit Article
        $article = Article::find($id);
        return $article;
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
        //Update Article
        $this -> validate($request, [
            'uid'       =>      'required|integer', 
            'title'     =>      'required',  
            'body'      =>      'required',          
         ]);
         $article = Article::find($id);
         $article->uid = $request -> input('uid');
         $article->title = $request -> input('title');
         $article->body = $request -> input('body');
         $article->save();
         return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Article updated',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Article
        $articles = Article::find($id);
        $articles->delete(); 
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Message deleted',
        ]);    
    }
}
