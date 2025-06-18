
@extends('adminlte::page')
@section('title', 'Edit Category')
@section('content_header')
    <h1>Edit Category</h1>
@stop
@section('content')
<livewire:edit-category :id="$id" />
@stop


