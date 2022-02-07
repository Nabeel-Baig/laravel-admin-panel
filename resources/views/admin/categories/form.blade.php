@extends('layouts.master')
@section('title') Create {{ $title }} @endsection
@section('content')
    @php
        if (request()->segment(3) == 'create') {
            $action = route("admin.categories.store");
            $page = 'Create';
        } elseif (request()->segment(4) == 'edit') {
            $action = route("admin.categories.update", [$category->id]);
            $page = 'Edit';
        }
    @endphp
    @component('components.breadcrumb')
        @slot('li_1') {{ $title }} @endslot
        @slot('title') {{ $page." ".$title }} @endslot
    @endcomponent

    <!-- end row -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="{{ $action }}" class="custom-validation" enctype="multipart/form-data">
                        @csrf
                        @if(request()->segment(4) == 'edit')
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label>{{ ucwords(str_replace('_',' ','name')) }}</label>
                            <input type="text" class="form-control @error('name') parsley-error @enderror"
                                   value="{{ $category->name ?? '' }}" name="name" id="name"
                                   placeholder="{{ ucwords(str_replace('_',' ','name')) }}" required/>
                            @error('name')
                            <span class="text-red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
@endsection
