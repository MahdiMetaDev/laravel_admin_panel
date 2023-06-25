<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route('admin.dashboard.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Site
                </a>

                <div class="sb-sidenav-menu-heading">Index</div>
                <a class="nav-link " href="{{ route('admin.user.index') }}" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayoutsUser"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    users
                </a>

                <a class="nav-link " href="{{ route('admin.blog.index') }}" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayoutsBlog"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    blogs
                </a>

                <a class="nav-link " href="{{ route('admin.product.index') }}" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayoutsProduct"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    products
                </a>

                <a class="nav-link " href="{{ route('admin.brand.index') }}" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayoutsBrand"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    brands
                </a>

                <a class="nav-link " href="{{ route('admin.category.index') }}" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayoutsCategory"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    categories
                </a>

                <a class="nav-link " href="{{ route('admin.comment.index') }}" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayoutsCategory"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    comments
                </a>

                <div class="sb-sidenav-menu-heading">Create</div>
                <a class="nav-link " href="{{ route('admin.user.create') }}" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayoutsCategory"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    user
                </a>

                <a class="nav-link " href="{{ route('admin.product.create') }}" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayoutsCategory"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    product
                </a>

                <a class="nav-link " href="{{ route('admin.blog.create') }}" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayoutsCategory"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    blog
                </a>

                <a class="nav-link " href="{{ route('admin.category.create') }}" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayoutsCategory"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    category
                </a>

                <a class="nav-link " href="{{ route('admin.brand.create') }}" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayoutsCategory"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    brand
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            @if(auth()->user())
                <b>{{ auth()->user()->name }}</b>
            @endif
        </div>
    </nav>
</div>
