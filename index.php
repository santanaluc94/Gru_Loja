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
            <?php else: ?>
            <h5>Não temos nenhuma postagem marcada com "Importante" em Destaques no momento.</h5>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </section>

    <section class="secao">
        <div class="row titulo-site">
            <h1>
                <span class="titulo-pagina">Notícias</span>
            </h1>
        </div>

        <?php if(have_posts()): ?>
        <div class="noticias">
            <div class="bloco-inferior row">
                <?php 
                    $argumentos = array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'category_name' => 'Matéria'
                    );
                    $query = new WP_Query($argumentos);
                ?>
                <?php if($query->have_posts()): ?>
                <?php $post = $posts[0]; ?>
                <?php $contador_carrossel = 0; ?>
                <?php $contador_indicador = 0; ?>
                <div class="noticias">

                    <?php while($query->have_posts()): ?>
                    <?php $query->the_post(); ?>

                    <div class="noticia">
                        <?php the_post_thumbnail('post_thumbnail', array('class' => 'img-noticias')); ?>
                        <div class="chamada-noticia">
                            <a class="texto-noticia" href="<?= get_permalink(); ?>"><?= the_title() ?></a>
                        </div>
                    </div>

                    <?php endwhile; ?>

                    <?php else: ?>
                    <h5>Não temos nenhuma postagem marcada como "Matéria" em Destaques no momento.</h5>
                </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
        <?php endif; ?>
    </section>

    <section class="secao">
        <div class="row titulo-site">
            <h1>
                <span class="titulo-pagina">Campeonato Paulista</span>
            </h1>
        </div>

        <div class="row bloco-tabela">
            <table class="tabela-classificacao">
                <thead>
                    <tr class="tabela-titulo">
                        <th colspan="9">SÉRIE B1 - 1ª FASE</th>
                    </tr>
                    <tr>
                        <th class="col-peq dados-classificacao">Class</th>
                        <th class="col-times dados-classificacao">Times</th>
                        <th class="col-peq dados-classificacao">Pts</th>
                        <th class="col-peq dados-classificacao">V</th>
                        <th class="col-peq dados-classificacao">E</th>
                        <th class="col-peq dados-classificacao">D</th>
                        <th class="col-peq dados-classificacao">GP</th>
                        <th class="col-peq dados-classificacao">GC</th>
                        <th class="col-peq dados-classificacao">SD</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-peq dados-classificacao">1</td>
                        <td class="col-times dados-classificacao">FLAMENGO</td>
                        <td class="col-peq dados-classificacao">23</td>
                        <td class="col-peq dados-classificacao">7</td>
                        <td class="col-peq dados-classificacao">2</td>
                        <td class="col-peq dados-classificacao">3</td>
                        <td class="col-peq dados-classificacao">20</td>
                        <td class="col-peq dados-classificacao">12</td>
                        <td class="col-peq dados-classificacao">8</td>
                    </tr>
                    <tr>
                        <td class="col-peq dados-classificacao">2</td>
                        <td class="col-times dados-classificacao">USAC</td>
                        <td class="col-peq dados-classificacao">22</td>
                        <td class="col-peq dados-classificacao">6</td>
                        <td class="col-peq dados-classificacao">4</td>
                        <td class="col-peq dados-classificacao">2</td>
                        <td class="col-peq dados-classificacao">20</td>
                        <td class="col-peq dados-classificacao">16</td>
                        <td class="col-peq dados-classificacao">4</td>
                    </tr>
                    <tr>
                        <td class="col-peq dados-classificacao">3</td>
                        <td class="col-times dados-classificacao">GUARULHOS</td>
                        <td class="col-peq dados-classificacao">21</td>
                        <td class="col-peq dados-classificacao">6</td>
                        <td class="col-peq dados-classificacao">3</td>
                        <td class="col-peq dados-classificacao">3</td>
                        <td class="col-peq dados-classificacao">15</td>
                        <td class="col-peq dados-classificacao">8</td>
                        <td class="col-peq dados-classificacao">7</td>
                    </tr>
                    <tr>
                        <td class="col-peq dados-classificacao">4</td>
                        <td class="col-times dados-classificacao">MAUAENSE</td>
                        <td class="col-peq dados-classificacao">20</td>
                        <td class="col-peq dados-classificacao">5</td>
                        <td class="col-peq dados-classificacao">5</td>
                        <td class="col-peq dados-classificacao">2</td>
                        <td class="col-peq dados-classificacao">16</td>
                        <td class="col-peq dados-classificacao">8</td>
                        <td class="col-peq dados-classificacao">8</td>
                    </tr>
                    <tr>
                        <td class="col-peq dados-classificacao">5</td>
                        <td class="col-times dados-classificacao">MAUÁ FC</td>
                        <td class="col-peq dados-classificacao">16</td>
                        <td class="col-peq dados-classificacao">4</td>
                        <td class="col-peq dados-classificacao">4</td>
                        <td class="col-peq dados-classificacao">4</td>
                        <td class="col-peq dados-classificacao">10</td>
                        <td class="col-peq dados-classificacao">13</td>
                        <td class="col-peq dados-classificacao">-3</td>
                    </tr>
                    <tr>
                        <td class="col-peq dados-classificacao">6</td>
                        <td class="col-times dados-classificacao">BARCELONA</td>
                        <td class="col-peq dados-classificacao">10</td>
                        <td class="col-peq dados-classificacao">2</td>
                        <td class="col-peq dados-classificacao">4</td>
                        <td class="col-peq dados-classificacao">6</td>
                        <td class="col-peq dados-classificacao">11</td>
                        <td class="col-peq dados-classificacao">18</td>
                        <td class="col-peq dados-classificacao">-7</td>
                    </tr>
                    <tr>
                        <td class="col-peq dados-classificacao">7</td>
                        <td class="col-times dados-classificacao">JABAQUARA</td>
                        <td class="col-peq dados-classificacao">2</td>
                        <td class="col-peq dados-classificacao">0</td>
                        <td class="col-peq dados-classificacao">2</td>
                        <td class="col-peq dados-classificacao">10</td>
                        <td class="col-peq dados-classificacao">8</td>
                        <td class="col-peq dados-classificacao">25</td>
                        <td class="col-peq dados-classificacao">-17</td>
                    </tr>

                </tbody>
            </table>
            <table class="tabela-classificacao">
                <thead>
                    <tr class="tabela-titulo">
                        <th colspan="9">SÉRIE B1 - 2ª FASE</th>
                    </tr>
                    <tr>
                        <th class="col-peq dados-classificacao">Class</th>
                        <th class="col-times dados-classificacao">Times</th>
                        <th class="col-peq dados-classificacao">Pts</th>
                        <th class="col-peq dados-classificacao">V</th>
                        <th class="col-peq dados-classificacao">E</th>
                        <th class="col-peq dados-classificacao">D</th>
                        <th class="col-peq dados-classificacao">GP</th>
                        <th class="col-peq dados-classificacao">GC</th>
                        <th class="col-peq dados-classificacao">SD</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-peq dados-classificacao">1</td>
                        <td class="col-times dados-classificacao">MARÍLIA</td>
                        <td class="col-peq dados-classificacao">8</td>
                        <td class="col-peq dados-classificacao">2</td>
                        <td class="col-peq dados-classificacao">2</td>
                        <td class="col-peq dados-classificacao">0</td>
                        <td class="col-peq dados-classificacao">5</td>
                        <td class="col-peq dados-classificacao">3</td>
                        <td class="col-peq dados-classificacao">2</td>
                    </tr>
                    <tr>
                        <td class="col-peq dados-classificacao">2</td>
                        <td class="col-times dados-classificacao">GUARULHOS</td>
                        <td class="col-peq dados-classificacao">6</td>
                        <td class="col-peq dados-classificacao">2</td>
                        <td class="col-peq dados-classificacao">0</td>
                        <td class="col-peq dados-classificacao">2</td>
                        <td class="col-peq dados-classificacao">7</td>
                        <td class="col-peq dados-classificacao">7</td>
                        <td class="col-peq dados-classificacao">0</td>
                    </tr>
                    <tr>
                        <td class="col-peq dados-classificacao">3</td>
                        <td class="col-times dados-classificacao">RIO BRANCO</td>
                        <td class="col-peq dados-classificacao">4</td>
                        <td class="col-peq dados-classificacao">1</td>
                        <td class="col-peq dados-classificacao">1</td>
                        <td class="col-peq dados-classificacao">2</td>
                        <td class="col-peq dados-classificacao">7</td>
                        <td class="col-peq dados-classificacao">5</td>
                        <td class="col-peq dados-classificacao">2</td>
                    </tr>
                    <tr>
                        <td class="col-peq dados-classificacao">4</td>
                        <td class="col-times dados-classificacao">JOSEENSE</td>
                        <td class="col-peq dados-classificacao">4</td>
                        <td class="col-peq dados-classificacao">1</td>
                        <td class="col-peq dados-classificacao">1</td>
                        <td class="col-peq dados-classificacao">1</td>
                        <td class="col-peq dados-classificacao">6</td>
                        <td class="col-peq dados-classificacao">10</td>
                        <td class="col-peq dados-classificacao">-4</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>

<?php get_footer(); ?>