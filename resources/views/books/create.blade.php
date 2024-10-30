@extends('template')
@section('title')
    Lista książek
@endsection
@section('content')
    <div class="container">
        <h2>Dodawanie książki</h2>
        <form action="{{ route('books.store') }}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <label for="name">Autor</label>
                <select type="text" class="form-control" name="author_id[]" multiple>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->lastname }} {{ $author->firstname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Tytuł książki</label>
                <input type="text" class="form-control" name="name" />
            </div>
            <div class="form-group">
                <label for="name">Rok publikacji</label>
                <input type="text" class="form-control" name="year" />
            </div>
            <div class="form-group">
                <label for="name">Miejsce wydania</label>
                <input type="text" class="form-control" name="publication_place" />
            </div>
            <div class="form-group">
                <label for="name">Liczba stron</label>
                <input type="text" class="form-control" name="pages" />
            </div>
            <div class="form-group">
                <label for="name">Cena</label>
                <input type="text" class="form-control" name="price" />
            </div>
            <input type="submit" value="Dodaj" class="btn btn-primary" />
        </form>
    </div>
@endsection('content')
