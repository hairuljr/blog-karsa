@extends('layouts.admin')

@section('title')
    Blogs
@endsection

@section('content')
    <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-button">
        <a href="{{ route('show-blog') }}" class="btn btn-sm btn-round btn-icon icon-left btn-info"><i class="far fa-eye"></i> View Blog</a>
      </div>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Blog</a></div>
        <div class="breadcrumb-item">List</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Data Blog</h4>
              <div>
                <a href="{{ route('blog.create') }}" class="btn btn-primary">Add Blog</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Writer</th>
                      <th>Date Publish</th>
                      <th>Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($blogs as $blog)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $blog->title }}</td>
                      <td>
                        {{ $blog->categories->first()->category_name }}
                      </td>
                      <td class="align-middle text-center">
                        <img alt="image" src="{{ url('backend') }}/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="{{ $blog->writer }}">
                      </td>
                      <td>{{ \Carbon\Carbon::parse($blog->date_publish)->translatedFormat('l, d F Y')}}</td>
                      <td><div class="badge badge-{{ $blog->status === 'PUBLISH' ? 'light' : 'warning' }}">{{ $blog->status }}</div></td>
                      <td class="text-center">
                        <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-icon icon-left btn-success mb-1"><i class="far fa-fw fa-edit"></i> Edit</a>
                        <a href="{{ route('blog.destroy', $blog->id) }}" class="btn-delete btn btn-sm btn-icon icon-left btn-danger"><i class="fas fa-fw fa-trash-alt"></i> Delete</a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="9" class="text-center">There's no blog yet</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@push('sweetalert-script')
  <script src="{{ url('backend') }}/node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{ url('backend') }}/assets/js/page/modules-sweetalert.js"></script>
@endpush
@push('addon-script')
 <script src="{{ url('js/app.js') }}"></script>
@endpush


