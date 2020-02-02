<?php if($results) {
    foreach($results as $row) {
        ?>
        <div class="letsgrid__item box <?php echo $row['category_slug'] ?>">
            <a href="<?php echo base_url('assets/images/project/'.$row['image']) ?>" class="thumbnail" data-lightbox="project" data-title="<?php echo strip_tags($row['text']) ?>">
                <div class="thumb-overlay"><span><?php echo $row['title'] ?></span></div>
                <img src="<?php echo base_url('assets/images/project/'.$row['image']) ?>">
            </a>
        </div>
        <?php
    }
} ?>