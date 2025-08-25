@extends('admin.layouts.auth')

@section('title')
    Lupa Kata Sandi Admin
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
                        <div class="text-center mb-10">
                            {{-- begin::Title --}}
                            <h1 class="text-dark fw-bolder mb-3">
                                @yield('title') ?
                            </h1>
                            {{-- end::Title --}}
                            {{-- begin::Link --}}
                            <div class="text-gray-500 fw-semibold fs-6">
                                Masukkan email Anda untuk melakukan reset kata sandi.
                            </div>
                            {{-- end::Link --}}
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        {{-- begin::Heading --}}
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
                        {{-- begin::Actions --}}
                        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                            <button type="submit" class="btn btn-primary me-4"> Kirim </button>
                            <a href="{{ route('admin.login') }}" class="btn btn-light">Batal</a>
                        </div>
                        {{-- end::Actions --}}
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
