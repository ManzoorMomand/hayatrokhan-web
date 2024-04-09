<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ request()->routeIs('admin_home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            </li>

            <!-- Category Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                    <a class="dropdown-item" href="{{ route('admin_category_show') }}">Category</a>
                    <a class="dropdown-item" href="{{ route('admin_sub_category_show') }}">Sub Category</a>
                    <a class="dropdown-item" href="{{ route('admin_post_show_ajax') }}">Post</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Distributor
                </a>
                <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                    <a class="dropdown-item" href="{{ route('admin_d_category_show') }}">Category</a>
                    <a class="dropdown-item" href="{{ route('admin_d_sub_category_show') }}">Sub Category</a>
                    <a class="dropdown-item" href="{{ route('admin_d_post_show_ajax') }}">Distributor_Post</a>
                </div>
            </li>

            <!-- News Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="newsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    News
                </a>
                <div class="dropdown-menu" aria-labelledby="newsDropdown">
                    <a class="dropdown-item" href="{{ route('admin_news_category_show') }}">News Category</a>
                    <a class="dropdown-item" href="{{ route('admin_news_show_ajax') }}">News Post</a>
                </div>
            </li>
           
            <li class="{{ request()->routeIs('admin_team_show_ajax') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_team_show_ajax') }}">
                    <i class="fas fa-book"></i> Team
                </a>
            </li>
            <!-- Setting Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="settingDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Setting
                </a>
                <div class="dropdown-menu" aria-labelledby="settingDropdown">
                    <a class="dropdown-item" href="{{ route('admin_setting') }}">Setting</a>
                </div>
            </li>

            <!-- Gallery -->
            <li class="{{ request()->routeIs('admin_photo_show') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_photo_show') }}">
                    <i class="fas fa-camera"></i> Gallery
                </a>
            </li>

            <!-- Slider -->
            <li class="{{ request()->routeIs('admin_slider_show') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_slider_show') }}">
                    <i class="fas fa-camera"></i> Slider
                </a>
            </li>

            <!-- Video -->
            <li class="{{ request()->routeIs('admin_video_show') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_video_show') }}">
                    <i class="fas fa-video"></i> Video
                </a>
            </li>

          


            <!-- Social Item -->
            <li class="{{ request()->routeIs('admin_social_item_show') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_social_item_show') }}">
                    <i class="fas fa-list"></i> Social Item
                </a>
            </li>

            <!-- Author -->
            <li class="{{ request()->routeIs('admin_author_user_show') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_author_user_show') }}">
                    <i class="fas fa-list"></i> Author
                </a>
            </li>

            <!-- Contact -->
            <li class="{{ request()->routeIs('contact.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('contact.index') }}">
                    <i class="fas fa-list"></i> Contact
                </a>
            </li>

            <!-- Pages Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pages
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="{{ route('admin_page_show') }}">About</a>
                    <a class="dropdown-item" href="{{ route('admin_contact_show') }}">Contact</a>
                    <a class="dropdown-item" href="{{ route('admin_login_show') }}">Login</a>
                    <!-- Add more pages here -->
                </div>
            </li>
        </ul>
    </aside>
</div>
