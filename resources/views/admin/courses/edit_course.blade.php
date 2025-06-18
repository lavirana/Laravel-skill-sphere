
@extends('adminlte::page')
@section('title', 'Edit Course')
@section('content_header')
    <h1>Edit Course</h1>
@stop
@section('content')

<livewire:manage-course :id="$id" />

@stop


