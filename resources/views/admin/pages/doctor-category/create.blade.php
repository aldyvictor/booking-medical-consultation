@extends('admin.layouts.master-admin')

@section('title')
    Create Doctor Category
@endsection

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Form Doctor Category</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Form Doctor Category
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section id="responsive-datatable">
                    <div class="row">
                        <div class="col-12">
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Danger</h4>
                                    @foreach ($errors->all() as $error)
                                        <div class="alert-body">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="{{ route('doctor-category.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="category-name">Category
                                                            Name</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" value="{{ old('name', '') }}"
                                                            id="category-name" class="form-control" name="name"
                                                            placeholder="Category Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 offset-sm-3">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 waves-effect waves-float waves-light"
                                                    id="submit"><i data-feather='save'></i> Save</button>
                                                <a href="{{ route('doctor-category.index') }}"
                                                    class="btn btn-warning waves-effect">Back to List</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
