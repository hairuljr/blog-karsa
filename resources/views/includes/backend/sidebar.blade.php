<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('dashboard') }}">KARSA</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('dashboard') }}">KS</a>
    </div>
    <ul class="sidebar-menu">
        <li class="nav-item dropdown {{ (request()->segment(2) == '') ? 'active' : ''}}">
          <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-warehouse"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Blogs</li>
        <li class="nav-item dropdown {{ (request()->segment(2) == 'categoryBlog') || (request()->segment(2) == 'blog')  ? 'active' : ''}}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i><span>Blog</span></a>
          <ul class="dropdown-menu">
            <li class="{{ (request()->segment(2) == 'categoryBlog') ? 'active' : ''}}"><a class="nav-link" href="{{ route('categoryBlog.index') }}">Blog Categories</a></li>
            <li class="{{ (request()->segment(2) == 'blog') ? 'active' : ''}}"><a class="nav-link" href="{{ route('blog.index') }}">Blog List</a></li>
          </ul>
        </li>
      </ul>
  </aside>
</div>
