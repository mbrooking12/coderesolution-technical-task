<?php
$cakes = include '../api/fetch-data.php';

if (isset($_GET['sortby'])) {
    $sortby = $_GET['sortby'];
}
if ($sortby == 'asc') {
    usort($cakes, function ($item1, $item2) {
        return $item1['balance'] <=> $item2['balance'];
    });
} else if ($sortby == 'desc') {
    usort($cakes, function ($item1, $item2) {
        return $item2['balance'] <=> $item1['balance'];
    });
}

?>
<div class="cake-listing__container">
<?php foreach ($cakes as $cake) {
    if ( isset($cake['title']) ) {
        $title = $cake['title'];
    }
    if ( isset($cake['isActive']) ) {
        $is_active = $cake['isActive'];
    }
    if ( isset($cake['balance']) ) {
        $balance = $cake['balance'];
    }
    if ( isset($cake['picture']) ) {
        $picture = $cake['picture'];
    }
    if ( isset($cake['description']) ) {
        $description = $cake['description'];
    }
    if ($is_active) {
        $btn_text = 'Pick up';
    } else {
        $btn_text = 'Sold out';
    } ?>
    <div class="card <?php if (!$is_active) { ?>card--disabled<?php } ?> flex justify-between flex-wrap">
        <div class="card__half flex align-center">
            <?php if ($picture) { ?>
                <img src="<?php echo $picture; ?>" width="76" height="76" loading="lazy" alt="placeholder" />
            <?php } ?>
            <div class="card__head">
                <h2 class="card__title"><?php echo $title; ?></h2>

                <span class="card__detail"><?php echo $description; ?></span>
            </div>
        </div>
        <div class="card__half flex justify-between align-center">
            <span class="card__price"><?php echo $balance; ?></span>
            <a href="" class="btn <?php if (!$is_active) { ?>btn--disabled<?php } ?>">
                <?php echo $btn_text; ?>

                <svg width="21" height="8" viewBox="0 0 21 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21 4L17 0V3H0V5H17V8L21 4Z" fill="currentColor"/>
                </svg>
            </a>                        
        </div>
    </div>
<?php } ?>
</div>