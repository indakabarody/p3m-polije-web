@extends('admin.layouts.app')

@section('title')
    Data Admin
@endsection

@section('content')
    {{-- begin::Post --}}
    <div class="post d-flex flex-column-fluid" id="kt_post">
        {{-- begin::Container --}}
        <div id="kt_content_container" class="container">
            {{-- begin::Card --}}
            <div class="card">
                {{-- begin::Card header --}}
                <div class="card-header border-0 pt-6">
                    {{-- begin::Card title --}}
                    <div class="card-title"></div>
                    {{-- begin::Card title --}}
                    {{-- begin::Card toolbar --}}
                    <div class="card-toolbar">
                        {{-- begin::Toolbar --}}
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            {{-- begin::Add user --}}
                            <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">
                                {{-- begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg --}}
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <rect fill="currentColor" x="4" y="11" width="16" height="2"
                                            rx="1" />
                                        <rect fill="currentColor" opacity="0.5"
                                            transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)"
                                            x="4" y="11" width="16" height="2" rx="1" />
                                    </svg>
                                </span>
                                {{-- end::Svg Icon --}}Tambah Admin
                            </a>
                            {{-- end::Add user --}}
                        </div>
                        {{-- end::Toolbar --}}
                        {{-- begin::Group actions --}}
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-customer-table-toolbar="selected">
                            <div class="fw-bolder me-5">
                                <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                            </div>
                            <button type="button" class="btn btn-danger"
                                data-kt-customer-table-select="delete_selected">Delete Selected</button>
                        </div>
                        {{-- end::Group actions --}}
                    </div>
                    {{-- end::Card toolbar --}}
                </div>
                {{-- end::Card header --}}
                {{-- begin::Card body --}}
                <div class="card-body pt-0">
                    <table id="kt_admins_table" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="fw-bold fs-6 text-muted">
                                <th>No</th>
                                <th>User</th>
                                <th>Status Akun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="d-flex align-items-center">
                                        {{-- begin:: Avatar --}}
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="#">
                                                <div class="symbol-label">
                                                    @isset($admin->image)
                                                        <img src="{{ route('admin.download', 'admin/images/' . $admin->id . '/' . $admin->image) }}"
                                                            alt="{{ $admin->name }}" class="w-100" />
                                                    @else
                                                        <img src="{{ asset('themes/admin/media/avatars/blank.png') }}"
                                                            alt="{{ $admin->name }}" class="w-100" />
                                                    @endisset
                                                </div>
                                            </a>
                                        </div>
                                        {{-- end::Avatar --}}
                                        {{-- begin::User details --}}
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $admin->name }}</a>
                                            <span>{{ $admin->email }}</span>
                                        </div>
                                        {{-- begin::User details --}}
                                    </td>
                                    <td>
                                        @if ($admin->is_activated == 1)
                                            <div class="badge badge-light-success fw-bolder">Aktif</div>
                                        @else
                                            <div class="badge badge-light-danger fw-bolder">Nonaktif</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                            data-kt-menu-flip="top-end">
                                            {{-- begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg --}}
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path
                                                            d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                            fill="currentColor" fill-rule="nonzero"
                                                            transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                                                    </g>
                                                </svg>
                                            </span>
                                            {{-- end::Svg Icon --}}
                                        </a>
                                        {{-- begin::Menu --}}
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4"
                                            data-kt-menu="true">
                                            {{-- begin::Menu item --}}
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.admins.show', $admin->id) }}"
                                                    class="menu-link px-3">Lihat Detail</a>
                                            </div>
                                            {{-- end::Menu item --}}
                                            {{-- begin::Menu item --}}
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.admins.edit', $admin->id) }}"
                                                    class="menu-link px-3">Edit</a>
                                            </div>
                                            {{-- end::Menu item --}}
                                            {{-- begin::Menu item --}}
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.admins.edit-password', $admin->id) }}"
                                                    class="menu-link px-3">Ganti Password</a>
                                            </div>
                                            {{-- end::Menu item --}}
                                            {{-- begin::Menu item --}}
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#delete_modal_{{ $admin->id }}">Hapus</a>
                                            </div>
                                            {{-- end::Menu item --}}
                                        </div>
                                        {{-- end::Menu --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- end::Card body --}}
            </div>
            {{-- end::Card --}}
        </div>
        {{-- end::Container --}}
    </div>
    {{-- end::Post --}}

    @foreach ($admins as $admin)
        {{-- begin::Modal Delete --}}
        <div class="modal fade" tabindex="-1" id="delete_modal_{{ $admin->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST">
                        @csrf

                        @method('DELETE')

                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi Hapus User</h5>

                            {{-- begin::Close --}}
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                            fill="currentColor">
                                            <rect fill="currentColor" x="0" y="7" width="16" height="2"
                                                rx="1"></rect>
                                            <rect fill="currentColor" opacity="0.5"
                                                transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                x="0" y="7" width="16" height="2" rx="1"></rect>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            {{-- end::Close --}}
                        </div>

                        <div class="modal-body">
                            <p>Yakin ingin menghapus user?</p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end::Modal Delete --}}
    @endforeach
@endsection

@section('page_styles')
    <link href="{{ asset('themes/admin/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('page_scripts')
    <script src="{{ asset('themes/admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>

        $("#kt_admins_table").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.2/i18n/id.json",
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        }).on("draw", function() {
            KTMenu.createInstances();
        });
    </script>
@endsection
