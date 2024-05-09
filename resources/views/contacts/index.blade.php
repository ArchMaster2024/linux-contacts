<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Contactos
        </h1>
        @if (session('notification'))
            <article class="absolute top-20 right-40 text-cyan-600 border border-cyan-600 shadow-2xl rounded-md bg-white dark:bg-gray-800 p-4">
                {{ session('notification') }}
            </article>
        @endif
    </x-slot>
    <section class="d-flex justify-content-center align-items-center">
        <section class="p-4 m-2">
            <article class="p-3 m-2">
                <form class="flex flex-row-reverse" action="{{ route('contacts.create') }}" method="GET">
                    @csrf
                    <button type="submit" class="bd-gray-800 dark:bg-gray-200 px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-700 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus-bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Agregar
                    </button>
                </form>
            </article>
        </section>
        @if(count($contacts) == 0)
            <section class="p-4 m-2">
                <article class="p-3 m-2">
                    <h2 class="text-gray-800 dark:text-gray-200 font-semibold text-xl text-center">No se encontraron registros!</h2>
                    <p class="text-gray-400 dark:text-gray-400 font-semibold text-center">Para visualizar informacion debe agregar contactos</p>
                </article>
            </section>
        @else
            <section class="p-4 m-2">
                <article class="p-3 m-2">
                    @foreach ($contacts as $contact)
                        <div class="bg-white dark:bg-gray-800 shadow p-4 rounded-lg sm:p-8 grid grid-cols-7 my-7">
                            <figure class="h-48">
                                <img class="h-48 object-fill rounded-2xl" src="{{ asset('storage/'.$contact->photo_path) }}" alt="{{ $contact->name . '-foto' }}">
                            </figure>
                            <div class="flex flex-col col-span-4 col-start-2">
                                <h2 class="text-gray-500 dark:text-gray-400 text-4xl font-semibold mb-2">{{ $contact->name }}</h2>
                                <p class="text-gray-500 dark:text-gray-400 text-xl">Direccion: {{ $contact->direction }}</p>
                                <p class="text-gray-500 dark:text-gray-400 text-xl">Numero de telefono: {{ $contact->phone }}</p>
                                <p class="text-gray-500 dark:text-gray-400 text-xl">Correo: {{ $contact->email }}</p>
                            </div>
                            <div class="flex justify-evenly col-start-6">
                                <form action="{{ route('contacts.show', ['contact' => $contact]) }}" class="self-center">
                                    @csrf
                                    <button type="submit" class="text-white font-semibold uppercase mx-3 p-4 bg-cyan-500 dark:bg-zinc-600 rounded-md">Ver</button>
                                </form>
                                <form action="{{ route('contacts.edit', ['contact' => $contact]) }}" method="POST" class="self-center">
                                    @csrf
                                    @method('PUT')
                                    <button class="text-white font-semibold uppercase mx-3 p-4 bg-amber-500 dark:bg-amber-700 rounded-md">Editar</button>
                                </form>
                                <form action="{{ route('contacts.destroy', ['contact' => $contact]) }}" method="POST" class="self-center">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-white font-semibold uppercase mx-3 p-4 bg-red-600 dark:bg-rose-700 rounded-md">Borrar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </article>
            </section>
        @endif
        <section class="p-4 m-2">
        </section>
    </section>
</x-app-layout>
