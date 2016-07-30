@extends('layouts.base')

@section('body')
    <div id="keywords" class="container">
        <div class="row">
            <div v-if="error" class="alert alert-danger">
                Impossible de charger les mots clés.
            </div>
        </div>

        <div class="row">
            <h3>Mots clés</h3>
        </div>

        <form role="form" class="row">
            <div class="row">
                <div class="col-xs-10">
                    <div class="form-group">
                        <input v-model="keyword.word" type="text" name="word" placeholder="Mot clé" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea v-model="keyword.description" class="form-control" rows="2" placeholder="Description"></textarea>
                    </div>
                </div> 
                <button v-on:click.prevent="store()" type="submit" class="btn btn-sm btn-success pull-right col-xs-2">Créer</button>
            </div>               
        </form>

        <form role="form" class="row">
            <div v-for="item in keywords" transition="expand" class="form-group">
                <div class="row">
                    <div class="col-xs-10">
                        <label for="description">@{{ item.word }}</label>
                        <textarea v-model="item.description" class="form-control" rows="2" id="description"></textarea>
                    </div>
                    <div class="col-xs-2">
                        <button v-on:click.prevent="update(item)" type="submit" class="btn btn-xs btn-default ">Enregistrer</button>
                        <button v-on:click.prevent="destroy(item)" type="submit" class="btn btn-xs btn-danger ">Supprimer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/keywords.js') }}"></script>
@endsection
