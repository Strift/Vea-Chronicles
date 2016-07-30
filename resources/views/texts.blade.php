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

        <form role="form" class="row">
            <div class="row">
                <div class="col-xs-10">
                    <div class="form-group">
                        <input v-model="text.title" type="text" name="title" placeholder="Titre" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea v-model="text.content" class="form-control" rows="2" placeholder="Contenu"></textarea>
                    </div>
                </div> 
                <button v-on:click.prevent="store()" type="submit" class="btn btn-sm btn-success pull-right col-xs-2">Créer</button>
            </div>               
        </form>

        <div class="row">
            <div v-for="item in texts" transition="expand" class="panel panel-default">
                <div class="panel-heading">
                    @{{ item.title }}
                    <div class="pull-right">
                        {{-- <a href="{{ action('BackOfficeController@editText') }}">Modifier</a> --}}
                        <button v-on:click.prevent="destroy(item)" type="submit" class="btn btn-xs btn-danger ">Supprimer</button>
                    </div>
                </div>
                <div class="panel-body">@{{ item.preview }}</div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/texts.js') }}"></script>
@endsection
