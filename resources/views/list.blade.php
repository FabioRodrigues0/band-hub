@extends('layout.index')
@section('content')
    <x-table :data="$list[0]" :albums="$list" />
@endsection
