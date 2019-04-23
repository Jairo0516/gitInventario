<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>

    <section style="width: 100%;">
        <center>

            <form action="?c=usuario&a=Iniciar" method="POST">
                <h3>Iniciar Sesión</h3>
                <div>
                    <label>Usuario:</label><br>
                    <input  type="text" placeholder="Usuario"  name="user">
                </div>
                <div >
                    <label >Contraseña:</label><br>
                    <input  type="password" placeholder="Contraseña"  name="password" >
                </div>

                <div>
                    <br>
                    <button>Iniciar</button>
                </div>
            </form>
        </center>
    </section>
  </body>
  <script src="assets/js/jquery-3.2.1.min.js"></script>
</html>