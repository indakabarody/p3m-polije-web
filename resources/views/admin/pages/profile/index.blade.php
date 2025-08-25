@extends('admin.layouts.app')

@section('title')
    Profil Saya
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        {{-- begin::Container --}}
        <div class=" container-xxl " id="kt_content_container">
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pb-0">
                    {{-- begin::Details --}}
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        {{-- begin: Pic --}}
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                @if (Auth::user()->image != null)
                                    <img alt="image"
                                        src="{{ asset('storage/admin/images/' . Auth::user()->id . '/' . Auth::user()->image) }}">
                                @else
                                    <img alt="image" src="{{ asset('themes/admin/media/avatars/blank.png') }}">
                                @endif
                            </div>
                        </div>
                        {{-- end::Pic --}}
                        {{-- begin::Info --}}
                        <div class="flex-grow-1">
                            {{-- begin::Title --}}
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                {{-- begin::User --}}
                                <div class="d-flex flex-column">
                                    {{-- begin::Name --}}
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#"
                                            class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ Auth::user()->name }}</a>
                                    </div>
                                    {{-- end::Name --}}
                                    {{-- begin::Info --}}
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            {{-- begin::Svg Icon | path: icons/duotune/communication/com011.svg --}}
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                        fill="black" />
                                                    <path
                                                        d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            {{-- end::Svg Icon --}}
                                            {{ Auth::user()->email }}
                                        </a>
                                    </div>
                                    {{-- end::Info --}}
                                </div>
                                {{-- end::User --}}
                                {{-- begin::Actions --}}
                                <div class="d-flex my-4">

                                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-sm btn-primary me-2">Edit
                                        Profil</a>
                                    <a href="{{ route('admin.change-password.index') }}"
                                        class="btn btn-sm btn-primary me-2">Ubah Kata Sandi</a>

                                </div>
                                {{-- end::Actions --}}
                            </div>
                            {{-- end::Title --}}
                            {{-- begin::Stats --}}
                            <div class="d-flex flex-wrap flex-stack">
                                {{-- begin::Wrapper --}}
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    {{-- begin::Stats --}}
                                    <div class="d-flex flex-wrap">
                                        {{-- begin::Stat --}}
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px pt-3 px-4 me-6 mb-3">
                                            {{-- begin::Number --}}
                                            <div class="d-flex align-items-center">
                                                {{-- begin::Svg Icon | path: icons/duotune/arrows/arr066.svg --}}

                                                {{-- end::Svg Icon --}}
                                                <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                    data-kt-countup-value="{{ count($theses) }}">
                                                    {{ count($theses) }}
                                                </div>
                                            </div>
                                            {{-- end::Number --}}
                                            {{-- begin::Label --}}
                                            <div class="fw-bold fs-6 text-gray-400">Skripsi Ditambahkan</div>
                                            {{-- end::Label --}}
                                        </div>
                                        {{-- end::Stat --}}

                                        {{-- begin::Stat --}}
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px pt-3 px-4 me-6 mb-3">
                                            {{-- begin::Number --}}
                                            <div class="d-flex align-items-center">
                                                {{-- begin::Svg Icon | path: icons/duotune/arrows/arr066.svg --}}

                                                {{-- end::Svg Icon --}}
                                                <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                    data-kt-countup-value="{{ count($theses) }}">
                                                    {{ count($theses) }}
                                                </div>
                                            </div>
                                            {{-- end::Number --}}
                                            {{-- begin::Label --}}
                                            <div class="fw-bold fs-6 text-gray-400">Buku Ditambahkan</div>
                                            {{-- end::Label --}}
                                        </div>
                                        {{-- end::Stat --}}

                                        {{-- end::Stat --}}
                                    </div>
                                    {{-- end::Stats --}}
                                </div>
                                {{-- end::Wrapper --}}
                            </div>
                            {{-- end::Stats --}}
                        </div>
                        {{-- end::Info --}}
                    </div>
                    {{-- end::Details --}}
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                    </ul>
                </div>
            </div>
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pb-0">
                    <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#thesis_tab">Skripsi Ditambahkan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#book_tab">Buku Ditambahkan</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="thesis_tab" role="tabpanel">
                            {{-- begin::Table container --}}
                            <div class="table-responsive">
                                {{-- begin::Table --}}
                                <table id="kt_theses_table" class="table align-middle table-row-dashed fs-6 gy-5">
                                    {{-- begin::Table head --}}
                                    <thead>
                                        <tr class="fw-bold text-muted">
                                            <th>No</th>
                                            <th>Judul Skripsi</th>
                                            <th>Divisi</th>
                                            <th>Penyusun</th>
                                            <th>Tahun</th>
                                        </tr>
                                    </thead>
                                    {{-- end::Table head --}}
                                    {{-- begin::Table body --}}
                                    <tbody>
                                        @foreach ($theses as $thesis)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $thesis->title }}</td>
                                                <td>{{ $thesis->division->name ?? null }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($thesis->thesis_creators as $thesisCreator)
                                                            <li>{{ $thesisCreator->given_name }}
                                                                {{ $thesisCreator->family_name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ $thesis->year }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    {{-- end::Table body --}}
                                </table>
                                {{-- end::Table --}}
                            </div>
                            {{-- end::Table container --}}
                        </div>
                        <div class="tab-pane fade" id="book_tab" role="tabpanel">
                            {{-- begin::Table container --}}
                            <div class="table-responsive">
                                {{-- begin::Table --}}
                                <table id="kt_books_table" class="table align-middle table-row-dashed fs-6 gy-5">
                                    {{-- begin::Table head --}}
                                    <thead>
                                        <tr class="fw-bold text-muted">
                                            <th>No</th>
                                            <th>Judul Buku</th>
                                            <th>Kategori</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                        </tr>
                                    </thead>
                                    {{-- end::Table head --}}
                                    {{-- begin::Table body --}}
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $book->title }}</td>
                                                <td>
                                                    @foreach ($book->book_categories as $bookCategory)
                                                        <div class="badge badge-light fw-bolder m-1">
                                                            {{ $bookCategory->category->name }}</div>
                                                    @endforeach
                                                </td>
                                                <td>{{ $book->publisher->name ?? null }}</td>
                                                <td>{{ $book->publication_year }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    {{-- end::Table body --}}
                                </table>
                                {{-- end::Table --}}
                            </div>
                            {{-- end::Table container --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end::Container --}}
    </div>
@endsection

@section('page_styles')
    <link href="{{ asset('themes/admin/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('page_scripts')
    <script src="{{ asset('themes/admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $("#kt_theses_table").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.2/i18n/{{ str_replace('_', '-', app()->getLocale()) }}.json",
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
        });
        $("#kt_books_table").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.2/i18n/{{ str_replace('_', '-', app()->getLocale()) }}.json",
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
        });
    </script>
@endsection
