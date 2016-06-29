<?php
    require_once LAYOUTS.'/cabeza.php';
?>
        
        <section>
            <header>
                <h2>
                    Contactos:
                </h2>
            </header>

            <article>
                <table>
                    <thead>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<count($contactos);$i++){?>
                        <?php if (isset($contactos[$i])){?>
                        <tr>
                            <?php $contactos[$i]->get_id()?>
                            <td><img src="<?= URLIMAGENESDATOS ?>/<?= $contactos[$i]->get_imagen()?>" alt="Foto <?= $contactos[$i]->get_nombre()?>" /></td>
                            <td><?= $contactos[$i]->get_nombre()?></td>
                            <td><a href="<?= URLAPLICACION.'/index.php?accion=mostrar&id='.$contactos[$i]->get_id()?>"><img class="accion" src="<?= URLIMAGENES ?>/view.png" alt="Ver" /></a></td>
                            <td><a href="<?= URLAPLICACION.'/index.php?accion=vistaeditar&id='.$contactos[$i]->get_id()?>"><img class="accion" src="<?= URLIMAGENES ?>/edit.png" alt="Editar" /></a></td>
                            <td><a href="<?= URLAPLICACION.'/index.php?accion=borrar&id='.$contactos[$i]->get_id()?>"><img class="accion" src="<?= URLIMAGENES ?>/delete.png" alt="Borrar" /></a></td>
                        </tr>
                        <?php }?>
                        <?php }?>
                        
                    </tbody>
                </table>
            </article>
            
        </section>
<?php
    require_once LAYOUTS.'/pie.php';
?>