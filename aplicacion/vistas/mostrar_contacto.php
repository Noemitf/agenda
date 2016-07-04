<?php
    require_once LAYOUTS.'/cabeza.php';
?>

        <section>
            <header>
                <h2>
                    Mostrar Contacto
                </h2>
            </header>
           
            <article id="contacto">
                <header>
                    <img src="<?= URLIMAGENESDATOS ?>/<?= $contacto->get_imagen()?>" alt="Foto" />
                </header>
                <ul>
                    <li><span>Nombre:</span><?= $contacto->get_nombre()?></li>
                    <li><span>Apellidos:</span><?= $contacto->get_apellidos()?></li>
                    <li><span>Dirección:</span><?= $contacto->get_direccion()?></li>
                    <li><span>Teléfono:</span><?= $contacto->get_telefono()?></li>
                    <li><span>Email:</span><?= $contacto->get_email()?></li>
                </ul>
                <div id="mapa"> </div>
                <script type="text/javascript"> load('<?= $contacto->get_direccion() ?>'); </script>
            </article>
         
        </section>

<?php
    require_once LAYOUTS.'/pie.php';
?>