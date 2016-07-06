<?php
    require_once LAYOUTS.'/cabeza.php';
?>
<section>
    <header>
        <h2>
            Insertar Usuario:
        </h2>
    </header>

    <article>
        <form action="<?= URLAPLICACION.'/index.php?accion=insertarUsuario' ?>" method="post">
            <fieldset>
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" value="" required/>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="" required/>
                <label for="rol">Rol:</label>
                <select id="rol" name="rol">
                    <option value="invitado">Invitado</option>
                    <option value="administrador">Administrador</option>
                </select>
                <input class="boton" type="submit" name="enviar" id="enviar" value="Enviar" />
            </fieldset>
        </form>
    </article>
</section>

<?php
    require_once LAYOUTS.'/pie.php';
?>
