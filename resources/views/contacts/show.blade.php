<x-app-layout>
    <x-slot name="header">
        <h1 class="font-shmibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ver Contacto
        </h1>
    </x-slot>
    <section class="flex justify-center items-center mt-2">
        <article class="container mx-auto p-6">
            <div class="bg-white dark:bg-gray-800 shadow p-4 rounded-lg sm:p-8 flex">
                <img class="w-60 h-80 object-fill rounded-lg mr-8" src="{{ asset('storage/'.$contact->photo_path) }}" alt="{{ $contact->name . '-foto' }}">
                <div>
                    <p class="text-3xl font-semibold text-gray-500 dark:text-gray-400">
                        Nombre: <span class="font-light">{{ $contact->name }}</span>
                    </p>
                    <p class="text-3xl font-semibold text-gray-500 dark:text-gray-400">
                        Direccion: <span class="font-light">{{ $contact->direction }}</span>
                    </p>
                    <p class="text-3xl font-semibold text-gray-500 dark:text-gray-400">
                        Correo: <span class="font-light">{{ $contact->email }}</span>
                    </p>
                    <p class="text-3xl font-semibold text-gray-500 dark:text-gray-400">
                        Telefono: <span class="font-light">{{ $contact->phone }}</span>
                    </p>
                </div>
            </div>
            <form action="{{ route('contacts.index') }}" class="mt-5 relative left-1/2">
                @csrf
                <button class="bg-gray-600 dark:bg-gray-700 text-white font-semibold p-4 rounded-md" type="submit">Volver</button>
            </form>
        </article>
    </section>
</x-app-layout>
