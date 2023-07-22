<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize">
    <title>Produtos Watch Life</title>
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="four columns">
                <!--<img src="img/THE.png" id="logo">-->
            </div>
            <div class="two columns u-pull-right">
                <ul>
                    <li class="submenu">
                            <img src="img/cart.png" id="img-carrito">
                            <div id="carrito">
                                    
                                    <table id="lista-carrito" class="u-full-width">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>

                                    <a href="#" id="vaciar-carrito" class="button u-full-width">Vaciar Carrito</a>
                            </div>
                    </li>
                </ul>
            </div>
        </div> 
    </div>
    </header>


    <div id="hero">
        <div class="container">
            <div class="row">
                    <div class="six columns">
                        <div class="contenido-hero">
                                <h2>Bienvenido</h2>
                                <p>El futuro frente a tus ojos </p>
                                <form action="#" id="busqueda" method="post" class="formulario">
                                    <input class="u-full-width" type="text" placeholder="¿Que te gustaría comprar?" id="buscador">
                                    <input type="submit" id="submit-buscador" class="submit-buscador">
                                </form>
                        </div>
                    </div>
            </div> 
        </div>
    </div>

    <div class="barra">
        <div class="container">
            <div class="row">
                    <div class="four columns icono icono1">
                        <p>Refiere a tus amigos<br>
                        Consigue 15% DTO. extra</p>
                    </div>
                    <div class="four columns icono icono2">
                        <p>Envio gratis <br>
                        Desde su primer pedido +$MXN1000</p>
                    </div>
                    <div class="four columns icono icono3">
                        <p>Devolucion gratis <br>
                        Zonas permitidas, mas info</p>
                    </div>
            </div>
        </div>

    </div>

    <div id="lista-cursos" class="container">
        <h1 id="encabezado" class="encabezado">Productos</h1>
        <div class="row">
            <div class="four columns">
                <div class="card">
                    <img src="">!
                    <div class="info-card">
                        <h4>Lentes (color:Negro)</h4>
                        <p>Watch Life</p>
                        <img src="img/estrellas.png">
                        <p class="precio">$  <span class="u-pull-right ">$</span></p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="1">Agregar Al Carrito</a>
                    </div>
                </div> <!--.card-->
            </div>
            <div class="four columns">
                    <div class="card">
                        <img src="././img/estuche.png" class="imagen-curso u-full-width">
                        <div class="info-card">
                            <h4>Estuche</h4>
                            <p>Watch Life</p>
                            <img src="">
                            <p class="precio">$  <span class="u-pull-right ">$</span></p>
                            <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="2">Agregar Al Carrito</a>
                        </div>
                    </div>
            </div>
            <div class="four columns">
                    <div class="card">
                        <img src="" class="imagen-curso u-full-width">
                        <div class="info-card">
                            <h4>Lentes (Color:Azul)</h4>
                            <p>Watch Life</p>
                            <img src="img/estrellas.png">
                            <p class="precio">$ <span class="u-pull-right ">$</span></p>
                            <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="3">Agregar Al Carrito</a>
                        </div>
                    </div> <!--.card-->
            </div>

        </div>
    </footer>

    <script src="js/app.js"></script>

</body>
</html>