<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог | Minimal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <style>
        :root {
            --primary: #00f2ff;
            --secondary: #0a0a0a;
            --accent: #ff00f2;
            --text: #e0e0e0;
            --light-text: #a0a0a0;
            --dark-bg: #111;
            --card-bg: rgba(30, 30, 30, 0.7);
            --neon-glow: 0 0 10px rgba(0, 242, 255, 0.8), 0 0 20px rgba(0, 242, 255, 0.6);
            --accent-glow: 0 0 10px rgba(255, 0, 242, 0.8), 0 0 20px rgba(255, 0, 242, 0.6);
            --shadow: 0 5px 15px rgba(0, 242, 255, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
            line-height: 1.6;
            background-color: var(--secondary);
            background-image: url('https://images.unsplash.com/photo-1519643381401-22c77e60520e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            background-color: rgba(10, 10, 10, 0.92);
            min-height: 100vh;
            box-shadow: 0 0 30px rgba(0, 242, 255, 0.1);
        }
        
        /* Навигация */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 0;
            position: relative;
            z-index: 100;
        }
        
        .logo {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            text-shadow: var(--neon-glow);
            letter-spacing: 1px;
        }
        
        .logo span {
            color: var(--accent);
            text-shadow: var(--accent-glow);
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 30px;
        }
        
        .nav-links a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
            padding: 5px 0;
            text-shadow: 0 0 5px rgba(0, 242, 255, 0.5);
        }
        
        .nav-links a:hover {
            color: var(--accent);
            text-shadow: var(--accent-glow);
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--accent);
            bottom: 0;
            left: 0;
            transition: width 0.3s;
            box-shadow: var(--accent-glow);
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        /* Кнопки */
        .btn {
            display: inline-block;
            background: var(--accent);
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            border: 2px solid var(--accent);
            box-shadow: var(--accent-glow);
            cursor: pointer;
            font-size: 16px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn:hover {
            background: transparent;
            color: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 0 20px var(--accent);
        }
        
        .btn-outline {
            background: transparent;
            color: var(--accent);
            margin-left: 15px;
            box-shadow: var(--accent-glow);
        }
        
        .btn-outline:hover {
            background: var(--accent);
            color: white;
        }
        
        .btn-danger {
            background: #ff3860;
            border-color: #ff3860;
            box-shadow: 0 0 10px rgba(255, 56, 96, 0.8);
        }
        
        .btn-danger:hover {
            color: #ff3860;
            background: transparent;
            box-shadow: 0 0 20px #ff3860;
        }
        
        /* CRUD кнопки */
        .crud-buttons {
            margin: 40px 0;
            text-align: right;
        }
        
        /* Карточки товаров */
        #productsContainer {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            padding: 20px 0;
        }
        
        .product-card {
            background: var(--card-bg);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 242, 255, 0.1);
            transition: all 0.3s;
            position: relative;
            border: 1px solid rgba(0, 242, 255, 0.1);
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 242, 255, 0.2);
            border-color: var(--primary);
        }
        
        .product-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            z-index: -1;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .product-card:hover::before {
            opacity: 0.3;
        }
        
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
            border-bottom: 1px solid rgba(0, 242, 255, 0.1);
        }
        
        .product-card .info {
            padding: 20px;
        }
        
        .product-card h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: var(--primary);
            text-shadow: 0 0 5px rgba(0, 242, 255, 0.5);
        }
        
        .product-card b {
            display: block;
            font-size: 20px;
            color: var(--accent);
            margin-bottom: 15px;
            text-shadow: 0 0 5px rgba(255, 0, 242, 0.5);
        }
        
        .product-card p {
            color: var(--light-text);
            font-size: 14px;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .product-card .actions {
            display: flex;
            gap: 10px;
        }
        
        /* Модальное окно */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            overflow: auto;
        }
        
        .modal-content {
            background-color: var(--dark-bg);
            margin: 5% auto;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 5px 30px rgba(0, 242, 255, 0.2);
            position: relative;
            animation: modalopen 0.3s;
            border: 1px solid rgba(0, 242, 255, 0.2);
        }
        
        @keyframes modalopen {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .close {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 28px;
            font-weight: bold;
            color: var(--light-text);
            cursor: pointer;
            transition: color 0.3s;
        }
        
        .close:hover {
            color: var(--primary);
            text-shadow: var(--neon-glow);
        }
        
        .modal h2 {
            color: var(--primary);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(0, 242, 255, 0.2);
            text-shadow: 0 0 5px rgba(0, 242, 255, 0.5);
        }
        
        /* Форма */
        #productForm div {
            margin-bottom: 20px;
        }
        
        #productForm label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--primary);
            text-shadow: 0 0 5px rgba(0, 242, 255, 0.3);
        }
        
        #productForm input,
        #productForm textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid rgba(0, 242, 255, 0.2);
            border-radius: 5px;
            font-family: inherit;
            font-size: 16px;
            transition: all 0.3s;
            background: rgba(20, 20, 20, 0.7);
            color: var(--text);
        }
        
        #productForm input:focus,
        #productForm textarea:focus {
            border-color: var(--accent);
            outline: none;
            box-shadow: 0 0 10px rgba(255, 0, 242, 0.3);
        }
        
        #productForm textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        /* Модальное окно товара */
        #modal .modal-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            background: var(--dark-bg);
        }
        
        #modal-image {
            max-width: 100%;
            max-height: 300px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid rgba(0, 242, 255, 0.2);
            box-shadow: 0 0 20px rgba(0, 242, 255, 0.1);
        }
        
        #modal-name {
            font-size: 24px;
            color: var(--primary);
            margin-bottom: 10px;
            text-shadow: var(--neon-glow);
        }
        
        #modal-price {
            font-size: 22px;
            color: var(--accent);
            margin-bottom: 15px;
            text-shadow: var(--accent-glow);
        }
        
        #modal-characteristics {
            color: var(--light-text);
            margin-bottom: 25px;
            line-height: 1.6;
        }
        
        #order-button {
            margin-bottom: 15px;
            width: 200px;
        }
        
        #add-to-cart-button {
            background: var(--primary);
            border-color: var(--primary);
            width: 200px;
            box-shadow: var(--neon-glow);
        }
        
        #add-to-cart-button:hover {
            color: var(--primary);
            background: transparent;
        }

        /* Стили для корзины */
        .cart-icon {
            position: relative;
            margin-left: 30px;
            cursor: pointer;
            color: var(--primary);
            text-shadow: var(--neon-glow);
        }

        .cart-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background: var(--accent);
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            box-shadow: var(--accent-glow);
        }

        /* Модальное окно корзины */
        #cartModal .modal-content {
            max-width: 800px;
            background: var(--dark-bg);
        }

        .cart-items {
            max-height: 400px;
            overflow-y: auto;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(0, 242, 255, 0.2);
            padding-bottom: 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(0, 242, 255, 0.1);
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 15px;
            border: 1px solid rgba(0, 242, 255, 0.2);
        }

        .cart-item-info {
            flex-grow: 1;
        }

        .cart-item-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--primary);
        }

        .cart-item-price {
            color: var(--accent);
            font-weight: 600;
            text-shadow: 0 0 5px rgba(255, 0, 242, 0.3);
        }

        .cart-item-actions {
            display: flex;
            align-items: center;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            border: 1px solid rgba(0, 242, 255, 0.2);
            background: rgba(20, 20, 20, 0.7);
            color: var(--primary);
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            transition: all 0.3s;
        }

        .quantity-btn:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .quantity-input {
            width: 40px;
            text-align: center;
            margin: 0 5px;
            border: 1px solid rgba(0, 242, 255, 0.2);
            border-radius: 4px;
            padding: 5px;
            background: rgba(20, 20, 20, 0.7);
            color: var(--text);
        }

        .remove-item {
            color: #ff3860;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            transition: all 0.3s;
        }

        .remove-item:hover {
            text-shadow: 0 0 10px #ff3860;
            transform: scale(1.2);
        }

        .cart-summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(0, 242, 255, 0.2);
        }

        .cart-total {
            font-size: 18px;
            font-weight: 600;
            color: var(--primary);
        }

        .cart-total-amount {
            color: var(--accent);
            font-size: 22px;
            text-shadow: 0 0 5px rgba(255, 0, 242, 0.5);
        }

        .cart-empty {
            text-align: center;
            padding: 40px 0;
            color: var(--light-text);
        }

        .cart-empty i {
            font-size: 50px;
            margin-bottom: 20px;
            color: rgba(0, 242, 255, 0.2);
        }

        /* Toast уведомления */
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--dark-bg);
            color: white;
            padding: 15px 25px;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 1000;
            border: 1px solid rgba(0, 242, 255, 0.2);
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        .toast i {
            margin-right: 10px;
            color: var(--accent);
            text-shadow: var(--accent-glow);
        }

        /* Анимация добавления в корзину */
        @keyframes flyToCart {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(0.1);
                opacity: 0;
                top: 20px;
                right: 20px;
            }
        }

        .fly-item {
            position: fixed;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            z-index: 999;
            animation: flyToCart 0.8s forwards;
            box-shadow: var(--accent-glow);
        }
        
        /* Анимация пульсации */
        @keyframes pulse {
            0% { opacity: 0.6; }
            50% { opacity: 1; }
            100% { opacity: 0.6; }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        /* Адаптивность */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            #productsContainer {
                grid-template-columns: 1fr;
            }
            
            .modal-content {
                width: 95%;
                margin: 10% auto;
                padding: 20px;
            }

            .cart-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .cart-item img {
                margin-bottom: 10px;
            }

            .cart-item-actions {
                width: 100%;
                justify-content: space-between;
                margin-top: 10px;
            }
            
            .crud-buttons {
                text-align: center;
            }
            
            .product-card .actions {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php" class="logo">MINI<span>MAL</span></a>
            <ul class="nav-links">
                <li><a href="index.php">Главная</a></li>
                <li><a href="magazine.php">Каталог</a></li>
                <li><a href="clients.php">Клиенты</a></li>
                <li><a href="dostavka.html">Доставка</a></li>
            </ul>
            <div class="cart-icon" id="cartIcon">
                <i class="fas fa-shopping-cart" style="font-size: 22px;"></i>
                <span class="cart-count" id="cartCount">0</span>
            </div>
        </nav>
        
        <div class="crud-buttons">
            <button id="addProductBtn" class="btn">Добавить товар</button>
        </div>
        
        <div id="productsContainer">
            <!-- Продукты будут загружаться здесь -->
        </div>
        
        <!-- Модальное окно для добавления/редактирования -->
        <div id="productModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 id="modalTitle">Добавить товар</h2>
                <form id="productForm">
                    <input type="hidden" id="productId" name="id" value="">
                    <div>
                        <label>Название:</label>
                        <input type="text" id="productName" required>
                    </div>
                    <div>
                        <label>Цена:</label>
                        <input type="number" step="0.01" id="productPrice" required>
                    </div>
                    <div>
                        <label>Изображение (URL):</label>
                        <input type="text" id="productImage" required>
                    </div>
                    <div>
                        <label>Характеристики:</label>
                        <textarea id="productCharacteristics" required></textarea>
                    </div>
                    <button type="submit" class="btn">Сохранить</button>
                </form>
            </div>
        </div>
        
        <!-- Модальное окно просмотра товара -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close-button">&times;</span>
                <img id="modal-image" src="" alt="">
                <h4 id="modal-name"></h4>
                <b id="modal-price"></b>
                <p id="modal-characteristics"></p>
                <a href="dostavka.html"><button id="order-button" class="btn">Заказать</button></a>
                <button id="add-to-cart-button" class="btn">В корзину</button>
            </div>
        </div>

        <!-- Модальное окно корзины -->
        <div id="cartModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Ваша корзина</h2>
                <div class="cart-items" id="cartItems">
                    <!-- Товары в корзине будут здесь -->
                </div>
                <div class="cart-summary">
                    <div class="cart-total">
                        Итого: <span class="cart-total-amount" id="cartTotal">$0.00</span>
                    </div>
                    <a href="dostavka.html"><button class="btn" id="checkoutBtn">Оформить заказ</button></a>
                </div>
            </div>
        </div>

        <!-- Toast уведомление -->
        <div class="toast" id="toast">
            <i class="fas fa-check-circle"></i>
            <span id="toastMessage">Товар добавлен в корзину</span>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('productModal');
            const productModal = document.getElementById("modal");
            const cartModal = document.getElementById("cartModal");
            const addBtn = document.getElementById('addProductBtn');
            const closeBtns = document.querySelectorAll('.close, .close-button');
            const productForm = document.getElementById('productForm');
            const productsContainer = document.getElementById('productsContainer');
            const cartIcon = document.getElementById('cartIcon');
            const cartCount = document.getElementById('cartCount');
            const cartItems = document.getElementById('cartItems');
            const cartTotal = document.getElementById('cartTotal');
            const checkoutBtn = document.getElementById('checkoutBtn');
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            const addToCartBtn = document.getElementById('add-to-cart-button');
            
            let currentAction = 'add';
            let currentProductId = null;
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            // Обновление счетчика корзины
            function updateCartCount() {
                const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
                cartCount.textContent = totalItems;
            }
            
            // Показать toast уведомление
            function showToast(message) {
                toastMessage.textContent = message;
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            }
            
            // Анимация добавления в корзину
            function animateAddToCart(element) {
                const rect = element.getBoundingClientRect();
                const flyItem = document.createElement('div');
                flyItem.className = 'fly-item';
                flyItem.innerHTML = '<i class="fas fa-shopping-cart"></i>';
                flyItem.style.top = `${rect.top}px`;
                flyItem.style.left = `${rect.left}px`;
                document.body.appendChild(flyItem);
                
                setTimeout(() => {
                    flyItem.remove();
                }, 800);
            }
            
            // Добавление товара в корзину
            function addToCart(productId, productName, productPrice, productImage, quantity = 1) {
                const existingItem = cart.find(item => item.id === productId);
                
                if (existingItem) {
                    existingItem.quantity += quantity;
                } else {
                    cart.push({
                        id: productId,
                        name: productName,
                        price: productPrice,
                        image: productImage,
                        quantity: quantity
                    });
                }
                
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartCount();
                showToast(existingItem ? 'Количество товара обновлено' : 'Товар добавлен в корзину');
            }
            
            // Удаление товара из корзины
            function removeFromCart(productId) {
                cart = cart.filter(item => item.id !== productId);
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartCount();
                renderCartItems();
                showToast('Товар удален из корзины');
            }
            
            // Обновление количества товара
            function updateQuantity(productId, newQuantity) {
                const item = cart.find(item => item.id === productId);
                if (item) {
                    item.quantity = Math.max(1, newQuantity);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCartCount();
                    renderCartItems();
                }
            }
            
            // Отрисовка товаров в корзине
            function renderCartItems() {
                if (cart.length === 0) {
                    cartItems.innerHTML = `
                        <div class="cart-empty">
                            <i class="fas fa-shopping-cart"></i>
                            <p>Ваша корзина пуста</p>
                        </div>
                    `;
                    cartTotal.textContent = '$0.00';
                    return;
                }
                
                cartItems.innerHTML = '';
                let total = 0;
                
                cart.forEach(item => {
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;
                    
                    const cartItem = document.createElement('div');
                    cartItem.className = 'cart-item';
                    cartItem.innerHTML = `
                        <img src="${item.image}" alt="${item.name}">
                        <div class="cart-item-info">
                            <div class="cart-item-title">${item.name}</div>
                            <div class="cart-item-price">$${item.price.toFixed(2)}</div>
                        </div>
                        <div class="cart-item-actions">
                            <div class="quantity-control">
                                <button class="quantity-btn minus" data-id="${item.id}">-</button>
                                <input type="number" class="quantity-input" value="${item.quantity}" min="1" data-id="${item.id}">
                                <button class="quantity-btn plus" data-id="${item.id}">+</button>
                            </div>
                            <button class="remove-item" data-id="${item.id}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                    cartItems.appendChild(cartItem);
                });
                
                cartTotal.textContent = `$${total.toFixed(2)}`;
                
                // Добавляем обработчики событий для кнопок
                document.querySelectorAll('.quantity-btn.minus').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const item = cart.find(item => item.id == id);
                        if (item && item.quantity > 1) {
                            updateQuantity(id, item.quantity - 1);
                        }
                    });
                });
                
                document.querySelectorAll('.quantity-btn.plus').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const item = cart.find(item => item.id == id);
                        if (item) {
                            updateQuantity(id, item.quantity + 1);
                        }
                    });
                });
                
                document.querySelectorAll('.quantity-input').forEach(input => {
                    input.addEventListener('change', function() {
                        const id = this.getAttribute('data-id');
                        const newQuantity = parseInt(this.value) || 1;
                        updateQuantity(id, newQuantity);
                    });
                });
                
                document.querySelectorAll('.remove-item').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        removeFromCart(id);
                    });
                });
            }
            
            // Загрузка продуктов
            function loadProducts() {
                fetch('get_products.php')
                    .then(response => response.json())
                    .then(products => {
                        productsContainer.innerHTML = '';
                        
                        products.forEach(product => {
                            const productCard = document.createElement('div');
                            productCard.className = 'product-card';
                            productCard.dataset.id = product.id;
                            productCard.dataset.name = product.name;
                            productCard.dataset.price = product.price;
                            productCard.dataset.characteristics = product.characteristics;
                            productCard.innerHTML = `
                                <img src="${product.image}" alt="${product.name}">
                                <div class="info">
                                    <h4>${product.name}</h4>
                                    <b>$${product.price}</b>
                                    <p>${product.characteristics}</p>
                                    <div class="actions">
                                        <button class="btn" onclick="editProduct(${product.id})">Редактировать</button>
                                        <button class="btn btn-danger" onclick="deleteProduct(${product.id})">Удалить</button>
                                    </div>
                                </div>
                            `;
                            productsContainer.appendChild(productCard);
                            
                            // Добавляем обработчик клика для просмотра товара
                            productCard.addEventListener('click', (e) => {
                                if (!e.target.closest('button')) {
                                    const name = productCard.getAttribute('data-name');
                                    const price = productCard.getAttribute('data-price');
                                    const characteristics = productCard.getAttribute('data-characteristics');
                                    const image = productCard.querySelector('img').src;

                                    document.getElementById('modal-name').textContent = name;
                                    document.getElementById('modal-price').textContent = `$${price}`;
                                    document.getElementById('modal-characteristics').textContent = characteristics;
                                    document.getElementById('modal-image').src = image;

                                    productModal.style.display = "block";
                                }
                            });
                        });
                    });
            }
            
            // Открытие модального окна для добавления
            addBtn.onclick = function() {
                currentAction = 'add';
                document.getElementById('modalTitle').textContent = 'Добавить товар';
                productForm.reset();
                modal.style.display = 'block';
            };
            
            // Закрытие модальных окон
            closeBtns.forEach(btn => {
                btn.onclick = function() {
                    modal.style.display = 'none';
                    productModal.style.display = 'none';
                    cartModal.style.display = 'none';
                }
            });
            
            // Закрытие при клике вне модального окна
            window.onclick = function(event) {
                if (event.target.classList.contains('modal')) {
                    modal.style.display = 'none';
                    productModal.style.display = 'none';
                    cartModal.style.display = 'none';
                }
            };
            
            // Обработка отправки формы
            productForm.onsubmit = async function(e) {
                e.preventDefault();
    
                const productData = {
                    id: document.getElementById('productId').value,
                    name: document.getElementById('productName').value,
                    price: parseFloat(document.getElementById('productPrice').value),
                    image: document.getElementById('productImage').value,
                    characteristics: document.getElementById('productCharacteristics').value
                };

                const url = productData.id ? 'update_product.php' : 'add_product.php';

                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(productData)
                    });
            
                    const data = await response.json();
                    
                    if (!response.ok) {
                        throw new Error(data.error || 'Unknown error');
                    }
                    
                    alert(productData.id ? 'Товар успешно обновлен' : 'Товар успешно добавлен');
                    loadProducts();
                    modal.style.display = 'none';
                } catch (error) {
                    console.error('Error:', error);
                    alert('Ошибка: ' + error.message);
                }
            };
            
            // Добавление в корзину из модального окна товара
            addToCartBtn.onclick = function() {
                const productId = document.querySelector('#modal .modal-content').getAttribute('data-id');
                const productName = document.getElementById('modal-name').textContent;
                const productPrice = parseFloat(document.getElementById('modal-price').textContent.replace('$', ''));
                const productImage = document.getElementById('modal-image').src;
                
                addToCart(productId, productName, productPrice, productImage);
                animateAddToCart(addToCartBtn);
                productModal.style.display = 'none';
            };
            
            // Открытие корзины
            cartIcon.addEventListener('click', function() {
                renderCartItems();
                cartModal.style.display = 'block';
            });
            
            // Оформление заказа
            checkoutBtn.addEventListener('click', function() {
                if (cart.length === 0) {
                    showToast('Корзина пуста');
                    return;
                }
                
                // Здесь можно добавить логику оформления заказа
                alert('Заказ оформлен! Спасибо за покупку.');
                cart = [];
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartCount();
                renderCartItems();
                cartModal.style.display = 'none';
            });
            
            // Глобальные функции для редактирования и удаления
            window.editProduct = function(id) {
                currentAction = 'edit';
                currentProductId = id;
                document.getElementById('modalTitle').textContent = 'Редактировать товар';
                
                fetch('get_products.php')
                    .then(response => response.json())
                    .then(products => {
                        const product = products.find(p => p.id == id);
                        if (product) {
                            document.getElementById('productId').value = product.id;
                            document.getElementById('productName').value = product.name;
                            document.getElementById('productPrice').value = product.price;
                            document.getElementById('productImage').value = product.image;
                            document.getElementById('productCharacteristics').value = product.characteristics;
                            modal.style.display = 'block';
                        }
                    });
            };
            
            window.deleteProduct = function(id) {
                if (confirm('Вы уверены, что хотите удалить этот товар?')) {
                    fetch('delete_product.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ id: id })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            throw new Error(data.error);
                        }
                        alert(data.message || 'Товар успешно удален');
                        loadProducts();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Ошибка при удалении: ' + error.message);
                    });
                }
            };
            
            // Первоначальная загрузка продуктов и обновление счетчика корзины
            loadProducts();
            updateCartCount();
        });
    </script>
</body>
</html>