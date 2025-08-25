@extends('admin.layouts.app')

@section('title')
    Ubah Kata Sandi
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
                    <form class="form" action="{{ route('admin.change-password.update') }}" method="POST">
                        @csrf

                        @method('PUT')

                        {{-- begin::Card body --}}
                        <div class="card-body border-top p-9">
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Kata Sandi Sekarang</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="password" name="current_password"
                                        class="form-control form-control-lg form-control-solid @error('current_password') is-invalid @enderror"
                                        placeholder="Masukkan Kata Sandi Sekarang" />
                                    @error('current_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Kata Sandi Baru</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="password" name="password"
                                        class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                        placeholder="Masukkan Kata Sandi Baru" />
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
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Konfirmasi Kata Sandi
                                    Baru</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="password" name="password_confirmation"
                                        class="form-control form-control-lg form-control-solid @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Ulangi Kata Sandi Baru" />
                                    @error('password_confirmation')
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
