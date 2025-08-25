@extends('admin.layouts.app')

@section('title')
    Tambah Admin
@endsection

@section('content')
    {{-- begin::Post --}}
    <div class="post d-flex flex-column-fluid" id="kt_post">
        {{-- begin::Container --}}
        <div id="kt_content_container" class="container">
            {{-- begin::Basic info --}}
            <div class="card mb-5 mb-xl-10">
                {{-- begin::Content --}}
                <div id="kt_account_profile_details" class="collapse show">
                    {{-- begin::Form --}}
                    <form class="form" action="{{ route('admin.admins.store') }}" method="POST">
                        @csrf

                        {{-- begin::Card body --}}
                        <div class="card-body border-top p-9">
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="name"
                                        class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                        placeholder="Masukkan Nama Admin" value="{{ old('name') }}" />
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
                                        placeholder="Masukkan Email Aktif" value="{{ old('email') }}" />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Password</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="password" name="password"
                                        class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                        placeholder="Masukkan Password" />
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Konfirmasi Password</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="password" name="password_confirmation"
                                        class="form-control form-control-lg form-control-solid @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Ulangi Password" />
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-0">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Kirim detail login ke email
                                    admin?</label>
                                {{-- begin::Label --}}
                                {{-- begin::Label --}}
                                <div class="col-lg-8 d-flex align-items-center">
                                    <div class="form-check form-check-custom form-check-solid form-check-lg">
                                        <input class="form-check-input" type="checkbox" name="send_login_detail"
                                            value="1" id="flexCheckboxLg" checked />
                                        <label class="form-check-label" for="flexCheckboxLg">
                                        </label>
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
            {{-- end::Basic info --}}
        </div>
        {{-- end::Container --}}
    </div>
    {{-- end::Post --}}
@endsection

@section('page_styles')
@endsection

@section('page_scripts')
@endsection
