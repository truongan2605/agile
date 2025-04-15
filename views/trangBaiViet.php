<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/menu.php'; ?>

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="blog-wrapper">
                        <div class="row">
                            <?php foreach($ds_bai_viet as $bv): ?>
                                <div class="col-md-6">
                                    <div class="blog-item mb-30">
                                        <div class="blog-thumb">
                                            <img src="uploads/<?= $bv['hinh_anh'] ?>" alt="<?= $bv['tieu_de'] ?>" class="img-fluid" width= 100px>
                                        </div>
                                        <div class="blog-content">
                                            <h3>
                                                <a href="index.php?controller=baiviet&action=show&id=<?= $bv['id'] ?>">
                                                    <?= $bv['tieu_de'] ?>
                                                </a>
                                            </h3>
                                            <p><?= mb_substr(strip_tags($bv['noi_dung']), 0, 120) ?>...</p>
                                            <a href="index.php?controller=baiviet&action=show&id=<?= $bv['id'] ?>" class="read-more">
                                                Xem chi tiết <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <aside class="sidebar-wrapper">
                        <div class="widget">
                            <!-- Có thể thêm search hoặc danh mục ở đây -->
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Bài viết mới</h4>
                            <ul class="recent-posts">
                                <?php foreach($bai_viet_moi as $moi): ?>
                                    <li>
                                        <a href="index.php?controller=baiviet&action=show&id=<?= $moi['id'] ?>">
                                            <?= $moi['tieu_de'] ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once 'layouts/miniCart.php'; ?>
<?php require_once 'layouts/footer.php'; ?>
