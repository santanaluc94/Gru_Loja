<div class="patrocinadores-barra-lateral col-md-3 col-sm-12">
    <?php query_posts(array('post_type' => array('patrocinadores'))); ?>
    <?php if(have_posts()): ?>
    <?php while(have_posts()): ?>
    <?php the_post(); ?>
    <a href="<?php the_field('site_do_patrocinador'); ?>" target="_blank" class="link-marcas">
        <img class="img-patrocinador-barra-lateral" src="<?php the_field('imagem_do_patrocinador'); ?>" />
    </a>
    <?php endwhile; ?>
    <?php else: ?>
    <h1>Estamos sem patrocinadores no momento.</h1>
    <?php endif; ?>
</div>  