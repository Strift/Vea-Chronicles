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

        <form v-if="!editing" transition="expand" role="form" class="row">
            <div class="row">
                <div class="col-xs-10">
                    <div class="form-group">
                        <input v-model="keyword.word" type="text" name="Mot" placeholder="Mot clé" class="form-control">
                        <span class="validation-error">@{{ validationErrors.word }}</span>
                    </div>
                    <div class="form-group">
                        <textarea v-model="keyword.description" class="form-control" rows="2" placeholder="Description"></textarea>
                        <span class="validation-error">@{{ validationErrors.creationDescription }}</span>
                    </div>
                </div> 
                <button v-on:click.prevent="store()" type="submit" class="btn btn-sm btn-success pull-right col-xs-2">Créer</button>
            </div>               
        </form>

        <div class="row">
            <div v-for="item in keywords" transition="expand" class="panel panel-default">
                <div class="panel-heading">
                    <label for="description">@{{ item.word }}</label>
                    <div class="pull-right">
                        <button v-on:click.prevent="update(item)" type="submit" class="btn btn-xs btn-default ">Enregistrer</button>
                        <button v-on:click.prevent="destroy(item)" type="submit" class="btn btn-xs btn-danger ">Supprimer</button>
                    </div>
                </div>
                <div class="panel-body">
                    <textarea v-model="item.description" class="form-control" rows="2" id="description"></textarea>
                    <span v-if="isEditing(item)" class="validation-error">@{{ validationErrors.updateDescription }}</span>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/keywords.js') }}"></script>
@endsection
