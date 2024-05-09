<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\FileStorage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authUser = Auth::id();
        $user = User::find($authUser);
        $contacts = $user->contacts;

        return view('contacts.index', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $validData = $request->validated(); // Validamos los datos del usuario
        $authUser = Auth::user();
        $fileStorage = new FileStorage($validData['photo'], $authUser->name);
        $fileSavedPath = $fileStorage->saveFile();
        $notification = '';
        if ($fileSavedPath != false) { // Se verifica que se guardo correctamente la foto
            $contact = new Contact;
            $contact->name = $validData['name'];
            $contact->direction = $validData['direction'];
            $contact->phone = $validData['phone'];
            $contact->email = $validData['email'];
            $contact->photo_path = $fileSavedPath;
            $contact->user_id = $authUser->id;
            $contact->save();
            $notification = 'Contacto creado de manera exitosa';
        } else {
            $notification = 'Ha ocurrido un problema al guardar la foto del contacto';
        }
        return redirect()->route('contacts.index')->with('notification', $notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
