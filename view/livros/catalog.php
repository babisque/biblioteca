<?php include __DIR__ . '/../templates/header.php'; ?>
<?php include __DIR__ . '/../templates/navbar.php'; ?>

<div class="container-fluid row row-cols-1 row-cols-md-3 g-4 mt-3">
    <?php foreach ($bookList as $book) {; ?>
        <div class="col">
            <div class="card mb-3 ms-3 h-99 shadow-lg" style="max-width: 540px">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= $book->getImage(); ?>" class="img-fluid rounded-start" alt="..." style="max-height: 300px; min-height: 300px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book->getTitle(); ?></h5>
                            <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical;"><?= $book->getSynopsis(); ?></p>
                            <div class="position-relative">
                                <p class="card-text position-absolute top-0 start-0"><small class="text-muted"><?= $book->getAuthor(); ?></small></p>
                                <div class="position-absolute top-0 end-0">
                                    <a href="/detalhes?id=<?= $book->getId(); ?>" class="btn btn-info btn-sm">Detalhes</a>
                                    <a href="/deletar?id=<?= $book->getId(); ?>" class="btn btn-danger btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }; ?>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
