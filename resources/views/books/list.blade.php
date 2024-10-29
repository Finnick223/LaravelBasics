@extends('template')
 @section('title')
 Lista książek
 @endsection
 @section('content')
 <div class="container">
 @forelse ($booksList as $book)
 Tu będą dane książki!
 @empty
 Brak rekordów!
 @endforelse
 </div>
 @endsection('content')
