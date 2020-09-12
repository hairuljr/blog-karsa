@extends('layouts.blog')

@section('title')
    Blog Terkini
@endsection

@section('content')
<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <h3 class="mb-5">
          Pencarian Blog dengan Keyword : <code>{{ $cari}}</code>
        </h3>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <div class="row">
          @forelse ($pencarian as $item)
          <div class="col-md-12 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch d-md-flex">
              <a href="{{ route('blog-detail', $item->slug) }}" class="block-20" style="background-image: url('{{ Storage::url($item->thumbnail) }}');">
              </a>
              <div class="text d-block pl-md-4">
                <div class="meta mb-3">
                  <div><a>{{ $item->date_publish }}</a></div>
                  <div><a>{{ $item->writer }}</a></div>
                </div>
                <h3 class="heading">
                  <a href="{{ route('blog-detail', $item->slug) }}">{{ $item->title }}</a>
                </h3>
                <p>{!! substr($item->content, 0,  10) !!}</p>
                <p>
                  <a href="{{ route('blog-detail', $item->slug) }}" class="btn btn-primary py-2 px-3">Selengkapnya</a>
                </p>
              </div>
            </div>
          </div>
          @empty
              <div class="col-md-12 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch d-md-flex">
                  <div class="text d-block pl-md-4">
                    <p>{!! "Blog dengan keyword <code style='font-size: 18px'>" .$cari."</code> tidak ditemukan" !!}</p>
                  </div>
                </div>
              </div>
          @endforelse
        </div>
      </div>
      <!-- side kanan blog-->
      <div class="col-lg-4 sidebar ftco-animate">
        <div class="sidebar-box">
          <form action="{{ route('cari-blog') }}" class="search-form" method="GET">
            <div class="form-group">
              <input type="text" class="form-control" name="cari" placeholder="Cari..." />
              <button type="submit" class="btn icon ion-ios-search"></button>
            </div>
          </form>
        </div>

        <!-- Kolom Category -->
        <div class="sidebar-box ftco-animate">
          <h3 class="heading">Kategori</h3>
          <ul class="categories">
            @foreach ($jml_category as $item)
            <li>
              <a href="{{ route('kategori', $item->slug) }}">{{ $item->category_name }}
                <span>({{ $item->jml_kategori }})</span>
              </a>
            </li>
            @endforeach
          </ul>
        </div>

        <!-- Blog Sebelumnya -->
        <div class="sidebar-box ftco-animate">
          <h3 class="heading">Blog Populer</h3>
          @foreach ($blogPopuler as $item)
          <div class="block-21 mb-4 d-flex">
            <a href="{{ route('blog-detail', $item->slug) }}" class="blog-img mr-4" style="background-image: url('{{ Storage::url($item->thumbnail) }}');"></a>
            <div class="text">
              <h3 class="heading-1">
                <a href="{{ route('blog-detail', $item->slug) }}">{{ $item->title }}</a>
              </h3>
              <div class="meta">
                <div>
                  <a><span class="icon-calendar"></span> {{ $item->date_publish }}</a>
                </div>
                <div>
                  <a><span class="icon-person"></span> {{ $item->writer }}</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <p>
        <a href="{{ route('blog') }}" class="btn btn-primary ml-3 py-2 px-3">Kembali</a>
      </p>
    </div>
  </div>
</section>
<!-- .section -->
@endsection