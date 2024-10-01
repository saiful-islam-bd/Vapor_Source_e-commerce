@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Footer Menu</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Footer Menu</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.footer_menu') }}" class="btn btn-primary">Add Footer Menu</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Menu Title</th>
                                <th>Menu Name</th>
                                <th>Menu Url</th>
                                <th>Menu Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($footer_menu as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $item->footer_title }} </td>
                                    <td>{{ $item->footer_name }}</td>
                                    <td>{{ $item->footer_url }}</td>
                                    <td>{!! $item->footer_description !!}</td>
                                    </td>

                                    <td>
                                        @if (Auth::user()->can('brand.edit'))
                                            <a href="{{ route('edit.footer_menu', $item->id) }}" class="btn btn-info">Edit</a>
                                        @endif
                                        @if (Auth::user()->can('brand.edit'))
                                            <a href="{{ route('delete.footer_menu', $item->id) }}" class="btn btn-danger"
                                                id="delete">Delete</a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Menu Title</th>
                                <th>Menu Name</th>
                                <th>Menu Url</th>
                                <th>Menu Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>



    </div>
@endsection
