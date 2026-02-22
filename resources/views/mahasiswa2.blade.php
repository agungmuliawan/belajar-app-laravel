@extends('layouts.app')

@section('title', 'Home')

@section('content')
@foreach ($mahasiswas as $mhs)
    <p>{{ $mhs['nama'] }} - {{ $mhs['nim'] }}</p>
@endforeach 
@endsection


