<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package double
 */

get_header('secondary');
?>


    <main class="main-content">
                <div class="container">
                    <div class="row text-center not-found">
                        <h1>404</h1>
                        <p>The address is incorrectly typed, or such a page on the site no longer exists</p>
                        <a href="/"><button type="button">Home</button></a>
                    </div>
                </div>
    </main>

<?php
get_footer();
