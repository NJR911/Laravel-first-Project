<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">

            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="{{ (Route::is('admin.dashboard')) ? 'text-white bg-primary rounded' : '' }} nav-link">
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.users') }}" class="{{ (Route::is('admin.users')) ? 'text-white bg-primary rounded' : '' }} nav-link">
                    <span>Users</span></a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.ideas') }}" class="{{ (Route::is('admin.ideas')) ? 'text-white bg-primary rounded' : '' }} nav-link">
                    <span>Ideas</span></a>
            </li>

        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href="{{ route('profile') }}"> View Profile </a>
    </div>
</div>
