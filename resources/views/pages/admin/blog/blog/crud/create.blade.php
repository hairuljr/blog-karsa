@extends('layouts.admin')
@section('title')
    Blog || Create
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('blog.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Create New Blog</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Blog</a></div>
        <div class="breadcrumb-item">Create</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Fill the form</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required placeholder="Laravel 8 is ...">
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Writer Name</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('writer') is-invalid @enderror" name="writer" value="{{ old('writer') }}" required placeholder="Jr Comp">
                  @error('writer')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control custom-select selectric @error('category_blog') is-invalid @enderror" name="category_blog" required>
                    <option value="" selected disabled>~ Choose Category ~</option>
                    @foreach ($categories as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                <div class="col-sm-12 col-md-7">
                  <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="thumbnail" id="image-upload" required/>
                  </div>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="content" required></textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date Publish</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="date_publish" class="form-control datetimepicker">
                  </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="status" required>
                    <option value="" selected disabled>~ Choose Status ~</option>
                    <option value="PUBLISH">Publish</option>
                    <option value="PENDING">Pending</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4 mt-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7 d-flex justify-content-between">
                  <a href="{{ route('blog.index') }}" class="btn btn-info">Back</a>
                  <button class="btn btn-primary" type="submit">Create</button>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@push('addon-script')
  <script src="{{ url('backend') }}/assets/js/page/features-post-create.js"></script>
@endpush