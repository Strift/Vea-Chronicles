@extends('layouts.base')

@section('body')
    <div id="texts" class="container">
        <div class="row">
            <div v-if="error" class="alert alert-danger">
                Impossible de charger les textes.
            </div>
        </div>

        <div class="row">
            <h3>Textes</h3>
        </div>

        <form v-if="!editing" transition="expand" role="form" class="row">
            <div class="row">
                <div class="col-xs-10">
                    <div class="form-group">
                        <input v-model="text.title" type="text" placeholder="Titre" class="form-control"/>
                        <span class="validation-error">@{{ validationErrors.title }}</span>
                    </div>
                    <div class="form-group">
                        <textarea v-model="text.content" class="form-control" rows="2" placeholder="Contenu"></textarea>
                        <span class="validation-error">@{{ validationErrors.content }}</span>
                    </div>
                </div> 
                <button v-on:click.prevent="store()" type="submit" class="btn btn-sm btn-success pull-right col-xs-2">Créer</button>
            </div>               
        </form>

        <div class="row">
            <div v-for="item in texts" transition="expand" class="panel panel-default">

                <div class="panel-heading">
                    <div v-if="isEditing(item)">
                        <input v-model="item.title" type="text" class="form-control"/>
                        <span class="validation-error">@{{ validationErrors.title }}</span>
                    </div>
                    <div v-else>
                        @{{ item.title }}
                        <div class="pull-right">
                            <button v-on:click.prevent="edit(item)" type="submit" class="btn btn-xs btn-default">Modifier</button>
                            <button v-on:click.prevent="destroy(item)" type="submit" class="btn btn-xs btn-danger ">Supprimer</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div v-if="isEditing(item)" transition="expand" >
                        <div class="form-group">
                            <textarea v-model="item.content" class="form-control"></textarea>
                        </div>
                        <span class="validation-error">@{{ validationErrors.content }}</span>
                        <button v-on:click.prevent="update(item)" type="submit" class="btn btn-xs btn-primary pull-right">Enregistrer</button>
                    </div>
                    <div v-else>
                        @{{ item.content.substring(0, 200) }}...
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/texts.js') }}"></script>
@endsection
