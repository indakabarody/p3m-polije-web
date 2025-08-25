@extends('admin.layouts.app')

@section('title')
    Edit Profil
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
                    <form class="form" action="{{ route('admin.profile.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        @method('PUT')

                        {{-- begin::Card body --}}
                        <div class="card-body border-top p-9">
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Foto</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8">
                                    {{-- begin::Image input --}}
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url({{ asset('themes/admin/media/avatars/blank.png') }})">
                                        {{-- begin::Preview existing avatar --}}
                                        @isset(Auth::user()->image)
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url({{ asset('storage/admin/images/' . Auth::user()->id . '/' . Auth::user()->image) }})">
                                            </div>
                                        @else
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url({{ asset('themes/admin/media/avatars/blank.png') }})">
                                            </div>
                                        @endisset
                                        {{-- end::Preview existing avatar --}}
                                        {{-- begin::Label --}}
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Ubah Foto">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            {{-- begin::Inputs --}}
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="image_remove" />
                                            {{-- end::Inputs --}}
                                        </label>
                                        {{-- end::Label --}}
                                        {{-- begin::Cancel --}}
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Batal">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        {{-- end::Cancel --}}
                                        {{-- begin::Remove --}}
                                        @isset(Auth::user()->image)
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Hapus Foto">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                        @endisset
                                        {{-- end::Remove --}}
                                    </div>
                                    {{-- end::Image input --}}
                                    {{-- begin::Hint --}}
                                    <div class="form-text">File type: png, jpg, jpeg, max 3 MB.</div>
                                    {{-- end::Hint --}}
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="name"
                                        class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                        placeholder="Masukkan Nama" value="{{ old('name') ?? Auth::user()->name }}" />
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
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="email"
                                        class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                        placeholder="Masukkan Email Aktif"
                                        value="{{ old('email') ?? Auth::user()->email }}" />
                                    @error('email')
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
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Reset</button>
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
