<?php
    require_once LAYOUTS.'/cabeza.php';
?>    
        <section>
            <header>
                <h2>
                    Formulario Contacto - Editar
                </h2>
            </header>

            <article>
                <?php if (isset($contacto)){?>
                <form action="#" method="post">
                    <fieldset>
                        <img src="<?= URLIMAGENESDATOS ?><?= $contacto->get_imagen()?>" alt="Foto <?= $contacto->get_nombre()?>" />

                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" value="" placeholder="Introduce nombre" required/>
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" name="apellidos" value="" placeholder="Introduce apellidos" required/>
                        <label for="direccion">Dirección:</label>
                        <input type="text" name="direccion" value="" placeholder="Introduce dirección" required/>
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" name="telefono" value="" placeholder="Introduce teléfono" required/>
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="" placeholder="Introduce email" required/>
                        <label for="imagen">Imagen:</label>
                        <input type="file" name="fichero" value="" />

                        <input class="boton" type="submit" name="enviar" value="Enviar" />
                    </fieldset>
                </form>
                <?php }?>
            </article>
        </section>
        
<?php
    require_once LAYOUTS.'/pie.php';
?>