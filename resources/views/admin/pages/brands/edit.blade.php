@extends('admin.layouts.app')

@section('title')
    Edit Brand
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
                    <form class="form" action="{{ route('admin.brands.update', $brand->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        @method('PUT')

                        {{-- begin::Card body --}}
                        <div class="card-body border-top p-9">
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama Brand</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="name"
                                        class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                        placeholder="Masukkan Nama Brand" value="{{ old('name') ?? $brand->name }}" />
                                    @error('brand')
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
                                        placeholder="Masukkan Slug" value="{{ old('slug') ?? $brand->slug }}" />
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
                                        @isset($brand->image)
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url({{ asset('storage/admin/brands/' . $brand->id . '/' . $brand->image) }})">
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
                                <label class="col-lg-4 col-form-label fw-bold fs-6">URL</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="url"
                                        class="form-control form-control-lg form-control-solid @error('url') is-invalid @enderror"
                                        placeholder="Masukkan URL Brand (opsional)"
                                        value="{{ old('url') ?? $brand->url }}" />
                                    @error('url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Deskripsi Singkat</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <textarea name="description" rows="5"
                                        class="form-control form-control-lg form-control-solid @error('description') is-invalid @enderror"
                                        placeholder="Masukkan Deskripsi Singkat">{{ old('description') ?? $brand->description }}</textarea>
                                    @error('description')
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
                                            @if ($brand->is_shown == 1) checked="checked" @endif />
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
