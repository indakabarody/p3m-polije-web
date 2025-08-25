@extends('admin.layouts.auth')

@section('title')
    Login Admin
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
                    <form class="form w-100" method="POST">
                        @csrf
                        {{-- begin::Heading --}}
                        <div class="text-center mb-11">
                            {{-- begin::Title --}}
                            <h1 class="text-dark fw-bolder mb-3">
                                @yield('title')
                            </h1>
                            {{-- end::Title --}}
                        </div>
                        {{-- begin::Heading --}}
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- begin::Input group- --}}
                        <div class="fv-row mb-8">
                            {{-- begin::Email --}}
                            <input type="email" placeholder="Email" name="email" autocomplete="off"
                                class="form-control @error('email') is-invalid @enderror bg-transparent" />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            {{-- end::Email --}}
                        </div>
                        {{-- end::Input group- --}}
                        <div class="fv-row mb-3">
                            {{-- begin::Password --}}
                            <input type="password" placeholder="Password" name="password" autocomplete="off"
                                class="form-control @error('password') is-invalid @enderror bg-transparent" />
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            {{-- end::Password --}}
                        </div>
                        {{-- end::Input group- --}}
                        @if (Route::has('admin.password.request'))
                            {{-- begin::Wrapper --}}
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                {{-- begin::Link --}}
                                <a href="{{ route('admin.password.request') }}" class="link-primary">
                                    Lupa Password ?
                                </a>
                                {{-- end::Link --}}
                            </div>
                            {{-- end::Wrapper --}}
                        @endif
                        {{-- begin::Submit button --}}
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">Login</button>
                        </div>
                        {{-- end::Submit button --}}
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
