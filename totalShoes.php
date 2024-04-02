<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./template/css/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    include_once './include/layout/header.php';
    require './Class/Shoes.php';
    require './Class/Brands.php';
    require './Class/Categories.php';
    require './include/Connect.php';
    $maxPrice = Shoes::getMaxPiceProduct();
    if (!isset($_GET['categoryID'])) {
        $products = Shoes::getShoes($pdo);
    } else {
        $id = $_GET['categoryID'];
        $products = Shoes::getShoesFromCate($pdo, $id);
    }
    $idBrand = isset($_GET['idBrand']) ? $_GET['idBrand'] : null;

    if (!is_null($idBrand)) {
        $products = Shoes::getShoesFromBrand($pdo, $idBrand);
    } else {
        $products = Shoes::getShoes($pdo);
    }
    $idCate = isset($_GET['idCate']) ? ($_GET['idCate']) : null;

    if (!is_null($idCate))
        $products = Shoes::getShoesFromCate($pdo, $idCate);
    else
        $products = Shoes::getShoes($pdo);
    ?>
    <div class="p-2 row main" style="border: 1px solid #cdcdcd">
        <div class="col-md-3 mt-3">
            <nav class="nav bg-success flex-column">
                <?php
                $categories = Categories::getCategories($pdo);
                foreach ($categories as $category) :
                ?>
                <a class="text-white nav-link"
                    href="./totalShoes.php?idCate=<?= $category['id'] ?>"><?= $category['name'] ?></a>
                <?php
                endforeach;
                ?>
                <div class="btn-group dropend">
                    <button type="button" class="btn text-start text-white dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Nhãn hàng
                    </button>
                    <ul class="dropdown-menu bg-success">
                        <?php
                        $brands = Brand::getBrand($pdo);
                        foreach ($brands as $brand) :
                        ?>
                        <li><a class="dropdown-item"
                                href="./totalShoes.php?idBrand=<?= $brand['id'] ?>"><?= $brand['name'] ?></a></li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </nav>
            <h5 class="mt-3 mb-3">LỌC THEO GIÁ</h5>
            <form class="mx-3" method="get">
                <label for="rangeInput">GIÁ : </label>
                <input type="range" id="rangeInput" min="0" max="<?= $maxPrice ?>" value="0"
                    oninput="updateTextInput(this.value);">
                <input style="border-radius: 5px" type="text" name="rangePrice" id="textInput" value="0">
                <button type="submit" class="btn btn-secondary m-2">Filter</button>
            </form>
        </div>

        <div class="col-md-9">
            <div class="mt-3">
                <h3 class="mb-3" style="text-shadow: 5px 5px 3px #cdcdcd">Sản Phẩm</h3>

                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Sắp xếp
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Giá tăng dần</a></li>
                        <li><a class="dropdown-item" href="">Giá giảm dần</a></li>
                        <li><a class="dropdown-item" href="">Tên tăng dần</a></li>
                        <li><a class="dropdown-item" href="">Tên giảm dần</a></li>
                    </ul>
                </div>
                <hr>
                <div class="row">
                    <?php

                    foreach ($products as $product) :
                    ?>
                    <div class="col-md-4 mt-2 mb-2">
                        <div class="card card-product me-2 h-100">
                            <img src="<?= $product['imgShoes'] ?>" class="card-img-top pt-2 m-auto"
                                style="width: 200px; height: 250px">
                            <div class="card-body h-100">
                                <a href="./detail.php?id=<?= $product['id'] ?>" class="text-decoration-none">
                                    <h6 class="card-title text-dark">
                                        <?= strlen($product['name']) < 60 ? $product['name'] : substr($product['name'], 0, 60) . ' . . . . . '  ?>
                                    </h6>
                                </a>
                                <p class="card-text text-danger fw-bold">
                                    <?= number_format($product['priceShoes'], 0, ",", ".") . 'đ' ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <?php if (isset($_SESSION['IDUser'])) : ?>
                                    <a href="./handle/handleAddShopingCart.php?id=<?= $product['ID'] ?>"
                                        class="btn btn-warning text-white w-75">CHỌN MUA</a>
                                    <a class="btn btn-outline-danger" aria-current="page"
                                        href="./handle/handleAddFavourite.php?idpro=<?= $product['ID'] ?>"><i
                                            class="fa-solid fa-heart"></i></i></a>
                                    <?php else : ?>
                                    <a href="./auth/login.php" class="btn btn-warning text-white w-75">CHỌN MUA</a>
                                    <a href="./auth/login.php" class="btn btn-outline-danger" aria-current="page"><i
                                            class="fa-solid fa-heart"></i></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    require './include/layout/footer.php';
    ?>
</body>
<script>
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

function updateTextInput(value) {
    $('#textInput').value = value;
}
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</html>