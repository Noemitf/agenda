<?php
    require_once LAYOUTS.'/cabeza.php';
?>

        <section>
            <header>
                <h2>
                    Mostrar Contacto
                </h2>
            </header>
            <?php if (isset($contacto)){?>
            <article id="contacto">
                <header>
                    <img src="<?= URLIMAGENESDATOS ?><?= $contacto->get_imagen()?>" alt="Foto" />
                </header>
                <ul>
                    <li><span>Nombre:</span><?= $contacto->get_nombre()?></li>
                    <li><span>Apellidos:</span><?= $contacto->get_apellidos()?></li>
                    <li><span>Dirección:</span><?= $contacto->get_direccion()?></li>
                    <li><span>Teléfono:</span><?= $contacto->get_telefono()?></li>
                    <li><span>Email:</span><?= $contacto->get_email()?></li>
                </ul>
                <img src="<?= URLIMAGENES ?>/mapa.jpg" src="mapa" />
            </article>
            <?php }?>
        </section>

<?php
    require_once LAYOUTS.'/pie.php';
?>