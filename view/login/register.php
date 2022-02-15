<?php include __DIR__ . '/../templates/header.php'; ?>
<?php include __DIR__ . '/../templates/navbar.php'; ?>

    <div class="banner">
        <div class="container p-5">
            <h5 class="pb-4">Registrar-se</h5>
            <div class="card mx-3 mt-n5 shadow-lg col-10">
                <div class="card-body p-5">
                    <form action="/realizar-registro" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="email" id="emailLogin" name="emailLogin" class="form-control" placeholder="teste@teste.com">
                                    <label for="emailLogin">E-mail</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="password" id="passwordLogin" name="passwordLogin" class="form-control" placeholder="teste123">
                                    <label for="passwordLogin">Senha</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/../templates/footer.php'; ?>