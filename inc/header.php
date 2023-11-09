<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="./inc/.." class="navbar-brand">
                <img class="logo" src="./assets/img/LOGO WEBSEM.png" alt="">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href=".inc/.." class="nav-item nav-link <?= !isset($_GET['p']) ? 'active' : '' ?>">Home</a>
                    <a href="?p=search" class="nav-item nav-link <?php if (isset($_GET['p']) && $_GET['p'] == 'search') echo 'active'; ?>">Destinasi</a>
                    <a href="?p=about" class="nav-item nav-link <?php if (isset($_GET['p']) && $_GET['p'] == 'about') echo 'active'; ?>">About</a>
                </div>
            </div>
        </nav>
    </div>
</div>