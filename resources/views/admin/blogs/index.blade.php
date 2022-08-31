@extends('layouts.app')

@section('content')
   <div class="container">
      <a href="{{ route('blog.create') }}" class="btn btn-primary">Create New</a>
      <table class="table">
         <thead>
            <tr>
               <th>Title</th>
               <th>Author</th>
               <th>Slug</th>
               <th>Published</th>
            </tr>
         </thead>

         @foreach ($model as $post )
            <tr>
               <td>
                  <a href="{{ route('blog.edit', ['blog' => $post->id]) }}">{{ $post->title }}</a>
               </td>
               <td>{{ $post->user()->first()->name }}</td>
               <td>{{ $post->slug }}</td>
            </tr>
         @endforeach
      </table>
   </div>
@endsection
