<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./template/css/style.css">

    <title>Document</title>

</head>

<body>
    <?php
    include_once './include/layout/header.php';
    require './Class/Shoes.php';
    require './Class/Brands.php';
    require './include/Connect.php';
    ?>
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./template/images/hinh1.jpeg" style="max-height: 340px;" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./template/images/hinh2.jpeg" style="max-height: 340px;" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./template/images/hinh3.jpeg" style="max-height: 340px;" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">

        <hr class="mt-2">
        <div class="row">
            <div class="col-6">
                <div class="row m-5">
                    <?php
                    $brands = Brand::get8SBrands($pdo);
                    foreach ($brands as $brand) :
                    ?>
                    <div class="col-md-6">
                        <div class="card card-shoes me-2 mt-2">
                            <img src="<?= $brand['imgBrand'] ?>" title="<?= $brand['name'] ?>"
                                style="max-width: 240px; max-height: 152px; border: none;">
                        </div>
                    </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <div class="col-6" style="margin: auto;">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./template/images/Carousel1.webp" style="max-width: 900px; max-height: 900px;"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./template/images/Carousel2.webp" style="max-width: 900px; max-height: 900px;"
                                class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Nike</h3>
            <a href="#" class="text-dark">Xem thêm <i class="fas fa-caret-right"></i></a>
        </div>

        <div class="container">
            <div class="row">
                <?php
                $shoes = Shoes::get4Shoes($pdo, $id = 1);
                foreach ($shoes as $shoe) :
                ?>
                <div class="col-md-3">
                    <div class="card h-100 card-nike">
                        <img src="<?= $shoe['imgShoes'] ?>" class="card-img-top h-100" alt="<?= $shoe['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $shoe['name'] ?></h5>
                            <p class="card-text text-success">
                                <?= number_format($shoe['priceShoes'], 0, ',', '.') . " đ" ?></p>
                            <a href="#" class="btn btn-primary">Mua ngay</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-10">
                <h3>Adidas</h3>
            </div>
            <div class="col-2">Xem thêm
                <a href="#" class="btn"><i class="fa-solid fa-caret-right"></i></a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                $shoes = Shoes::get4Shoes($pdo, $id = 2);
                foreach ($shoes as $shoe) :
                ?>
                <div class="col-3">
                    <div class="card h-100 card-nike" style="width: 18rem;">
                        <img src="<?= $shoe['imgShoes'] ?>" class="card-img-top h-100" alt="<?= $shoe['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $shoe['name'] ?></h5>
                            <p class="card-text text-success">
                                <?=number_format($shoe['priceShoes'], 0, ',', '.') . " đ" ?></p>
                            <a href="#" class="btn btn-primary">Mua ngay</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        require './include/layout/footer.php';
        ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

</html>