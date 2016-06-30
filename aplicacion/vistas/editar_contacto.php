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
                <form enctype="multipart/form-data" action="<?= URLAPLICACION.'/index.php?accion=editar'?>" method="post">
                    <fieldset>
                        <img src="<?= URLIMAGENESDATOS ?>/<?= $contacto->get_imagen()?>" alt="Foto <?= $contacto->get_nombre()?>" />

                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" value="" placeholder="<?= $contacto->get_nombre()?>"/>
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" name="apellidos" value="" placeholder="<?= $contacto->get_apellidos()?>"/>
                        <label for="direccion">Dirección:</label>
                        <input type="text" name="direccion" value="" placeholder="<?= $contacto->get_direccion()?>"/>
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" name="telefono" value="" placeholder="<?= $contacto->get_telefono()?>"/>
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="" placeholder="<?= $contacto->get_email()?>"/>
                        <label for="imagen">Imagen:</label>
                        <input type="file" name="fichero" value="" />
                        <input type="hidden" name="id" value="<?= $contacto->get_id()?>"/>
                        <input type="hidden" name="imagen" value="<?= $contacto->get_imagen()?>"/>

                        <input class="boton" type="submit" name="enviar" value="Enviar" />
                    </fieldset>
                </form>
                <?php }?>
            </article>
        </section>
        
<?php
    require_once LAYOUTS.'/pie.php';
?>