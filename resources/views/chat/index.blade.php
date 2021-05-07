@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <chat :user="{{ auth()->user() }}"></chat>
        </div>
        <div class="col-md-4">
            <chat-users :user="{{ auth()->user() }}"></chat-users>
        </div>
    </div>
</div>
@endsection