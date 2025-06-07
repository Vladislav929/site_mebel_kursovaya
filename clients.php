<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клиенты | Neon Minimal</title>
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
        
        /* Таблица клиентов */
        .clients-table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0;
            background: var(--card-bg);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }
        
        .clients-table th, .clients-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(0, 242, 255, 0.1);
        }
        
        .clients-table th {
            background: rgba(0, 242, 255, 0.1);
            color: var(--primary);
            font-weight: 600;
            text-shadow: 0 0 5px rgba(0, 242, 255, 0.5);
        }
        
        .clients-table tr:hover {
            background: rgba(0, 242, 255, 0.05);
        }
        
        .clients-table tr:last-child td {
            border-bottom: none;
        }
        
        .action-btn {
            padding: 6px 12px;
            margin: 0 5px;
            border-radius: 4px;
            font-size: 14px;
            transition: all 0.3s;
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
            max-width: 500px;
            box-shadow: 0 5px 30px rgba(0, 242, 255, 0.2);
            position: relative;
            animation: modalopen 0.3s;
            border: 1px solid rgba(0, 242, 255, 0.2);
        }
        
        @keyframes modalopen {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
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
        #clientForm div {
            margin-bottom: 20px;
        }
        
        #clientForm label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--primary);
            text-shadow: 0 0 5px rgba(0, 242, 255, 0.3);
        }
        
        #clientForm input {
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
        
        #clientForm input:focus {
            border-color: var(--accent);
            outline: none;
            box-shadow: 0 0 10px rgba(255, 0, 242, 0.3);
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
            
            .clients-table {
                display: block;
                overflow-x: auto;
            }
            
            .crud-buttons {
                text-align: center;
            }
            
            .modal-content {
                width: 95%;
                margin: 10% auto;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php" class="logo">NE<span>ON</span></a>
            <ul class="nav-links">
                <li><a href="index.php">Главная</a></li>
                <li><a href="magazine.php">Каталог</a></li>
                <li><a href="clients.php">Клиенты</a></li>
                <li><a href="dostavka.html">Доставка</a></li>
            </ul>
        </nav>
        
        <div class="crud-buttons">
            <button id="addClientBtn" class="btn pulse">Добавить клиента</button>
        </div>
        
        <table class="clients-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Телефон</th>
                    <th>Дата добавления</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody id="clientsTableBody">
                <!-- Клиенты будут загружаться здесь -->
            </tbody>
        </table>
        
        <!-- Модальное окно для добавления/редактирования -->
        <div id="clientModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 id="modalTitle">Добавить клиента</h2>
                <form id="clientForm">
                    <input type="hidden" id="clientId" name="id" value="">
                    <div>
                        <label>ФИО:</label>
                        <input type="text" id="clientName" required>
                    </div>
                    <div>
                        <label>Телефон:</label>
                        <input type="tel" id="clientPhone" required>
                    </div>
                    <button type="submit" class="btn">Сохранить</button>
                </form>
            </div>
        </div>
        
        <!-- Toast уведомление -->
        <div class="toast" id="toast">
            <i class="fas fa-check-circle"></i>
            <span id="toastMessage">Клиент успешно добавлен</span>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('clientModal');
            const addBtn = document.getElementById('addClientBtn');
            const closeBtn = document.querySelector('.close');
            const clientForm = document.getElementById('clientForm');
            const clientsTableBody = document.getElementById('clientsTableBody');
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            
            let currentAction = 'add';
            let currentClientId = null;
            
            // Показать toast уведомление
            function showToast(message) {
                toastMessage.textContent = message;
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            }
            
            // Загрузка клиентов
            function loadClients() {
                fetch('get_clients.php')
                    .then(response => response.json())
                    .then(clients => {
                        clientsTableBody.innerHTML = '';
                        
                        clients.forEach(client => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${client.id}</td>
                                <td>${client.full_name}</td>
                                <td>${client.phone}</td>
                                <td>${new Date(client.created_at).toLocaleString()}</td>
                                <td>
                                    <button class="btn action-btn" onclick="editClient(${client.id})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger action-btn" onclick="deleteClient(${client.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            `;
                            clientsTableBody.appendChild(row);
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('Ошибка загрузки клиентов');
                    });
            }
            
            // Открытие модального окна для добавления
            addBtn.onclick = function() {
                currentAction = 'add';
                document.getElementById('modalTitle').textContent = 'Добавить клиента';
                clientForm.reset();
                modal.style.display = 'block';
            };
            
            // Закрытие модального окна
            closeBtn.onclick = function() {
                modal.style.display = 'none';
            };
            
            // Закрытие при клике вне модального окна
            window.onclick = function(event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            };
            
            // Обработка отправки формы
            clientForm.onsubmit = async function(e) {
                e.preventDefault();
    
                const clientData = {
                    id: document.getElementById('clientId').value,
                    full_name: document.getElementById('clientName').value,
                    phone: document.getElementById('clientPhone').value
                };

                const url = clientData.id ? 'update_client.php' : 'add_client.php';

                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(clientData)
                    });
            
                    const data = await response.json();
                    
                    if (!response.ok) {
                        throw new Error(data.error || 'Unknown error');
                    }
                    
                    showToast(clientData.id ? 'Клиент успешно обновлен' : 'Клиент успешно добавлен');
                    loadClients();
                    modal.style.display = 'none';
                } catch (error) {
                    console.error('Error:', error);
                    showToast('Ошибка: ' + error.message);
                }
            };
            
            // Глобальные функции для редактирования и удаления
            window.editClient = function(id) {
                currentAction = 'edit';
                currentClientId = id;
                document.getElementById('modalTitle').textContent = 'Редактировать клиента';
                
                fetch('get_clients.php')
                    .then(response => response.json())
                    .then(clients => {
                        const client = clients.find(c => c.id == id);
                        if (client) {
                            document.getElementById('clientId').value = client.id;
                            document.getElementById('clientName').value = client.full_name;
                            document.getElementById('clientPhone').value = client.phone;
                            modal.style.display = 'block';
                        }
                    });
            };
            
            window.deleteClient = function(id) {
                if (confirm('Вы уверены, что хотите удалить этого клиента?')) {
                    fetch('delete_client.php', {
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
                        showToast(data.message || 'Клиент успешно удален');
                        loadClients();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('Ошибка при удалении: ' + error.message);
                    });
                }
            };
            
            // Первоначальная загрузка клиентов
            loadClients();
        });
    </script>
</body>
</html>