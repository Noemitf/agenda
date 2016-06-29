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
                        <input type="text" name="nombre" value="" placeholder="<?= $contacto->get_nombre()?>" required/>
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" name="apellidos" value="" placeholder="<?= $contacto->get_apellidos()?>" required/>
                        <label for="direccion">Dirección:</label>
                        <input type="text" name="direccion" value="" placeholder="<?= $contacto->get_direccion()?>" required/>
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" name="telefono" value="" placeholder="<?= $contacto->get_telefono()?>" required/>
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="" placeholder="<?= $contacto->get_email()?>" required/>
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