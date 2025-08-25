@extends('admin.layouts.app')

@section('title')
    Edit Anggota Tim
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
                    <form class="form" action="{{ route('admin.teams.update', $team->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- begin::Card body --}}
                        <div class="card-body border-top p-9">
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Foto</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <div class="input-group">
                                        {{-- begin::Image input --}}
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                            style="background-image: url({{ asset('themes/admin/media/avatars/blank.png') }})">
                                            {{-- begin::Preview existing avatar --}}
                                            @isset($team->image)
                                                <div class="image-input-wrapper w-125px h-125px"
                                                    style="background-image: url({{ asset('storage/team/images/' . $team->id . '/' . $team->image) }})">
                                                </div>
                                            @else
                                                <div class="image-input-wrapper w-125px h-125px"
                                                    style="background-image: url({{ asset('themes/admin/media/avatars/blank.png') }})">
                                                </div>
                                            @endisset
                                            {{-- end::Preview existing avatar --}}
                                            {{-- begin::Label --}}
                                            <label
                                                class="bg-white shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px"
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
                                                class="bg-white shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Batalkan Foto">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            {{-- end::Cancel --}}
                                            {{-- begin::Remove --}}
                                            @isset($team->image)
                                                <span
                                                    class="bg-white shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Hapus Foto">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                            @endisset
                                            {{-- end::Remove --}}
                                        </div>
                                        {{-- end::Image input --}}
                                    </div>
                                    <div class="form-text">Tipe file: png, jpg, jpeg, maksimal 3 MB.</div>
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nomor Urut</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <div class="input-group">
                                        <input
                                            class="form-control form-control-lg form-control-solid @error('order_number') is-invalid @enderror"
                                            type="number" placeholder="Masukkan No. Urut" name="order_number"
                                            value="{{ old('order_number') ?? ($team->order_number ?? $teamCount + 1) }}"
                                            autocomplete="off" required />
                                        @error('order_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="name"
                                        class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                        placeholder="Masukkan Nama Anggota" value="{{ old('name') ?? $team->name }}" />
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
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Jabatan</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="level"
                                        class="form-control form-control-lg form-control-solid @error('level') is-invalid @enderror"
                                        placeholder="Masukkan Jabatan" value="{{ old('level') ?? $team->level }}" />
                                    @error('level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Link Profil Facebook</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="url" name="facebook_url"
                                        class="form-control form-control-lg form-control-solid @error('facebook_url') is-invalid @enderror"
                                        placeholder="Masukkan Link Profil Facebook"
                                        value="{{ old('facebook_url') ?? $team->facebook_url }}" />
                                    @error('facebook_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Link Profil Instagram</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="url" name="instagram_url"
                                        class="form-control form-control-lg form-control-solid @error('instagram_url') is-invalid @enderror"
                                        placeholder="Masukkan Link Profil Instagram"
                                        value="{{ old('instagram_url') ?? $team->instagram_url }}" />
                                    @error('instagram_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Link Profil Twitter</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="url" name="twitter_url"
                                        class="form-control form-control-lg form-control-solid @error('twitter_url') is-invalid @enderror"
                                        placeholder="Masukkan Link Profil Twitter"
                                        value="{{ old('twitter_url') ?? $team->twitter_url }}" />
                                    @error('twitter_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Link Profil LinkedIn</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="url" name="linkedin_url"
                                        class="form-control form-control-lg form-control-solid @error('linkedin_url') is-invalid @enderror"
                                        placeholder="Masukkan Link Profil LinkedIn"
                                        value="{{ old('linkedin_url') ?? $team->linkedin_url }}" />
                                    @error('linkedin_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Link Google Scholar</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="url" name="google_scholar_url"
                                        class="form-control form-control-lg form-control-solid @error('google_scholar_url') is-invalid @enderror"
                                        placeholder="Masukkan Link Google Scholar"
                                        value="{{ old('google_scholar_url') ?? $team->google_scholar_url }}" />
                                    @error('google_scholar_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Link Scopus</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="url" name="scopus_url"
                                        class="form-control form-control-lg form-control-solid @error('scopus_url') is-invalid @enderror"
                                        placeholder="Masukkan Link Scopus"
                                        value="{{ old('scopus_url') ?? $team->scopus_url }}" />
                                    @error('scopus_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="mb-6 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Link Sinta</label>
                                {{-- end::Label --}}
                                {{-- begin::Col --}}
                                <div class="col-lg-8 fv-row">
                                    <input type="url" name="sinta_url"
                                        class="form-control form-control-lg form-control-solid @error('sinta_url') is-invalid @enderror"
                                        placeholder="Masukkan Link Sinta"
                                        value="{{ old('sinta_url') ?? $team->sinta_url }}" />
                                    @error('sinta_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Col --}}
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="mb-0 row">
                                {{-- begin::Label --}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Tampilkan profil ke publik</label>
                                {{-- begin::Label --}}
                                {{-- begin::Label --}}
                                <div class="col-lg-8 d-flex align-items-center">
                                    <div class="form-check form-check-solid form-switch fv-row">
                                        <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing"
                                            name="is_shown" value="1"
                                            @if ($team->is_shown == 1) checked @endif />
                                        <label class="form-check-label" for="allowmarketing"></label>
                                    </div>
                                </div>
                                {{-- begin::Label --}}
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
