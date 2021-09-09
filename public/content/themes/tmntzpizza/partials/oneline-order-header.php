        <section class="oneline-order-menu-container fixed">
            <nav class="oneline-order-menu">
                <a href="<?= home_url();?>"><img src="<?= get_theme_file_uri();?>/assets/images/tmnt_logo.png" alt="" id="header__logo"></a>
                <div class="oneline-order-menu-content">
                    <h2>COMMANDEZ EN LIGNE</h2>
                    <?php if ($isUserLogged === true) : ?>
                    <?php else : ?>
                    <ul>
                        <li class="pizza-home-thumbnail__link">
                            <a href="<?= home_url();?>/order/delivery/">LIVRAISON</a>
                        </li>
                        <li><span>ou</span></li>
                        <li class="pizza-home-thumbnail__link">
                            <a href="<?= home_url();?>/order/pickup/">A EMPORTER</a>
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
            </nav>
        </section>