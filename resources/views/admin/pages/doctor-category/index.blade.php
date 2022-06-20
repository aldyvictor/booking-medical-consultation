@extends('admin.layouts.master-admin')

@section('title')
    Data Doctor Category
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Doctor Category</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Doctor Category
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
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Success</h4>
                                <div class="alert-body">
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Danger</h4>
                                <div class="alert-body">
                                    {{ session('error') }}
                                </div>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header border-bottom">
                                <a class="btn btn-info" href="{{ route('doctor-category.create') }}"><i
                                        data-feather='plus'></i> Add Doctor Category</a>
                            </div>
                            <div class="card-datatable">
                                <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper dt-bootstrap5 px-1">
                                    <form action='/admin/faq-categories-order' method="POST"
                                        class="mt-1">
                                        @csrf
                                        <table class="dt-responsive table dataTable dtr-column collapsed"
                                            id="DataTables_Table_3" role="grid"
                                            aria-describedby="DataTables_Table_3_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="text-center" style="width: 15%">#</th>
                                                    <th>Category Name</th>
                                                    <th class="text-center" style="width: 25%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($doctorCategories as $key => $category)
                                                    <tr role="row" class="odd">
                                                        <td class="text-center">{{ $key + 1 }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td class="text-center">
                                                            <div class="d-inline-flex">
                                                                <a class="btn btn-warning btn-sm" href="{{ route('doctor-category.edit', $category->id) }}"><i data-feather="edit-3"></i></a>
                                                                <a href="#" data-id="{{ $category->id }}" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="btn btn-sm btn-danger ms-1 delete">
                                                                    <i data-feather="trash-2"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div id="delete_form"></div>
</div>

{{-- Modal Delete --}}

<div class="modal fade modal-danger text-start show" id="confirm-delete" tabindex="-1" aria-labelledby="myModalLabel120"
    style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel120">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('doctor-category.delete') }}" method="POST">
                @csrf
                <input id="id" name="id" hidden>
                <div class="modal-body">
                    Apakah kamu yakin ingin menghapus data ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect waves-float waves-light"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-float waves-light">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('append-script')
    <script src="/js/custom-delete.js"></script>
@endpush
