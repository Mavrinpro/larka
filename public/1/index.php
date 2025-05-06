<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет-магазин</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #6c5ce7;
            --secondary-color: #a29bfe;
            --dark-color: #2d3436;
            --light-color: #f5f6fa;
            --success-color: #00b894;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: var(--dark-color);
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
        }

        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
        }

        .badge-cart {
            position: relative;
            top: -10px;
            right: 10px;
            font-size: 0.6rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #5649d2;
            border-color: #5649d2;
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .cart-item {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            margin: 0 5px;
        }

        .total-price {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .empty-cart {
            text-align: center;
            padding: 40px 0;
        }

        .empty-cart i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .product-price {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .product-rating {
            color: #fdcb6e;
        }

        .offcanvas-header {
            border-bottom: 1px solid #eee;
        }

        .offcanvas-title {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Навигационная панель -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-shop"></i> Магазин товаров
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Каталог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">О нас</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <button class="btn btn-outline-primary position-relative" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
                            <i class="bi bi-cart3"></i> Корзина
                            <span id="cartBadge" class="badge bg-primary badge-cart rounded-pill">0</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Основной контент -->
    <div class="container mb-5">
        <h2 class="mb-4">Наши товары</h2>

        <div class="row g-4">
            <!-- Товар 1 -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200?text=Смартфон" class="card-img-top" alt="Смартфон">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Смартфон Premium X</h5>
                        <div class="product-rating mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <span class="text-muted ms-2">4.5</span>
                        </div>
                        <p class="card-text text-muted small">Мощный смартфон с OLED-экраном и тройной камерой.</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <div class="product-price">32 990 ₽</div>
                            <button class="btn btn-primary btn-sm add-to-cart" data-id="1" data-name="Смартфон Premium X" data-price="32990">
                                <i class="bi bi-cart-plus"></i> В корзину
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Товар 2 -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200?text=Ноутбук" class="card-img-top" alt="Ноутбук">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Ноутбук ProBook</h5>
                        <div class="product-rating mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <span class="text-muted ms-2">4.0</span>
                        </div>
                        <p class="card-text text-muted small">Производительный ноутбук для работы и творчества.</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <div class="product-price">54 990 ₽</div>
                            <button class="btn btn-primary btn-sm add-to-cart" data-id="2" data-name="Ноутбук ProBook" data-price="54990">
                                <i class="bi bi-cart-plus"></i> В корзину
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Товар 3 -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200?text=Наушники" class="card-img-top" alt="Наушники">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Наушники SoundMax</h5>
                        <div class="product-rating mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <span class="text-muted ms-2">5.0</span>
                        </div>
                        <p class="card-text text-muted small">Беспроводные наушники с шумоподавлением.</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <div class="product-price">12 490 ₽</div>
                            <button class="btn btn-primary btn-sm add-to-cart" data-id="3" data-name="Наушники SoundMax" data-price="12490">
                                <i class="bi bi-cart-plus"></i> В корзину
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Товар 4 -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200?text=Часы" class="card-img-top" alt="Часы">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Умные часы FitPro</h5>
                        <div class="product-rating mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <span class="text-muted ms-2">3.0</span>
                        </div>
                        <p class="card-text text-muted small">Фитнес-часы с пульсометром и GPS.</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <div class="product-price">8 990 ₽</div>
                            <button class="btn btn-primary btn-sm add-to-cart" data-id="4" data-name="Умные часы FitPro" data-price="8990">
                                <i class="bi bi-cart-plus"></i> В корзину
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Товар 5 -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200?text=Планшет" class="card-img-top" alt="Планшет">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Планшет TabPlus</h5>
                        <div class="product-rating mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <span class="text-muted ms-2">4.0</span>
                        </div>
                        <p class="card-text text-muted small">10-дюймовый планшет с стилусом в комплекте.</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <div class="product-price">24 990 ₽</div>
                            <button class="btn btn-primary btn-sm add-to-cart" data-id="5" data-name="Планшет TabPlus" data-price="24990">
                                <i class="bi bi-cart-plus"></i> В корзину
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Товар 6 -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200?text=Фотоаппарат" class="card-img-top" alt="Фотоаппарат">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Фотоаппарат PhotoPro</h5>
                        <div class="product-rating mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <span class="text-muted ms-2">4.5</span>
                        </div>
                        <p class="card-text text-muted small">Зеркальный фотоаппарат с объективом 18-55 мм.</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <div class="product-price">42 990 ₽</div>
                            <button class="btn btn-primary btn-sm add-to-cart" data-id="6" data-name="Фотоаппарат PhotoPro" data-price="42990">
                                <i class="bi bi-cart-plus"></i> В корзину
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Товар 7 -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200?text=Колонка" class="card-img-top" alt="Колонка">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Колонка SoundBox</h5>
                        <div class="product-rating mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <span class="text-muted ms-2">3.0</span>
                        </div>
                        <p class="card-text text-muted small">Портативная Bluetooth-колонка с мощным звуком.</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <div class="product-price">5 990 ₽</div>
                            <button class="btn btn-primary btn-sm add-to-cart" data-id="7" data-name="Колонка SoundBox" data-price="5990">
                                <i class="bi bi-cart-plus"></i> В корзину
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Товар 8 -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200?text=Монитор" class="card-img-top" alt="Монитор">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Монитор UltraHD</h5>
                        <div class="product-rating mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <span class="text-muted ms-2">4.5</span>
                        </div>
                        <p class="card-text text-muted small">27-дюймовый 4K монитор с IPS матрицей.</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <div class="product-price">34 990 ₽</div>
                            <button class="btn btn-primary btn-sm add-to-cart" data-id="8" data-name="Монитор UltraHD" data-price="34990">
                                <i class="bi bi-cart-plus"></i> В корзину
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Оффканвас корзины -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Ваша корзина</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div id="cartItemsContainer">
                <!-- Здесь будут отображаться товары в корзине -->
                <div class="empty-cart">
                    <i class="bi bi-cart-x"></i>
                    <p>Ваша корзина пуста</p>
                </div>
            </div>
            <div class="p-3 border-top" id="cartSummary" style="display: none;">
                <div class="d-flex justify-content-between mb-2">
                    <span>Товаров:</span>
                    <span id="totalItems">0</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="fw-bold">Итого:</span>
                    <span class="total-price" id="totalPrice">0 ₽</span>
                </div>
                <button class="btn btn-primary w-100" id="checkoutBtn">
                    Оформить заказ
                </button>
            </div>
        </div>
    </div>

    <!-- Модальное окно оформления заказа -->
    <div class="modal fade" id="checkoutModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Оформление заказа</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Спасибо за ваш заказ!</p>
                    <p>Сумма к оплате: <span id="modalTotalPrice">0 ₽</span></p>
                    <div class="alert alert-success">
                        Наш менеджер свяжется с вами для подтверждения заказа.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Инициализация корзины из localStorage
            let cart = JSON.parse(localStorage.getItem('cart'));
if (!Array.isArray(cart)) {
    cart = []; // Если нет, инициализируем пустым массивом
}
            // Обновление отображения корзины
            function updateCartDisplay() {
                const cartItemsContainer = document.getElementById('cartItemsContainer');
                const cartSummary = document.getElementById('cartSummary');
                const cartBadge = document.getElementById('cartBadge');

                if (cart.length === 0) {
                    cartItemsContainer.innerHTML = `
                        <div class="empty-cart">
                            <i class="bi bi-cart-x"></i>
                            <p>Ваша корзина пуста</p>
                        </div>
                    `;
                    cartSummary.style.display = 'none';
                    cartBadge.textContent = '0';
                    return;
                }

                cartSummary.style.display = 'block';
                cartBadge.textContent = cart.reduce((sum, item) => sum + item.quantity, 0);

                let itemsHtml = '';
                let totalItems = 0;
                let totalPrice = 0;

                cart.forEach(item => {
                    totalItems += item.quantity;
                    totalPrice += item.price * item.quantity;

                    itemsHtml += `
                        <div class="cart-item px-3" data-id="${item.id}">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="mb-0">${item.name}</h6>
                                <button class="btn btn-sm btn-outline-danger remove-item" data-id="${item.id}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-sm btn-outline-secondary quantity-btn minus" data-id="${item.id}">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="form-control quantity-input" value="${item.quantity}" min="1" data-id="${item.id}">
                                    <button class="btn btn-sm btn-outline-secondary quantity-btn plus" data-id="${item.id}">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold">${(item.price * item.quantity).toLocaleString()} ₽</div>
                                    <small class="text-muted">${item.price.toLocaleString()} ₽ за шт.</small>
                                </div>
                            </div>
                        </div>
                    `;
                });

                cartItemsContainer.innerHTML = itemsHtml;
                document.getElementById('totalItems').textContent = totalItems;
                document.getElementById('totalPrice').textContent = totalPrice.toLocaleString() + ' ₽';

                // Добавляем обработчики событий для новых элементов
                addEventListeners();
            }

            // Добавление товара в корзину
            function addToCart(id, name, price) {
                const existingItem = cart.find(item => item.id === id);

                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    cart.push({
                        id,
                        name,
                        price,
                        quantity: 1
                    });
                }

                saveCart();
                updateCartDisplay();

                // Показываем оффканвас корзины
                const offcanvas = new bootstrap.Offcanvas(document.getElementById('cartOffcanvas'));
                offcanvas.show();
            }

            // Удаление товара из корзины
            function removeFromCart(id) {
                cart = cart.filter(item => item.id !== id);
                saveCart();
                updateCartDisplay();
            }

            // Изменение количества товара
            function updateQuantity(id, newQuantity) {
                const item = cart.find(item => item.id === id);
                if (item) {
                    item.quantity = parseInt(newQuantity) || 1;
                    if (item.quantity < 1) item.quantity = 1;
                    saveCart();
                    updateCartDisplay();
                }
            }

            // Сохранение корзины в localStorage
            function saveCart() {
                localStorage.setItem('cart', JSON.stringify(cart));
            }

            // Оформление заказа
            function checkout() {
                if (cart.length === 0) return;

                const totalPrice = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
                document.getElementById('modalTotalPrice').textContent = totalPrice.toLocaleString() + ' ₽';

                const modal = new bootstrap.Modal(document.getElementById('checkoutModal'));
                modal.show();

                // Очищаем корзину после оформления заказа
                cart = [];
                saveCart();
                updateCartDisplay();
            }

            // Добавление обработчиков событий
            function addEventListeners() {
                // Кнопки "В корзину"
                document.querySelectorAll('.add-to-cart').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const name = this.getAttribute('data-name');
                        const price = parseInt(this.getAttribute('data-price'));
                        addToCart(id, name, price);
                    });
                });

                // Кнопки удаления товара
                document.querySelectorAll('.remove-item').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        removeFromCart(id);
                    });
                });

                // Кнопки уменьшения количества
                document.querySelectorAll('.minus').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const item = cart.find(item => item.id === id);
                        if (item) {
                            updateQuantity(id, item.quantity - 1);
                        }
                    });
                });

                // Кнопки увеличения количества
                document.querySelectorAll('.plus').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const item = cart.find(item => item.id === id);
                        if (item) {
                            updateQuantity(id, item.quantity + 1);
                        }
                    });
                });

                // Поля ввода количества
                document.querySelectorAll('.quantity-input').forEach(input => {
                    input.addEventListener('change', function() {
                        const id = this.getAttribute('data-id');
                        updateQuantity(id, this.value);
                    });
                });

                // Кнопка оформления заказа
                document.getElementById('checkoutBtn').addEventListener('click', checkout);
            }

            // Инициализация
            updateCartDisplay();
            addEventListeners();
        });
    </script>
</body>
</html>
