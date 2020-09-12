@extends('layouts.admin')

@section('title')
    Blog || Show
@endsection

@section('content')
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <a href="{{ route('blog.index') }}" class="btn btn-icon btn-primary"><i class="fas fa-arrow-left"></i> Back to List</a>
        </div>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Blog</a></div>
          <div class="breadcrumb-item">View</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">All Blog</h2>
        <div class="row">
          @forelse ($blogs as $blog)
          <div class="col-12 col-md-4 col-lg-4">
            <article class="article article-style-c">
              <div class="article-header">
                <div class="article-image" data-background="{{ Storage::url($blog->thumbnail) }}">
                </div>
              </div>
              <div class="article-details">
                <div class="article-category"><a href="#">{{ $blog->categories->first()->category_name }}</a> <div class="bullet"></div> <a href="#">{{ $blog->status}}</a></div>
                <div class="article-title">
                  <h2><a href="#">{{ $blog->blog_name }}</a></h2>
                </div>
                <p>{!! $blog->description !!}</p>
                <div class="article-user">
                  <img alt="image" src="{{ url('backend') }}/assets/img/avatar/avatar-1.png">
                  <div class="article-user-details">
                    <div class="user-detail-name">
                      <a href="#">{{ $blog->title }}</a>
                    </div>
                    <div class="text-job">{{ $blog->writer }}</div>
                  </div>
                </div>
              </div>
            </article>
          </div>
          @empty
            <div class="col-12 d-flex justify-content-center">
              <p>There's no blog</p>
            </div>
          @endforelse
        </div>
      </div>
    </section>
  </div>
@endsection