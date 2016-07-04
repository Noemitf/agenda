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
                        <input type="text" name="nombre" value="<?= $contacto->get_nombre()?>" placeholder="Introduce nombre"/>
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" name="apellidos" value="<?= $contacto->get_apellidos()?>" placeholder="Introduce apellidos"/>
                        <label for="direccion">Dirección:</label>
                        <input type="text" name="direccion" value="<?= $contacto->get_direccion()?>" placeholder="Introduce direccion"/>
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" name="telefono" value="<?= $contacto->get_telefono()?>" placeholder="Introduce telefono"/>
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?= $contacto->get_email()?>" placeholder="Introduce email"/>
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