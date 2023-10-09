<?php

    include_once('functions/function.php');
    get_header();
    get_sidebar();

?>
    
    <div class="row">
        <div class="col-md-12 welcome_part">
            <p><span>Welcome Mr.</span> <?= $_SESSION['name'];?> </p>
        </div>
    </div>

<?php

    get_footer();

?>    
                