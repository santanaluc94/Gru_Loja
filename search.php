<?php get_header(); ?>

<?php if (have_posts()) : ?>
<h2>Resultados da busca por: <?php the_search_query(); ?></h2>

<?php while (have_posts()) : the_post(); ?>
    <article class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
        </div>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
    </article>
    <?php endwhile; ?>
    <?php else: ?>
        <p>Nenhum post encontrado</p>
    <?php endif; ?>

<?php get_footer(); ?>
