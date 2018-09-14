        </div> <!-- row -->
    </main> <!-- container -->
    <footer class="footer">
        <div>
            <a href="https://github.com/SasakiPeter">
                <i class="fab fa-github fa-3x link__github"></i>
            </a>
            <a href="https://twitter.com/saishikisanchu">
                <i class="fab fa-twitter-square fa-3x link__twitter"></i>
            </a>
            <a href="https://www.facebook.com/mstream.myk/">
                <i class="fab fa-facebook fa-3x link__facebook"></i>
            </a>
        </div>
        <span>
        Copyright © 2018 SasakiPeter All Rights Reserved.
        </span>
        <?php if ( is_active_sidebar( 'footer-left-widget' ) ) : ?>
        <div class="footer-widget">
            <?php dynamic_sidebar( 'footer-left-widget' ); ?>
        </div>
        <?php endif; ?>
    </footer>
    <?php wp_footer(); ?>  

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>   
</body>
</html>