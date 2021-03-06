<?php include __DIR__ . '/../templates/header.php'; ?>
<?php include __DIR__ . '/../templates/navbar.php'; ?>

<div class="banner">
    <div class="container p-5">
        <h5 class="pb-4">Pais e Filhos</h5>
        <div class="card mx-3 mt-n5 shadow-lg" style="border-radius: 0; border: none">
            <div class="card-body p-5">
                <h4 class="card-title mb-3 text-dark text-uppercase" style="font-weight: 700">Detalhes</h4>
                <?php if (isset($_SESSION['loggedin'])): ?>
                <a href="/editar-livro?id=<?= $book->getId(); ?>" class="btn btn-primary position-absolute top-0 end-0 mt-2 me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                </a>
                <?php endif; ?>

                <img src="<?= $book->getImage(); ?>" alt="Capa do livro" class="img-fluid img-thumbnail rounded float-end" style="max-height: 300px">
                <div class="row">
                    <div class="col mt-3">
                        <p class="fs-4 fw-bold mb-0 pb-0">Título</p>
                        <p class="fs-5 fw-normal mt-0 pt-0"><?= $book->getTitle(); ?></p>
                    </div>

                    <div class="col mt-3">
                        <p class="fs-4 fw-bold mb-0 pb-0">Autor</p>
                        <p class="fs-5 fw-normal mt-0 pt-0"><?= $book->getAuthor(); ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p class="fs-4 fw-bold mb-0 pb-0">Data de Publicação</p>
                        <p class="fs-5 fw-normal mt-0 pt-0"><?= $book->getDate()->format('d F Y'); ?></p>
                    </div>

                    <div class="col">
                        <p class="fs-4 fw-bold mb-0 pb-0">Editora</p>
                        <p class="fs-5 fw-normal mt-0 pt-0"><?= $book->getCompany(); ?></p>
                    </div>
                </div>

                <div class="row mt-5">
                    <p class="fs-4 fw-bold mb-0 pb-0">Sinopse</p>
                    <p class="fs-5 fw-normal mt-0 pt-0"><?= $book->getSynopsis(); ?></p>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
