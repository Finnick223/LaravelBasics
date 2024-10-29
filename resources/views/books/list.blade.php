@extends('template')
@section('title')
    Lista książek
@endsection
@section('content')
    <div class="container">
        <table class="table">
            @forelse ($booksList as $book)
                <tr>
                    <td> {{ $book->name }} </td>
                    <td> {{ $book->year }} </td>
                    <td> {{ $book->publication_place }} </td>
                    <td> <a href="{{ url('/books', [$book->id]) }}">Podgląd</a> </td>
                    <td> <a href="{{ route('books.edit', $book->id) }}">Edycja</a> </td>
                    <td> <a href="{{ url('/books', [$book->id, 'delete']) }}">Usuń</a> </td>
                </tr>
            @empty
                Brak rekordów!
            @endforelse
        </table>
    </div>
@endsection('content')
