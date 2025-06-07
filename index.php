<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neon | Элитная мебель</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #00f2ff;
            --secondary: #0a0a0a;
            --accent: #ff00f2;
            --text: #e0e0e0;
            --light-text: #a0a0a0;
            --neon-glow: 0 0 10px rgba(0, 242, 255, 0.8), 0 0 20px rgba(0, 242, 255, 0.6);
            --accent-glow: 0 0 10px rgba(255, 0, 242, 0.8), 0 0 20px rgba(255, 0, 242, 0.6);
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
            overflow-x: hidden;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
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
            text-shadow: 0 0 5px rgba(0, 242, 255, 0.5);
            letter-spacing: 0.5px;
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
            bottom: -5px;
            left: 0;
            transition: width 0.3s;
            box-shadow: var(--accent-glow);
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        /* Герой секция */
        .hero {
            display: flex;
            align-items: center;
            min-height: 80vh;
            padding: 80px 0;
            position: relative;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            opacity: 0.15;
            z-index: -1;
        }
        
        .hero-content {
            flex: 1;
            padding-right: 50px;
        }
        
        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            line-height: 1.2;
            color: var(--primary);
            text-shadow: var(--neon-glow);
        }
        
        .hero p {
            font-size: 18px;
            color: var(--light-text);
            margin-bottom: 30px;
            max-width: 500px;
        }
        
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
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn:hover {
            background: transparent;
            color: var(--accent);
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
        
        /* Особенности */
        .features {
            padding: 100px 0;
            background: #111;
            position: relative;
        }
        
        .features::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            box-shadow: 0 0 10px var(--primary), 0 0 20px var(--accent);
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-title h2 {
            font-size: 36px;
            color: var(--primary);
            margin-bottom: 15px;
            text-shadow: var(--neon-glow);
        }
        
        .section-title p {
            color: var(--light-text);
            max-width: 700px;
            margin: 0 auto;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .feature-card {
            background: rgba(20, 20, 20, 0.7);
            padding: 40px 30px;
            border-radius: 10px;
            text-align: center;
            transition: all 0.3s;
            border: 1px solid rgba(0, 242, 255, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 242, 255, 0.1);
            border-color: var(--primary);
        }
        
        .feature-card::before {
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
        
        .feature-card:hover::before {
            opacity: 0.3;
        }
        
        .feature-icon {
            font-size: 40px;
            color: var(--accent);
            margin-bottom: 20px;
            text-shadow: var(--accent-glow);
        }
        
        .feature-card h3 {
            margin-bottom: 15px;
            color: var(--primary);
            text-shadow: 0 0 5px rgba(0, 242, 255, 0.5);
        }
        
        /* Подвал */
        footer {
            background: #0a0a0a;
            color: white;
            padding: 60px 0 20px;
            position: relative;
        }
        
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--accent), var(--primary));
            box-shadow: 0 0 10px var(--accent), 0 0 20px var(--primary);
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-column h3 {
            color: var(--accent);
            margin-bottom: 20px;
            font-size: 20px;
            text-shadow: 0 0 5px rgba(255, 0, 242, 0.5);
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .footer-column ul li i {
            margin-right: 10px;
            color: var(--primary);
            text-shadow: 0 0 5px rgba(0, 242, 255, 0.5);
        }
        
        .footer-column ul li a {
            color: #ccc;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .footer-column ul li a:hover {
            color: var(--accent);
            text-shadow: var(--accent-glow);
        }
        
        .social-links {
            display: flex;
            gap: 15px;
        }
        
        .social-links a {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        
        .social-links a:hover {
            background: var(--accent);
            transform: translateY(-3px);
            box-shadow: var(--accent-glow);
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #ccc;
            font-size: 14px;
        }
        
        /* Анимации */
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
            .hero {
                flex-direction: column;
                text-align: center;
            }
            
            .hero-content {
                padding-right: 0;
                margin-bottom: 40px;
            }
            
            .hero h1 {
                font-size: 36px;
            }
            
            .nav-links {
                display: none;
            }
            
            .hero-buttons {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }
            
            .btn-outline {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <a href="#" class="logo pulse">NE<span>ON</span></a>
            <ul class="nav-links">
                <li><a href="index.php">Главная</a></li>
                <li><a href="magazine.php">Каталог</a></li>
                <li><a href="clients.php">Клиенты</a></li>
                <li><a href="dostavka.html">Доставка</a></li>
            </ul>
        </nav>

        <section class="hero">
            <div class="hero-content">
                <h1>Неоновая мебель будущего</h1>
                <p>
                    Уникальные дизайнерские решения с подсветкой и футуристичным стилем. 
                    Современные технологии и эргономика в каждом изделии.
                </p>
                <div class="hero-buttons">
                    <a href="magazine.php" class="btn pulse">Каталог</a>
                    <a href="#" class="btn btn-outline pulse">О нас</a>
                </div>
            </div>
        </section>
    </div>

    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2>Наши преимущества</h2>
                <p>Инновационные решения для вашего пространства с использованием современных технологий</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>LED-подсветка</h3>
                    <p>Встроенная интеллектуальная система освещения с изменяемыми цветами</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-atom"></i>
                    </div>
                    <h3>Футуристичный дизайн</h3>
                    <p>Уникальные формы, вдохновленные технологиями будущего</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Быстрая сборка</h3>
                    <p>Модульные системы, которые собираются за считанные минуты</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>NEON</h3>
                    <p>Футуристичная мебель с LED-подсветкой. Создаем атмосферу будущего уже сегодня.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Меню</h3>
                    <ul>
                        <li><a href="#">Главная</a></li>
                        <li><a href="#">О нас</a></li>
                        <li><a href="magazine.php">Каталог</a></li>
                        <li><a href="dostavka.html">Доставка</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Контакты</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Москва, ул. Футуристичная, 25</li>
                        <li><i class="fas fa-phone"></i> +7 (949) 509-44-85</li>
                        <li><i class="fas fa-envelope"></i> info@neon-furniture.ru</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 Kolcov-Gryazev. Все права защищены.</p>
            </div>
        </div>
    </footer>
</body>
</html>