<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VerseRequest;
use App\Models\Verse;
use App\Models\User;

class VerseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $verses = $user->verses()->latest()->paginate(10);

        return view('verse.index', compact('verses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('verse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VerseRequest $request)
    {
        Verse::create([
            'user_id'   => auth()->id(),
            'reference' => $request->input('reference'),
            'content'   => $request->input('content'),
            'comment'   => $request->input('comment')
        ]);

        return redirect()->back()->with('message', 'Verse of day has been successfully posted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Verse $verses
     * @return \Illuminate\Http\Response
     */
    public function show(Verse $verses)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Verse $verse)
    {
        return view('verse.edit', compact(['verse']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VerseRequest $request, Verse $verse)
    {
        $verse->update($request->only('reference', 'content', 'comment'));

        return redirect()->route('verse.index')->with('message', 'Verse was successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verse $verse)
    {
        $verse->delete();

        return redirect()->back()->with('message', 'Verse was deleted');
    }
}
