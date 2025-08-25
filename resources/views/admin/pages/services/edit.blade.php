@extends('admin.layouts.app')

@section('title')
    Edit Layanan
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
                    <form class="form" action="{{ route('admin.services.update', $service->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        @method('PUT')

                        {{-- begin::Card body --}}
                        <div class="card-body border-top p-9">
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama Layanan</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="name"
                                        class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                        placeholder="Masukkan Nama Layanan" value="{{ old('name') ?? $service->name }}" />
                                    @error('service')
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
                                        placeholder="Masukkan Slug" value="{{ old('slug') ?? $service->slug }}" />
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Slug merupakan rangkaian teks yang terletak dibagian url
                                        setelah nama domain. Contoh: https://example.com/my-slug</small>
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Gambar Logo</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8">
                                    {{-- begin::Image input --}}
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url({{ asset('themes/admin/media/avatars/blank.png') }})">
                                        {{-- begin::Preview existing avatar --}}
                                        @isset($service->image)
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url({{ asset('storage/admin/services/' . $service->id . '/' . $service->image) }})">
                                            </div>
                                        @else
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url({{ asset('themes/admin/media/avatars/blank.png') }})">
                                            </div>
                                        @endisset
                                        {{-- end::Preview existing avatar --}}
                                        {{-- begin::Label --}}
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ubah Logo">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            {{-- begin::Inputs --}}
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            {{-- end::Inputs --}}
                                        </label>
                                        {{-- end::Label --}}
                                        {{-- begin::Cancel --}}
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        {{-- end::Cancel --}}
                                    </div>
                                    {{-- end::Image input --}}
                                    {{-- begin::Hint --}}
                                    <div class="form-text">Tipe file: png, jpg, jpeg, maks 5 MB.</div>
                                    {{-- end::Hint --}}
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Deskripsi</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <textarea id="description" name="description" rows="5"
                                        class="form-control form-control-lg form-control-solid @error('description') is-invalid @enderror"
                                        placeholder="Masukkan Deskripsi">{{ old('description') ?? $service->description }}</textarea>
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
                                        placeholder="Masukkan Harga Layanan"
                                        value="{{ old('price_idr') ?? $service->price_idr }}" />
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
                                        <option value="Sekali Bayar" @if ($service->bill_type == 'Sekali Bayar') selected @endif>
                                            Sekali Bayar</option>
                                        <option value="Tahunan" @if ($service->bill_type == 'Tahunan') selected @endif>Tahunan
                                        </option>
                                        <option value="Bulanan" @if ($service->bill_type == 'Bulanan') selected @endif>Bulanan
                                        </option>
                                    </select>
                                    @error('bill_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-0">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Tampilkan ke Publik</label>
                                {{-- begin::Label --}}
                                {{-- begin::Label --}}
                                <div class="col-lg-8 d-flex align-items-center">
                                    <div class="form-check form-check-solid form-switch fv-row">
                                        <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing"
                                            name="is_shown" value="1"
                                            @if ($service->is_shown == 1) checked="checked" @endif />
                                        <label class="form-check-label" for="allowmarketing"></label>
                                    </div>
                                </div>
                                {{-- begin::Label --}}
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
    </script>
@endsection
