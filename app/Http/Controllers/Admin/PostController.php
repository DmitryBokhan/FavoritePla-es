<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Photo;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request);
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }


    // Тут сохраняем файлы изображений которые загружаются через Summernote
    //Происходит сохранение в папку public и добавление двнных о пути в базу
    public function uploadfile(Request $request){
    
        $images = $request->file('files');
        
        $resultURL = [
            'URL' => []
        ];

        for($i=0; $i < count($images); $i++){
            $hash = md5($images[$i]->getClientOriginalName() . time());
            $path = Storage::putFileAs('public', '/' . $images[$i], $hash . "." . $images[$i]->extension());
            $photo = new Photo;
            $photo->originalName = $images[$i]->getClientOriginalName();
            $photo->hashName = $hash;
            $photo->extention = $images[$i]->extension();
            $photo->path = $path;
            $photo->size = Storage::size($path);
            $photo->description = 'Описание к файлу';
            $photo->save();
            array_push($resultURL['URL'], $path);
        }
        return $resultURL;
    }
    
}
