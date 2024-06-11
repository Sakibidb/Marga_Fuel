@extends('backend.layout.app')
@section('title', 'E-Commerce Site')

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Website Content</h4>
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
                    <form method="post" action="{{ route('webcontent.storeOrUpdate') }}">
                        @csrf
                        <label class="control-label" for="textarea"><b>Scrolling Website Header:</b></label>
                        <textarea class="summernote" name="scrolling">{{ $content ? $content->scrolling : '' }}</textarea>
                        <br>
                        <label class="control-label" for="textarea"><b>Scrolling Website Header Bangla:</b></label>
                        <textarea class="summernote" name="bangla_scrolling">{{ $content ? $content->bangla_scrolling : '' }}</textarea>
                        <br>
                        <label class="control-label mt-2" for="textarea"><b>Text in Header:</b></label>
                        <textarea class="summernote" name="text">{{ $content ? $content->text : '' }}</textarea>
                        <br>
                        <label class="control-label mt-2" for="textarea"><b>Text in Header Bangla:</b></label>
                        <textarea class="summernote" name="bangla_text">{{ $content ? $content->bangla_text : '' }}</textarea>
                        <br>
                        <label class="control-label mt-2" for="textarea"><b>Footer Description:</b></label>
                        <textarea class="summernote" name="footer">{{ $content ? $content->footer : '' }}</textarea>
                        <br>
                        <label class="control-label mt-2" for="textarea"><b>Footer Description Bangla:</b></label>
                        <textarea class="summernote" name="bangla_footer">{{ $content ? $content->bangla_footer : '' }}</textarea>
                        <br>
                        <label class="control-label mt-2" for="textarea"><b>Product Card Header Up:</b></label>
                        <textarea class="summernote" name="cardup">{{ $content ? $content->cardup : '' }}</textarea>
                        <br>
                        <label class="control-label mt-2" for="textarea"><b>Product Card Header Up Bangla:</b></label>
                        <textarea class="summernote" name="bangla_cardup">{{ $content ? $content->bangla_cardup : '' }}</textarea>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
