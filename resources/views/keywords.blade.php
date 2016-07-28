<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta id="token" name="token" value="{{ csrf_token() }}">
        <title>Keywords</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/keywords.css') }}" type="text/css">
    </head>

    <body>
        <div id="keywords" class="container">
            <div class="row">
                <div v-if="error" class="alert alert-danger">
                    Impossible de trouver les mots clés.
                </div>
                    <div v-if="updated" class="alert alert-success">
                        Modifications sauvegardées.
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
                            <textarea v-model="keyword.description" class="form-control" rows="2"></textarea>
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

        <script src="{{ asset('js/vendor.js') }}"></script>
        <script src="{{ asset('js/keywords.js') }}"></script>
    </body>
</html>
