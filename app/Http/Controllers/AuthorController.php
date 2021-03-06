<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use JWTAuth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $author = Author::all();
        if($author && $author->count() > 0){
            return response(['message'=> 'Show data success.', 'data'=> $author], 200);
        }else{
            return response(['message'=> 'Data not found.', 'data'=> null], 404);
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
        //
        $author = Author::create ([
            "name" => $request->name,
            "date_of_birth" => $request->date_of_birth,
            "place_of_birth" => $request->place_of_birth,
            "gender" => $request->gender,
            "email" => $request->email,
            "hp" => $request->hp
     ]);
        return response(['message'=> 'Create data success.', 'data'=> $author], 201);    
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
        $author = Author::find($id);
        if($author && $author->count() > 0){
            return response(['message'=> 'Show data success.', 'data'=> $author], 200);
        }else{
            return response(['message'=> 'Data not found.', 'data'=> null], 404);
        }
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
        $author = Author::find($id);
        if($author){
            $author ->name = $request->name;
            $author ->date_of_birth = $request->date_of_birth;
            $author ->place_of_birth = $request->place_of_birth;
            $author ->gender = $request->gender;
            $author ->email = $request->email;
            $author ->hp = $request->hp;
            $author->save();
            return response(['message'=> 'Update data success.', 'data'=> $author], 200);
        }else{
            return response(['message'=> 'Update data failed.', 'data'=> null], 406);
        }
        public function__construct() {
            $this->middleware('auth:api');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        if($author){
            $author->delete();
            return response([], 204);
        }else{
            return response(['message'=> 'Remove data failed.', 'data'=> null], 406);
            
        }
    }   

    public function __construct() {
        $this->middleware('auth:api');
    } 
}