<!-- Dropdown de navegação fixo -->
<div class="dropdown-nav-fixed">
    <button class="dropdown-btn" onclick="toggleDropdown()">
        ☰ Menu
    </button>
    <div class="dropdown-content" id="dropdownContent">
        <a href="index.php">🏠 Início</a>
        <a href="cadastro.php">➕ Cadastrar Funcionário</a>
        <a href="consultar_funcionario.php">📋 Listar Funcionários</a>
        <a href="visualizar_funcionario.php">👁️ Visualizar Funcionários</a>
    </div>
</div>

<style>
.dropdown-nav-fixed {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 1000;
}

.dropdown-btn {
    background-color: #1976d2;
    color: white;
    padding: 12px 16px;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s;
}

.dropdown-btn:hover {
    background-color: #125ea7;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: white;
    min-width: 200px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    margin-top: 8px;
    overflow: hidden;
}

.dropdown-content a {
    color: #333;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    transition: background-color 0.2s;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

.dropdown-content.show {
    display: block;
}

/* Fechar dropdown quando clicar fora */
body {
    margin: 0;
    padding: 0;
}
</style>

<script>
function toggleDropdown() {
    document.getElementById("dropdownContent").classList.toggle("show");
}

// Fechar dropdown quando clicar fora dele
window.onclick = function(event) {
    if (!event.target.matches('.dropdown-btn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
</script>