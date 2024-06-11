@extends('backend.layout.app')
@section('title', 'E-Commerce Site')

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Privacy List</h4>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mt-2">
                    <form method="post" action="{{ route('privacy.storeOrUpdate') }}">
                        @csrf
                        <label class="control-label" for="textarea"><b>Description:</b></label>
                        <textarea class="summernote" name="content_english">{{ $privacy ? $privacy->description : '' }}</textarea> <!-- Populate the textarea with the existing description -->
                        <br>
                        <label class="control-label mt-2" for="textarea"><b>Description Bangla:</b></label>
                        <textarea class="summernote" name="content_bangla">{{ $privacy ? $privacy->banglaDescription : '' }}</textarea> <!-- Populate the textarea with the existing description -->
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
