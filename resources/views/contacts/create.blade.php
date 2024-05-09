<x-app-layout>
    <x-slot name="header">
        <h1 class="font-shmibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Crear Contacto
        </h1>
    </x-slot>
    <section class="flex justify-center items-center mt-2">
        <article class="container mx-auto p-6">
            <h2 class="font-semibold text-center text-lg text-gray-800 dark:text-gray-200">Datos del contacto</h2>
            <div class="grid grid-cols-4">
                <form action="{{ route('contacts.store') }}" class="col-span-2 col-start-2" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="flex flex-col p-2 my-2">
                        <label for="name" class="font-semibold text-center text-base text-gray-800 dark:text-gray-200 my-2.5">Nombre</label>
                        <input type="text" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="name" name="name" placeholder="John Doe">
                        @error('name')
                            <span class="text-red-700 mt-1.5 text-center italic">
                                {{ $message }}
                            </span>
                        @enderror
                    </fieldset>
                    <fieldset class="flex flex-col justify-content-center align-items-center p-2 my-2">
                        <label for="direction" class="font-semibold text-center text-base text-gray-800 dark:text-gray-200 my-2.5">Direccion</label>
                        <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" name="direction" id="direction">                        </textarea>
                        @error('direction')
                            <span class="text-red-700 mt-1.5 text-center italic">
                                {{ $message }}
                            </span>
                        @enderror
                    </fieldset>
                    <fieldset class="flex flex-col justify-content-center align-items-center p-2 my-2">
                        <label for="phone" class="font-semibold text-center text-base text-gray-800 dark:text-gray-200 my-2.5">Telefono</label>
                        <input type="number" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" name="phone" id="phone" placeholder="04141234567">
                        @error('phone')
                            <span class="text-red-700 mt-1.5 text-center italic">
                                {{ $message }}
                            </span>
                        @enderror
                    </fieldset>
                    <fieldset class="flex flex-col justify-content-center align-items-center p-2 my-2">
                        <label for="email" class="font-semibold text-center text-base text-gray-800 dark:text-gray-200 my-2.5">Correo</label>
                        <input type="email" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" name="email" id="email" placeholder="example@gmail.com">
                    </fieldset>
                        @error('email')
                            <span class="text-red-700 mt-1.5 text-center italic">
                                {{ $message }}
                            </span>
                        @enderror
                    <fieldset class="flex flex-col justify-content-center align-items-center p-2 my-2">
                        <label for="photo" class="font-semibold text-center text-base text-gray-800 dark:text-gray-200 my-2.5">Foto</label>
                        <input type="file" name="photo" id="photo">
                        @error('photo')
                            <span class="text-red-700 mt-1.5 text-center italic">
                                {{ $message }}
                            </span>
                        @enderror
                    </fieldset>
                    <fieldset class="flex justify-center p-2 mt-6">
                        <button type="submit" id="submit" name="submit" class="bd-gray-800 dark:bg-gray-200 px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-700 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus-bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 inline">
                            Crear
                        </button>
                    </fieldset>
                </form>
            </div>
        </article>
    </section>
</x-app-layout>
