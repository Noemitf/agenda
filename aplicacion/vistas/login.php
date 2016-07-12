<?php
    require_once LAYOUTS.'/cabeza.php';
?>
<section>
    <header>
        <h2>
            Login:
        </h2>
    </header>

    <article>
        <?php if (isset($mensaje)): ?>
        
            <p><?= $mensaje ?></p>
        <?php endif; ?>
        
        <form action="<?= URLAPLICACION.'/index.php?accion=login' ?>" method="post">
            <fieldset>
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" value="" required/>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="" required/>
                <input class="boton" type="submit" name="enviar" id="enviar" value="Iniciar sesión" />
            </fieldset>
        </form>
    </article>
</section>

<?php
    require_once LAYOUTS.'/pie.php';
?>
