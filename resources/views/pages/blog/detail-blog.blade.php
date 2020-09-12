@extends('layouts.blog')

@section('title')
    Berita Terkini
@endsection

@section('content')
<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
        <div class="col-lg-8 ftco-animate">
          <h2 class="mb-3">
            {{ $items->title }}
            <div class="text-muted" style="font-size: 14px"><a>{{ \Carbon\Carbon::parse($items->date_publish)->translatedFormat('l, d F Y')}}</a></div>
            <div class="text-muted" style="font-size: 14px">Oleh : <a>{{ $items->writer }}</a></div>
          </h2>
          <p>
            <img width="700px" src="{{ Storage::url($items->thumbnail) }}" class="img-fluid" />
          </p>
          <p>
            {!! $items->content !!}
          </p>
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

        <!-- Berita Sebelumnya -->
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
@include('pages.blog.discus')
@endsection