@extends('admin.layouts.app')

@section('title')
    Tambah Layanan
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        {{-- begin::Container --}}
        <div class=" container-xxl " id="kt_content_container">
            {{-- begin::Tables Widget 9 --}}
            <div class="card mb-5 mb-xl-10">
                {{-- begin::Content --}}
                <div id="kt_account_profile_details" class="collapse show">
                    {{-- begin::Form --}}
                    <form class="form" action="{{ route('admin.services.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- begin::Card body --}}
                        <div class="card-body border-top p-9">
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama Layanan</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="name" id="name"
                                        class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                        placeholder="Masukkan Nama Layanan" value="{{ old('name') }}"
                                        onkeyup="createTextSlug()" />
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
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
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Gambar Logo</label>
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
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Deskripsi</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <textarea id="description" name="description" rows="5"
                                        class="form-control form-control-lg form-control-solid @error('description') is-invalid @enderror"
                                        placeholder="Masukkan Deskripsi">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Harga (Rp.)</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="price_idr"
                                        class="form-control form-control-lg form-control-solid @error('price_idr') is-invalid @enderror"
                                        placeholder="Masukkan Harga Layanan" value="{{ old('price_idr') }}" />
                                    @error('price_idr')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Jenis Tagihan</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid @error('bill_type') is-invalid @enderror"
                                        aria-label="Select example" name="bill_type">
                                        <option value="">- Pilih Jenis Tagihan -</option>
                                        <option value="Sekali Bayar">Sekali Bayar</option>
                                        <option value="Tahunan">Tahunan</option>
                                        <option value="Bulanan">Bulanan</option>
                                    </select>
                                    @error('bill_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                        </div>
                        {{-- end::Card body --}}
                        {{-- begin::Actions --}}
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
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
    <script src="{{ asset('themes/admin/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script
        src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/translations/{{ str_replace('_', '-', app()->getLocale()) }}.js">
    </script>
    <script>
        "use strict";
        var DescriptionEditor = {
            init: function() {
                ClassicEditor.create(document.querySelector("#description"), {
                    language: '{{ str_replace('_', '-', app()->getLocale()) }}',
                }).then((o => {
                    console.log(o)
                })).catch((o => {
                    console.error(o)
                }))
            }
        };

        KTUtil.onDOMContentLoaded((function() {
            DescriptionEditor.init()
        }));

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
@endsection
