

@extends('layouts.index')

@section('CoreContent')
               
<form action="{{ route('Emp.store') }}" method="post">
    @csrf
    @include('Emp.form')
</form>

@endsection
