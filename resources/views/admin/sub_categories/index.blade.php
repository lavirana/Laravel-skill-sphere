

@extends('adminlte::page')
@section('title', 'Add Category')
@section('content_header')
   
    <h1>Sub Category for: {{ $category->name }}</h1>
@stop
@section('content')


<livewire:sub-category :id="$id" />

@stop


