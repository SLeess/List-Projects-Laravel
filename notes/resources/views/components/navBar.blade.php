<nav class="row mb-3 align-items-center">
    <div class="col">
        <img src="{{ asset('images/logo.png') }}" alt="Notes logo">
    </div>
    <div class="col text-center">
        A simple <span class="text-warning">Laravel</span> project!
    </div>
    <div class="col">
        <div class="d-flex justify-content-end align-items-center">
            <span class="me-3"><i
                    class="fa-solid fa-user-circle fa-lg text-secondary me-3"></i>{{ session('user')['username'] }}</span>
            <a href="{{ Route('logout') }}" class="btn btn-outline-secondary px-3">
                Logout<i class="fa-solid fa-arrow-right-from-bracket ms-2"></i>
            </a>
        </div>
    </div>
</nav>
<hr>
