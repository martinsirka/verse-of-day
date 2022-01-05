@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid col-6">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Verse</h1>
            <a href="https://biblia.sk/citanie/roh/mt/1" target="_blank" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-link"></i>
                </span>
                <span class="text">www.biblia.sk</span>
            </a>
        </div>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ Auth::user()->name }}, {{ session()->get('message') }}
            </div>
        @endif

        @include('admin.partials.errors')

        <form action="{{ route('verse.update', $verse->id) }}" method="POST">
            {!! csrf_field() !!}
            @method('PUT')
            <div class="form-group">
                <label for="verseReference">Verse Reference</label>
                <input type="text" value="{{ $verse->reference }}" name="reference" class="form-control" id="verseReference">
            </div>
            <div class="form-group">
                <label for="verseText">Verse Content</label>
                <textarea class="form-control" name="content" rows="6">{{ $verse->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea id="article-ckeditor" class="form-control" name="comment" rows="6">{{ $verse->comment }}</textarea>
            </div>

            <div class="form-group d-flex justify-content-between">
                <a href="{{ route('verse.index') }}" class="btn btn-secondary btn-icon-split mr-5">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Cancel</span>
                </a>

                <button type="submit" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Edit Verse</span>
                </button>
            </div>
        </form>

    </div>
    <!-- /.container-fluid -->
@endsection