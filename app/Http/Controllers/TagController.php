<?php

namespace App\Http\Controllers;

use App\Tag;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TagController extends Controller
{
    /**
     * Display a listing of the tag.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Tag::
                when($request->has('name'), function($q) use($request){
                    return $q->where('name', $request->name);
                })
                ->when($request->has('slug'), function($q) use($request){
                    return $q->where('slug', $request->slug);
                })
                ->when($request->has('photo'), function($q) use($request){
                    return $q->where('photo', $request->photo);
                })
                ->when($request->has('description'), function($q) use($request){
                    return $q->where('description', $request->description);
                })
                ->get();
    }

    /**
     * Store a newly created tag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->store_rules());
        if ($validator->fails())
            return Response::make($validator->errors()->all(), 422);
        return Tag::create($request->all());
    }

    /**
     * Display the specified tag.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return $tag;
    }

    /**
     * Update the specified tag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        return $tag;
    }

    /**
     * Remove the specified tag from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return Response::make("", 204);
    }

    private function store_rules()
    {
        return [
            'name'=>'required',
            'slug'=>'required',
            'photo'=>'required',
            'description'=>'required'
        ];
    }
}
