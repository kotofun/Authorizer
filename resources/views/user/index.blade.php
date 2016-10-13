@extends('layout.master')

@section('content')
    @each('user.helpers.user', $users, 'user')
@endsection
