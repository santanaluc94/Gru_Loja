<?php get_header(); ?>

<div class="container">
    <section class="secao">
        <div class="row titulo-site">
            <h1>
                <span class="titulo-pagina">Promoções</span>
            </h1>
        </div>

        <?php 
            $argumentos = array(
                'post_type' => 'product',
                'posts_per_page' => 16,
            );
            $query = new WP_Query($argumentos);
        ?>
        <?php if($query->have_posts()): ?>
        <?php $post = $posts[0]; ?>
        <div class="bloco-promocoes" id="promocoes">
            <?php while($query->have_posts()): ?>
            <?php $query->the_post(); ?>
            <?php if($product->get_stock_status()): ?>
                <?php if ($product->get_price() < $product->get_regular_price()): ?>
                <div class="novo">
                    <?php the_post_thumbnail('post_thumbnail', array('class' => 'img-novo')); ?>
                    <div class="chamada-novo">
                        <a class="texto-novo" href="<?= get_permalink(); ?>"><?= the_title() ?></a>
                        <div class="comprar col-12">
                            <span class="comprar">R$ <?= str_replace(".", ",", $product->price) ?></span>
                            <button class="btn btn-sm comprar">
                                <i class="comprar fa fa-shopping-cart" aria-hidden="true" style="font-size: 16px"></i>&nbsp Comprar
                                </button>
                        </div>
                    </div>
                </div>
                <?php wp_reset_query(); ?>
                <?php endif; ?>
            <?php else: ?>
            <h3>Não temos produtos em promoção</h3>
            <?php endif; ?>
            <?php endwhile; ?>
            </div>
            <?php else: ?>
            <h5>Não temos nenhum produto cadastrado no momento.</h5>
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
                'posts_per_page' => 16,
            );
            $query = new WP_Query($argumentos);
        ?>
        <?php if($query->have_posts()): ?>
        <?php $post = $posts[0]; ?>
        <div class="bloco-novidades" id="novidades">
                <?php while($query->have_posts()): ?>
                <?php $query->the_post(); ?>
                <?php if($product->get_stock_status()): ?>
                <div class="novo">
                    <?php the_post_thumbnail('post_thumbnail', array('class' => 'img-novo')); ?>
                    <div class="chamada-novo">
                        <a class="texto-novo" href="<?= get_permalink(); ?>"><?= the_title() ?></a>
                        <div class="comprar col-12">
                            <span class="comprar">R$ <?= str_replace(".", ",", $product->price) ?></span>
                            <button class="btn btn-sm comprar">
                                <i class="comprar fa fa-shopping-cart" aria-hidden="true" style="font-size: 16px"></i>&nbsp Comprar
                                </button>
                        </div>
                    </div>
                </div>
                <?php wp_reset_query(); ?>
                <?php else: ?>
                <h3>Não temos produtos em estoque</h3>
                <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
        <h5>Não temos nenhum produto cadastrado no momento.</h5>
        <?php endif; ?>
    </section>

</div>
    
<?php get_footer(); ?>