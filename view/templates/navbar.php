<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <?php if (isset($_SESSION['loggedin'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/novo-livro">Adicionar Livros</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <?php if (!isset($_SESSION['loggedin'])): ?>
    <a href="/login" class="btn btn-outline-success me-3">Login</a>
    <?php else: ?>
    <a href="/logout" class="btn btn-outline-danger me-3">Logout</a>
    <?php endif; ?>
</nav>
