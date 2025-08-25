@extends('admin.layouts.app')

@section('title')
    Tambah Galeri
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        {{-- begin::Container --}}
        <div class=" container-xxl" id="kt_content_container">
            {{-- begin::Tables Widget 9 --}}
            <div class="mb-5 card mb-xl-10">
                {{-- begin::Content --}}
                <div id="kt_account_profile_details" class="collapse show">
                    {{-- begin::Form --}}
                    <form class="form" action="{{ route('admin.galleries.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- begin::Card body --}}
                        <div class="card-body border-top p-9">
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama Galeri</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="name" id="name"
                                        class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                        placeholder="Masukkan Nama Galeri" value="{{ old('name') }}"
                                        onkeyup="createTextSlug()" />
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Slug</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="slug" id="slug"
                                        class="form-control form-control-lg form-control-solid @error('slug') is-invalid @enderror"
                                        placeholder="Masukkan Slug" value="{{ old('slug') }}" />
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Slug merupakan rangkaian teks yang terletak dibagian url
                                        setelah nama domain. Contoh: https://example.com/my-slug</small>
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Row --}}
                            <div class="row mb-7">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Gambar Thumbnail</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image">
                                    <small class="text-muted">Tipe file: jpg/png/gif, maksimal 5 MB.</small>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Row --}}
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Tanggal</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="date" name="date"
                                        class="form-control form-control-lg form-control-solid @error('date') is-invalid @enderror"
                                        placeholder="Masukkan Tanggal" value="{{ old('date') }}" />
                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Deskripsi</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <textarea name="description" id="description"
                                        class="form-control form-control-lg form-control-solid @error('description') is-invalid @enderror"
                                        placeholder="Masukkan Deskripsi">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                        </div>
                        {{-- end::Card body --}}
                        {{-- begin::Actions --}}
                        <div class="py-6 card-footer d-flex justify-content-end px-9">
                            <button type="reset" class="btn btn-white btn-active-light-primary me-2">Reset</button>
                            <button type="submit" class="btn btn-primary"
                                id="kt_account_profile_details_submit">Simpan</button>
                        </div>
                        {{-- end::Actions --}}
                    </form>
                    {{-- end::Form --}}
                </div>
                {{-- end::Content --}}
            </div>
            {{-- end::Tables Widget 9 --}}
        </div>
        {{-- end::Container --}}
    </div>
@endsection

@section('page_scripts')
    <script>
        function createTextSlug() {
            var name = document.getElementById("name").value;
            document.getElementById("slug").value = generateSlug(name);
        }

        function generateSlug(text) {
            return text.toString().toLowerCase()
                .replace(/^-+/, '')
                .replace(/-+$/, '')
                .replace(/\s+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/[^\w\-]+/g, '');
        }
    </script>
    <script src="{{ asset('themes/admin/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script>
        tinymce.init({
            selector: "#description",
            menubar: false,
            height: "480",
            toolbar: ["styleselect fontselect fontsizeselect",
                "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
                "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"
            ],
            plugins: "advlist autolink link image lists charmap print preview code"
        });
    </script>
@endsection
