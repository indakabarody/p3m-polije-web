@extends('admin.layouts.auth')

@section('title')
    Reset Kata Sandi Admin
@endsection

@section('content')
    {{-- begin::Body --}}
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
        {{-- begin::Wrapper --}}
        <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
            {{-- begin::Content --}}
            <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                {{-- begin::Wrapper --}}
                <div class="d-flex flex-center flex-column-fluid">
                    {{-- begin::Form --}}
                    <form class="form w-100" action="{{ route('admin.password.update') }}" method="POST">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        {{-- begin::Heading --}}
                        <div class="text-center mb-10">
                            {{-- begin::Title --}}
                            <h1 class="text-dark fw-bolder mb-3">
                                @yield('title')
                            </h1>
                            {{-- end::Title --}}
                            {{-- begin::Link --}}
                            <div class="text-gray-500 fw-semibold fs-6">
                                Sudah melakukan reset kata sandi ?
                                <a href="{{ route('admin.login') }}" class="link-primary fw-bold">
                                    Login
                                </a>
                            </div>
                            {{-- end::Link --}}
                        </div>
                        {{-- begin::Heading --}}
                        {{-- end::Input group- --}}
                        <div class="fv-row mb-8">
                            {{-- begin::Email --}}
                            <input type="email" placeholder="Email" name="email"
                                class="form-control @error('email') is-invalid @enderror bg-transparent"
                                value="{{ $request->email ?? old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            {{-- end::Email --}}
                        </div>
                        {{-- end::Input group- --}}
                        {{-- begin::Input group --}}
                        <div class="fv-row mb-8" data-kt-password-meter="true">
                            {{-- begin::Wrapper --}}
                            <div class="mb-1">
                                {{-- begin::Input wrapper --}}
                                <div class="position-relative mb-3">
                                    <input class="form-control @error('password') is-invalid @enderror bg-transparent"
                                        type="password" placeholder="Kata Sandi Baru" name="password" autocomplete="off" />
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- end::Input wrapper --}}
                            </div>
                            {{-- end::Wrapper --}}
                        </div>
                        {{-- end::Input group- --}}
                        {{-- end::Input group- --}}
                        <div class="fv-row mb-8">
                            {{-- begin::Repeat Password --}}
                            <input type="password" placeholder="Ulangi Kata Sandi Baru" name="password_confirmation"
                                autocomplete="off"
                                class="form-control @error('password_confirmation') is-invalid @enderror bg-transparent" />
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            {{-- end::Repeat Password --}}
                        </div>
                        {{-- end::Input group- --}}
                        {{-- begin::Action --}}
                        <div class="d-grid mb-10">
                            <button type="submit" class="btn btn-primary">Setel Ulang</button>
                        </div>
                        {{-- end::Action --}}
                    </form>
                    {{-- end::Form --}}
                </div>
                {{-- end::Wrapper --}}
            </div>
            {{-- end::Content --}}
        </div>
        {{-- end::Wrapper --}}
    </div>
    {{-- end::Body --}}
@endsection
