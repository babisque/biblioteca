<?php include __DIR__ . '/../templates/header.php'; ?>
<?php include __DIR__ . '/../templates/navbar.php'; ?>

    <div class="banner">
        <div class="container p-5">
            <h5 class="pb-4">Formulário</h5>
            <div class="card mx-3 mt-n5 shadow-lg" style="border-radius: 0; border: none">
                <div class="card-body p-5">
                    <h4 class="card-title mb-3 text-dark text-uppercase" style="font-weight: 700">Adicionar livro</h4>

                    <form action="/salvar-livro<?= isset($book) ? '?id=' . $book->getId() : ''; ?>" method="post" autocomplete="off">
                        <div class="row">
                            <?php if (isset($book)): ?>
                            <div class="col-1">
                                <fieldset disabled>
                                    <div class="form-floating mb-3">
                                        <input type="text" id="bookid" name="bookid" class="form-control" placeholder="id" value="<?= $book->getId(); ?>">
                                        <label for="bookid">ID</label>
                                    </div>
                                </fieldset>
                            </div>
                            <?php endif; ?>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" id="booktitle" name="booktitle" class="form-control" placeholder="A Cabana" value="<?= isset($book) ? $book->getTitle() : ''; ?>">
                                    <label for="booktitle">Título do livro</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" id="bookauthor" name="bookauthor" class="form-control" placeholder="William P. Young" value="<?= isset($book) ? $book->getAuthor() : ''; ?>">
                                    <label for="bookauthor">Autor</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="date" id="date" name="releasedate" class="form-control" value="<?= isset($book) ? $book->getDate()->format('m/d/Y') : ''; ?>">
                                    <label for="date">Data de publicação</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" id="editora" name="company" class="form-control" placeholder="Editora Arqueiro" value="<?= isset($book) ? $book->getCompany() : ''; ?>">
                                    <label for="editora">Editora</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" id="image" name="image" class="form-control" placeholder="image.jpg" value="<?= isset($book) ? $book->getImage() : ''; ?>">
                            <label for="image">Link da imagem</label>
                        </div>
                        <div class="form-floating">
                            <textarea id="sinopse" name="synopsis" class="form-control" placeholder="Adicione a sinopse aqui" style="height: 100px"><?= isset($book) ? $book->getSynopsis() : ''; ?></textarea>
                            <label for="sinopse" class="form-label">Sinopse</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/../templates/footer.php'; ?>