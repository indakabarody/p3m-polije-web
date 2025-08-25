@extends('admin.layouts.app')

@section('title')
    Edit Postingan Blog
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
                    <form class="form" action="{{ route('admin.blogs.update', $blog->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        {{-- begin::Card body --}}
                        <div class="card-body border-top p-9">
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label required fw-bold fs-6">Judul</label>
                                    <input type="text" name="title" value="{{ old('title') ?? $blog->title }}"
                                        class="form-control form-control-lg form-control-solid @error('title') is-invalid @enderror"
                                        placeholder="Masukkan Judul Postingan">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label required fw-bold fs-6">Slug</label>
                                    <input type="text" name="slug" id="slug"
                                        class="form-control form-control-lg form-control-solid @error('slug') is-invalid @enderror"
                                        placeholder="Masukkan Slug" value="{{ old('slug') ?? $blog->slug }}" />
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Slug merupakan rangkaian teks yang terletak dibagian url
                                        setelah nama domain. Contoh: https://example.com/my-slug</small>
                                </div>
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label required fw-bold fs-6">Kategori</label>
                                    <select
                                        class="form-select form-select-solid @error('blog_category_id') is-invalid @enderror"
                                        aria-label="Select example" name="blog_category_id">
                                        <option value="">-Pilih Kategori-</option>
                                        @foreach ($blogCategories as $blogCategory)
                                            <option value="{{ $blogCategory->id }}"
                                                @if ($blogCategory->id == $blog->blog_category_id) selected @endif>
                                                {{ $blogCategory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('blog_category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- end::Input group --}}

                            @if ($blog->thumbnail != null)
                                {{-- begin::Input group --}}
                                <div class="row mb-6">
                                    <div class="form-group">
                                        <label class="col-form-label fw-bold fs-6">Gambar Thumbnail Sekarang </label><br>
                                        <img src="{{ asset('storage/admin/blog-thumbnails/' . Auth::user()->id . '/' . $blog->thumbnail) }}"
                                            alt="{{ $blog->title }}">
                                    </div>
                                </div>
                                {{-- end::Input group --}}
                            @endif

                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label fw-bold fs-6">Gambar Thumbnail Baru </label>
                                    <input type="file" name="thumbnail"
                                        class="form-control form-control-lg form-control-solid @error('thumbnail') is-invalid @enderror">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti.</small>
                                    @error('thumbnail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label fw-bold fs-6">Keyword</label>
                                    <input type="text" name="keywords" value="{{ old('keywords') ?? $blog->keywords }}"
                                        class="form-control form-control-lg form-control-solid @error('keywords') is-invalid @enderror"
                                        placeholder="Masukkan Keyword (Pisahkan dengan Koma)">
                                    @error('keywords')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- end::Input group --}}
                            {{-- begin::Input group --}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label required fw-bold fs-6">Konten</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{!! old('content') ?? $blog->content !!}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- end::Input group --}}
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" name="is_shown" value="1"
                                    id="flexSwitchDefault" @if ($blog->is_shown == 1) checked @endif />
                                <label class="form-check-label" for="flexSwitchDefault">
                                    Tampilkan Postingan?
                                </label>
                            </div>
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
    <script src="{{ asset('themes/admin/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script>
        tinymce.init({
            selector: "#content",
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
