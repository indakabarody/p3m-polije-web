@extends('admin.layouts.app')

@section('title')
    Pengaturan Umum Aplikasi
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
                    <form class="form" action="{{ route('admin.app-settings.update') }}" method="POST">
                        @csrf

                        @method('PUT')
                        {{-- begin::Card body --}}
                        <div class="card-body border-top p-9">
                            <div class="mb-8 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Judul Aplikasi</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('app_name') is-invalid @enderror"
                                    name="app_name"
                                    value="{{ old('app_name') ?? ($appSetting->app_name ?? (config('app.name') ?? null)) }}"
                                    placeholder="Masukkan Judul Aplikasi">
                                @error('app_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-8 fv-row fv-plugins-icon-container">
                                <label class="form-label">Teks Highlight</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('highlight_text') is-invalid @enderror"
                                    name="highlight_text"
                                    value="{{ old('highlight_text') ?? ($appSetting->highlight_text ?? null) }}"
                                    placeholder="Masukkan Teks Highlight">
                                @error('highlight_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-8 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Teks Header</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('header_text') is-invalid @enderror"
                                    name="header_text"
                                    value="{{ old('header_text') ?? ($appSetting->header_text ?? (config('app.name') ?? null)) }}"
                                    placeholder="Masukkan Teks Header">
                                @error('header_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-8 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Teks Sub Header</label>
                                <input type="text"
                                    class="form-control form-control-solid @error('subheader_text') is-invalid @enderror"
                                    name="subheader_text"
                                    value="{{ old('subheader_text') ?? ($appSetting->subheader_text ?? (config('app.name') ?? null)) }}"
                                    placeholder="Masukkan Teks Sub Header">
                                @error('subheader_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-8 fv-row fv-plugins-icon-container">
                                <label class="form-label required">Tentang</label>
                                {{-- begin::Col --}}
                                <textarea class="form-control @error('about') is-invalid @enderror" id="about" name="about">{!! old('about') ?? ($appSetting->about ?? null) !!}</textarea>
                                @error('about')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                {{-- end::Col --}}
                            </div>
                            <div class="mb-8 fv-row fv-plugins-icon-container">
                                <label class="form-label">Visi Misi</label>
                                {{-- begin::Col --}}
                                <textarea class="form-control @error('vision_mission') is-invalid @enderror" id="vision_mission" name="vision_mission">{!! old('vision_mission') ?? ($appSetting->vision_mission ?? null) !!}</textarea>
                                @error('vision_mission')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                {{-- end::Col --}}
                            </div>
                            <div class="separator my-14"></div>
                            <div class="row">
                                <div class="col lg-6">
                                    <div class="mb-8 fv-row fv-plugins-icon-container">
                                        <label class="required form-label">Nama Perusahaan/Instansi</label>
                                        <input type="text"
                                            class="form-control form-control-solid @error('company_name') is-invalid @enderror"
                                            name="company_name"
                                            value="{{ old('company_name') ?? ($appSetting->company_name ?? null) }}"
                                            placeholder="Masukkan Nama Perusahaan/Instansi">
                                        @error('company_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col lg-6">
                                    <div class="mb-8 fv-row fv-plugins-icon-container">
                                        <label class="required form-label">Alamat Perusahaan/Instansi</label>
                                        <input type="text"
                                            class="form-control form-control-solid @error('company_address') is-invalid @enderror"
                                            name="company_address"
                                            value="{{ old('company_address') ?? ($appSetting->company_address ?? null) }}"
                                            placeholder="Masukkan Alamat Perusahaan/Instansi">
                                        @error('company_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col lg-4">
                                    <div class="mb-8 fv-row fv-plugins-icon-container">
                                        <label class="required form-label">Email Perusahaan/Instansi</label>
                                        <input type="email"
                                            class="form-control form-control-solid @error('company_email') is-invalid @enderror"
                                            name="company_email"
                                            value="{{ old('company_email') ?? ($appSetting->company_email ?? null) }}"
                                            placeholder="Masukkan Email Perusahaan/Instansi">
                                        @error('company_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col lg-4">
                                    <div class="mb-8 fv-row fv-plugins-icon-container">
                                        <label class="required form-label">Website Perusahaan/Instansi</label>
                                        <input type="url"
                                            class="form-control form-control-solid @error('company_website_url') is-invalid @enderror"
                                            name="company_website_url"
                                            value="{{ old('company_website_url') ?? ($appSetting->company_website_url ?? null) }}"
                                            placeholder="Masukkan Link Website Perusahaan/Instansi">
                                        @error('company_website_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col lg-4">
                                    <div class="mb-8 fv-row fv-plugins-icon-container">
                                        <label class="required form-label">No. Telp Perusahaan/Instansi</label>
                                        <input type="text"
                                            class="form-control form-control-solid @error('company_phone') is-invalid @enderror"
                                            name="company_phone"
                                            value="{{ old('company_phone') ?? ($appSetting->company_phone ?? null) }}"
                                            placeholder="Masukkan No. Telp Perusahaan/Instansi">
                                        @error('company_phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-8 fv-row fv-plugins-icon-container">
                                    <label class="form-label">Google Maps iframe</label>
                                    <textarea rows="5"
                                        class="form-control form-control-solid @error('company_google_maps_iframe') is-invalid @enderror"
                                        name="company_google_maps_iframe" placeholder="Masukkan Google Maps IFrame">{{ old('company_google_maps_iframe') ?? ($appSetting->company_google_maps_iframe ?? null) }}</textarea>
                                    @error('company_google_maps_iframe')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- end::Card body --}}
                        {{-- begin::Actions --}}
                        <div class="py-6 card-footer d-flex justify-content-end px-9">
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

@section('page_scripts')
    <script src="{{ asset('themes/admin/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script>
        tinymce.init({
            selector: "#about",
            menubar: false,
            height: "480",
            toolbar: ["styleselect fontselect fontsizeselect",
                "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
                "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"
            ],
            plugins: "advlist autolink link image lists charmap print preview code"
        });
        tinymce.init({
            selector: "#vision_mission",
            menubar: false,
            height: "480",
            toolbar: ["styleselect fontselect fontsizeselect",
                "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
                "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"
            ],
            plugins: "advlist autolink link image lists charmap print preview code"
        });
        tinymce.init({
            selector: "#why_choose_us",
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
