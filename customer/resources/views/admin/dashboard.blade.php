@extends('admin.layout.menu',  ['utilisateur' => "Ismail"])
@section('content')
    
@if(session()->has('role'))
    {{ session()->get('role') }}
@endif
@endsection