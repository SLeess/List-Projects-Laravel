<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Services\Operations;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }


    public function create(){
        return view('NewEditNote');
    }

    /**
     * Store a newly created note in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $validator = $this->validationInsertUpdate($request);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $note = Note::create($request->only(['title', 'text']));

        // Get user ID
        $note->user_id = session('user.id');
        //Save new Note
        $note->save();

        //Redirect for home
        return redirect()->route('main')->with('success','Nota criada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id){
        $id_descriptografado = Operations::decryptID($id);

        if (is_null($id_descriptografado)) {
            // If the ID is invalid, redirect for the main route
            return redirect()->route('main');
        }

        // $note = Note::where('id', $id)->first();
        $note = Note::find($id_descriptografado)->toArray();
        $situattion = "EDITING NOTE $id_descriptografado";
        $method = "Update";

        //Passing the id encrypted so I don't need to do this before
        $note['id'] = $id;

        return view('NewEditNote', compact('note', 'situattion'));
    }

    /**
     * Update the specified note in storage.
     */
    public function update(Request $request)
    {
        // Validate request
        $validator = $this->validationInsertUpdate($request);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //decrypt id note
        $id = Operations::decryptID($request->get('note_id'));
        if (is_null($id)) {
            // If the ID of the note is invalid, redirect for the main route
            return redirect()->route('main');
        }

        //load the note
        if(!$note = Note::find($id)){
            session()->flash('Error', 'Nenhum item encontrado com esse ID.');
            return redirect()->route('main')->withErrors(['Error'=> 'Nenhuma nota foi encontrada com esse ID']);
        }

        //update note
        $note->update($request->only(['title','text']));

        //redirect to home
        return redirect()->route('main');

    }

    /**
     * Remove the specified note from storage.
     */
    public function destroy(string $id)
    {
        $id = Operations::decryptID($id);
        if (is_null($id)) {
            // If the ID is invalid, redirect for the main route
            return redirect()->route('main');
        }
        $note = Note::find($id);

        //hard delete
        // $note->delete();

        //soft delete
        // $note->deleted_at = date('Y-m-d H:i:s');
        // $note->save();

        //soft delete property in model, same way to hard delete considering that u put "use SoftDeletes;" in model
        $note->delete();

        //hard delete with property in model
        $note->forceDelete();

        return redirect()->route('main');
    }

    private function validationInsertUpdate(Request $request){
        return Validator::make($request->all(), [
            'title' => 'required|min:3|max:300',
            'text' => 'required|min:3|max:3000',
        ], [
            'title.required' => "O título é obrigatório.",
            'text.required' => "O título é obrigatório.",
            'title.max' => "O título pode ter o tamanho máximo de 300 caracteres.",
            'text.max' => "O texto pode ter o tamanho máximo de 3000 caracteres.",
            'title.min' => "O título precisa ter no mínimo 3 caracteres.",
            'text.min' => "O texto precisa ter no mínimo 3 caracteres.",
        ]);
    }
}
