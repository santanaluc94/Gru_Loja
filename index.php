<?php get_header(); ?>

<div class="container">
    <section class="secao">
        <?php if(have_posts()): ?>
        <?php 
            $argumentos = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'category_name' => 'Importante'
            );
            $query = new WP_Query($argumentos);
        ?>
        <?php if($query->have_posts()): ?>
        <?php $post = $posts[0]; ?>
        <?php $contador_carrossel = 0; ?>
        <?php $contador_indicador = 0; ?>

        <div id="carousel-slide" class="carousel slide" style="z-index: 0;">
            <ol class="carousel-indicators">
                <?php while($contador_indicador < 3): ?>
                <li data-target="#carousel-slide" data-slide-to="<?= $contador_indicador++; ?>"
                    class="<?php if($contador_indicador === 1) {echo 'active';} ?>"></li>
                <?php endwhile; ?>
            </ol>
            <div class="carousel-inner">
                <?php while($query->have_posts()): ?>
                <?php $query->the_post(); ?>
                <div
                    class="carousel-item<?php $contador_carrossel++; if($contador_carrossel === 1) {echo ' active';} ?>">
                    <?php the_post_thumbnail('post_thumbnail', array('id' => 'carousel-img', 'class' => 'carousel-img', 'alt' => 'First Slide')); ?>
                    <div class="carousel-caption">
                        <a class="link-carrossel" href="<?= get_permalink(); ?>">
                            <div class="noticia_carrosel">
                                <h3><?php the_title(); ?></h3>
                                <span class="d-none d-md-block"><?php the_excerpt(); ?></span>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_query(); ?>

            <a class="carousel-control-prev carrossel-botao" href="#carousel-slide" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next carrossel-botao" href="#carousel-slide" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
            <?php else: ?>
            <h5>Não temos nenhuma postagem marcada com "Importante" em Destaques no momento.</h5>
            <?php endif; ?>
        <?php endif; ?>
    </section>

    <section class="secao">
        <div class="row titulo-site">
            <h1>
                <span class="titulo-pagina">Novidades</span>
            </h1>
        </div>
        <?php 
            $argumentos = array(
                'post_type' => 'product',
                'posts_per_page' => 9,
            );
            $query = new WP_Query($argumentos);
        ?>
        <?php if($query->have_posts()): ?>
        <?php $post = $posts[0]; ?>
        <div class="bloco-novidades" id="novidades">
            <button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;">>‹</button>
            <div class="bloco-inferior">
                <div class="novidades">
                    <?php while($query->have_posts()): ?>
                    <?php $query->the_post(); ?>
                    <?php if($product->get_stock_status()): ?>
                    <div class="novo">
                        <?php the_post_thumbnail('post_thumbnail', array('class' => 'img-novo')); ?>
                        <div class="chamada-novo">
                            <a class="texto-novo" href="<?= get_permalink(); ?>"><?= the_title() ?></a>
                            <div class="comprar col-12">
                                <span class="comprar">Preço: <?= $product->price ?></span>
                                <button class="btn btn-sm comprar ">Comprar</button>
                            </div>
                        </div>
                    </div>
                    <?php wp_reset_query(); ?>
                    <?php else: ?>
                    <h3>Não temos produtos em estoque</h3>
                    <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
            <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;">></button>
        </div>
        <?php else: ?>
        <h5>Não temos nenhuma postagem marcada como "Matéria" em Destaques no momento.</h5>
        <?php endif; ?>
    </section>

</div>
    
<?php get_footer(); ?>