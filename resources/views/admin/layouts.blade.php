<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <nav>
            <!-- Thêm nội dung cho thanh điều hướng nếu cần -->
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">LOGO</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page"
                                href="http://127.0.0.1:8000/admin/home">Home</a>
                            <a class="nav-link" href="http://127.0.0.1:8000/cartUser/cart/create">Thêm Vào Giỏ Hàng</a>
                            <a class="nav-link" href="http://127.0.0.1:8000/cartUser/cart">Giỏ Hàng Của Bạn</a>
                            <a class="nav-link" href="http://127.0.0.1:8000/admin/movies">Admin</a>
                        </div>
                    </div>
                </div>
            </nav>
        </nav>

        @yield('content')

        <!-- Thêm footer ở đây -->
        <footer class="bg-light text-center text-lg-start">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Footer Content</h5>
                        <p>
                            Here you can use rows and columns to organize your footer content.
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Abouts</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-dark">Facebook</a>
                            </li>
                            <li>
                                <a href="#!" class="text-dark">TikTok</a>
                            </li>
                            <li>
                                <a href="#!" class="text-dark">Youtobe</a>
                            </li>
                            <li>
                                <a href="#!" class="text-dark">Telegram</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Abouts</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-dark">Facebook</a>
                            </li>
                            <li>
                                <a href="#!" class="text-dark">TikTok</a>
                            </li>
                            <li>
                                <a href="#!" class="text-dark">Youtobe</a>
                            </li>
                            <li>
                                <a href="#!" class="text-dark">Telegram</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © Copyright 2023 hh3dsub.com All rights reserved.
                <a class="text-dark" href="https://yourwebsite.com/">yourwebsite.com</a>
            </div>
        </footer>
    </div>

    <!-- Thêm các tệp JavaScript của Bootstrap và các thư viện phụ thuộc -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
