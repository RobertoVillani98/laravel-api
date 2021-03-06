@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista Categorie</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route("categories.create")}}"><button type="button" class="btn btn-success">Aggiungi categoria</button></a>
                    </div>
                    <table class="table table-dark my-4">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Azioni</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                          <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>

                            <td class="d-flex">
                                <a href="{{route("categories.show", $category->id)}}"><button type="button" class="btn btn-primary">Visualizza</button></a>
                                <a class="mx-2" href="{{route('categories.edit', $category->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                                <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare il post?')">Elimina</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <a href="{{route('posts.index')}}" class="btn btn-primary">Torna ai posts</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection