<?php
    require_once LAYOUTS.'/cabeza.php';
?>
        <section>
            <header>
                <h2>
                    Ultimos contactos consultados:
                </h2>
            </header>

            <?php if (isset($contactos)) { ?><!-- si existe $contactos... -->
            <article>
                <ul>
                    <?php for ($i=0;$i<=2;$i++){ ?>
                        <?php if (isset($contactos[$i])){?><!-- si existen posiciones en el array $contactos... -->
                        
                        <li><a href="<?= URLAPLICACION."/index.php?accion=mostrar&id=".$contactos[$i]->get_id(); ?>"><img src="<?= URLIMAGENESDATOS."/".$contactos[$i]->get_imagen(); ?>" alt="Insertar Contacto"/></a><p><?= $contactos[$i]->get_nombre();?></p></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </article>
            <article>
                <ul>
                    <?php for ($i=3;$i<=5;$i++){ ?>
                        <?php if (isset($contactos[$i])){?>
                    <li><a href="<?= URLAPLICACION."/index.php?accion=mostrar&id=".$contactos[$i]->get_id(); ?>"><img src="<?= URLIMAGENESDATOS."/".$contactos[$i]->get_imagen() ?>" alt="Insertar Contacto" /></a><p><?= $contactos[$i]->get_nombre() ?></p></li>
                        <?php } ?>
                    <?php } ?>
                 
                </ul>
            </article>
            
             <?php } ?>
        </section>
        
<?php
    require_once LAYOUTS.'/pie.php';
?>