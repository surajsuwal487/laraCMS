@extends('layouts.app')

@section('content')
   <div class="container">
      <table class="table">
         <thead>
            <tr>
               <th>Title</th>
               <th>URL</th>
            </tr>
         </thead>

         @foreach ($pages as $page )
            <tr>
               <td>{{ $page->title }}</td>
               <td>{{ $page->url }}</td>
            </tr>
         @endforeach
      </table>
   </div>
@endsection
