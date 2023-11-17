
<head>
    <title>Cadastro de empresas</title>
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>
    <div class="screen">
        <div class="leftside">
            <img src="cadastro.png" alt="">
        </div>
        <div class="rigthside">
            <h1>Cadastre sua empresa</h1>

            <form method="POST" action="adicionar_action.php" class="validador">
                <label>
                    Seu nome:<br/>
                    <input type="text" name="name" data-rules="required|min=2" />
                </label>
                <label>
                    Seu e-mail:<br/>
                    <input type="text" name="email" data-rules="required|email" />
                </label>
                <label>
                    Seu telefone:<br>
                    <input type="int" name="telefone" data-rules="required|min=11" />
                </label>
                <label>
                    <input type="submit" value="Cadastrar" />
                </label>
                            
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>