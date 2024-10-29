@extends('template')
@section('title')
Lista książek
@endsection
@section('content')
<div class="container">
 @isset ($book)
    <table class="table">
<tr>
     <td>Nazwa Książki</td>
 <td> {{$book->name}} </td>
   </tr>
     <tr>
       <td>Rok wydania</td>
       <td> {{$book->year}} </td>
     </tr>
     <tr>
       <td>Miejsce wydania</td>
     <td> {{$book->publication_place}} </td>
     </tr>
     <tr>
       <td>Liczba stron</td>
     <td> {{$book->pages}} </td>
     </tr>
     <tr>
       <td>Cena</td>
     <td> {{$book->price}} </td>
     </tr>
      </table>
 @endisset
</div>
@endsection('content')
