
@extends('adminlte::page')
@section('title', 'Add Category')
@section('content_header')
    <h1>Add Sub Category for : {{ $category->name }} </h1>
@stop
@section('content')
<livewire:add-sub-category  :id="$id" />
@stop


