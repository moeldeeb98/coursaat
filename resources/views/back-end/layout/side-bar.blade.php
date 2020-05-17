<div class="sidebar" data-color="purple" data-background-color="black" data-image="/assets/img/sidebar-2.jpg">

    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav=item ">
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav=item {{ is_active('users') }}">
                <a class="nav-link " href="{{ route('users.index') }}">
                    <i class="material-icons">people</i>
                    <p>Users</p>
                </a>
            </li>

            <li class="nav=item {{ is_active('categories') }}">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="material-icons">category</i>
                    <p>Categories</p>
                </a>
            </li>

            <li class="nav=item {{ is_active('skills') }}">
                <a class="nav-link" href="{{ route('skills.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Skills</p>
                </a>
            </li>

            <li class="nav=item {{ is_active('tags') }}">
                <a class="nav-link" href="{{ route('tags.index') }}">
                    <i class="material-icons">tag</i>
                    <p>Tags</p>
                </a>
            </li>

        </ul>
    </div>
</div>
