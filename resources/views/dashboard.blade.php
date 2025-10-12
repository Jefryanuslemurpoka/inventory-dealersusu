@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>Selamat datang, {{ Auth::user()->email }}</h2>
    <p>Ini adalah halaman dashboard.</p>
@endsection