<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Saisir une note</h2>
                    
                    <form action="{{ route('notes.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="etudiant_id">
                                Étudiant
                            </label>
                            <select name="etudiant_id" id="etudiant_id" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                                @foreach($etudiants as $etudiant)
                                    <option value="{{ $etudiant->id }}">
                                        {{ $etudiant->numero_etudiant }} - {{ $etudiant->nom }} {{ $etudiant->prenom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="ec_id">
                                Élément Constitutif
                            </label>
                            <select name="ec_id" id="ec_id" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                                @foreach($ecs as $ec)
                                    <option value="{{ $ec->id }}">
                                        {{ $ec->uniteEnseignement->code }} - {{ $ec->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-