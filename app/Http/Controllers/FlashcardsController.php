<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class FlashcardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $flashcards = \App\Flashcard::orderBy('term')->where('creator_id', '=', auth()->user()->id)->get();

        return view('cards.index', compact('flashcards'));
    }

    public function show()
    {
        $flashcards = \App\Flashcard::orderBy('term')->where('creator_id', '=', auth()->user()->id)->get();
        return view('cards.show', compact('flashcards'));

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'flashcardTerm' => 'required|unique:flashcards,term',
            'flashcardDefinition' => 'required'
        ]);

        $flashcard = new \App\Flashcard;
        $flashcard->term = $request->input('flashcardTerm');
        $flashcard->definition = $request->input('flashcardDefinition');
        $flashcard->creator_id = auth()->user()->id;
        $flashcard->save();
        $request->session()->flash('status', 'Flash Card Created!');

        return redirect()->route('flashcards.index');
    }

    public function edit($id)
    {
        $flashcard = \App\Flashcard::find($id);
        return view('cards.edit', compact('flashcard'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'flashcardTerm' => 'required|unique:flashcards,term,' . $id,
            'flashcardDefinition' => 'required'
        ]);

        $flashcard = \App\Flashcard::find($id);
        $flashcard->term = $request->input('flashcardTerm');
        $flashcard->definition = $request->input('flashcardDefinition');
        $flashcard->save();
        $request->session()->flash('status', 'Flash Card Updated!');
        return redirect()->route('flashcards.index');
    }

    public function destroy(Request $request, $id)
    {
        \App\Flashcard::destroy($id);
        $request->session()->flash('status', 'Flash Card Deleted!');
        return redirect()->route('flashcards.index');
    }
}
