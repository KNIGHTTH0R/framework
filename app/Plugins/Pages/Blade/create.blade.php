@extends('dashboard::frame')

@section('title')
    Create Page
@endsection

@section('information')
    New page content that will be accessible to your website visitors.
@endsection

@section('content')

    @include('dashboard::structure.validation')

    <form action="{{ route('admin.pages.store') }}" method="POST">
    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp" value="{{ old('title') }}">
                    <small id="titleHelp" class="form-text text-muted">The page title to be displayed.</small>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" aria-describedby="slugHelp" value="{{ old('slug') }}" readonly>
                    <small id="slugHelp" class="form-text text-muted">Create the url slug that will be used.</small>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="creatorID">Creator</label>
                    <select class="form-control" name="creatorID" id="creatorID" aria-describedby="creatorHelp" readonly>
                        <option value="1">Mark Hester</option>
                        <option value="2">Danny Dwyer</option>
                        <option value="3">Christie Tango</option>
                    </select>
                    <small id="creatorHelp" class="form-text text-muted">The page author.</small>
                </div>
            </div>
        </div>

        <div class="form-group">
          <label for="tags">Tags</label>
          <input type="text" class="form-control" name="tags" id="tags" aria-describedby="tagHelp" value="{{ old('tags') }}">
          <small id="tagHelp" class="form-text text-muted">Tags help your page be found by search engines.</small>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" aria-describedby="descriptionHelp" rows="2">{{ old('description') }}</textarea>
          <small id="descriptionHelp" class="form-text text-muted">Describe your page to search engines and users.</small>
        </div>

        <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control editor" name="content" id="content" aria-describedby="contentHelp" rows="18">{{ old('content') }}</textarea>
          <small id="contentHelp" class="form-text text-muted">The content that will be shown to users who view the page.</small>
        </div>

        <div class="form-actions">

            <button type="submit" class="btn btn-create">Create Page</button>

            <div class="pull-right">
                <button type="reset" class="btn btn-reset">Reset</button>
                <a href="{{ route('admin.pages.index') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </div>

    </form>

@endsection