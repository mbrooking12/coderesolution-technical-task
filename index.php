<?php $cakes = include 'api/fetch-data.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Technical Task</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>
<body>
    <main class="site-main flex flex-wrap justify-between">
        <aside class="sidebar flex justify-center">
            <svg width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 3.38061C3.10457 3.38061 4 2.77203 4 2.02131C4 1.27059 3.10457 0.662018 2 0.662018C0.895431 0.662018 0 1.27059 0 2.02131C0 2.77203 0.895431 3.38061 2 3.38061ZM16 3.38061C17.1046 3.38061 18 2.77203 18 2.02131C18 1.27059 17.1046 0.662018 16 0.662018C14.8954 0.662018 14 1.27059 14 2.02131C14 2.77203 14.8954 3.38061 16 3.38061ZM4 11.5364C4 12.2871 3.10457 12.8957 2 12.8957C0.895431 12.8957 0 12.2871 0 11.5364C0 10.7857 0.895431 10.1771 2 10.1771C3.10457 10.1771 4 10.7857 4 11.5364ZM16 12.8957C17.1046 12.8957 18 12.2871 18 11.5364C18 10.7857 17.1046 10.1771 16 10.1771C14.8954 10.1771 14 10.7857 14 11.5364C14 12.2871 14.8954 12.8957 16 12.8957Z" fill="#2C2D3D"/>
            </svg>
        </aside>
        <article class="main-content">

            <header class="main-content__head flex justify-between align-center flex-wrap">
                <h1 class="page-title">Bulk Order <span class="page-title__yellow">Cakes</span></h1>

                <div class="sort flex justify-between align-center">
                    <label for="sort" class="sort__label">
                        Order
                    </label>

                    <select id="sort">
                        <option value="asc">Low to high</option>
                        <option value="desc">High to low</option>
                    </select>
                </div>
            </header>

            <section id="cakes-listing">
                <div class="table-head flex justify-between">
                    <span class="table-head__label">Name</span>

                    <span class="table-head__label">Balance (per 1K)</span>
                </div>

                <div class="cake-listing__container">
                    <?php foreach ($cakes as $cake) { ?>
                    <?php     
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
                    }
                    ?>
                
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
            </section>

        </article>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="./assets/js/main.js" defer></script>
</body>
</html>