<main class="container">
    <section style="display:flex; justify-content:center;">
        <div class="card" style="width:100%; max-width:520px;">
            <h2>Login</h2>

            <p class="text-dark-gray">
                Acesse sua conta para continuar.
            </p>

            <form action="/mvc/login" method="POST">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="seuemail@email.com"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Digite sua senha"
                        required
                    >
                </div>

                <div class="form-group-inline">
                    <div class="custom-control">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Lembrar acesso</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="width:100%; margin-top:1rem;">
                    Entrar
                </button>
            </form>

            <hr>

            <p>
                <a href="/mvc">Voltar para Home</a>
            </p>
        </div>
    </section>
</main>