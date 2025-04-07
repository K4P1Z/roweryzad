<?php
require 'connect.php';

if (isset($_POST['wyborKategorii'])) {
    $wybranaKategoria = $_POST['wyborKategorii'];
} else {
    $wybranaKategoria = '1';
}


$sql = "SELECT src, opis FROM produkty WHERE kategoria = ?";
$stmt = $polaczenie->prepare($sql);
$stmt->bind_param("s", $wybranaKategoria);
$stmt->execute();
$wynik = $stmt->get_result();

$produkty = [];
while ($row = $wynik->fetch_assoc()) {
    $produkty[] = $row;
}

$stmt->close();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklepik</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9fafb;
        color: #333;
    }
    #kontener {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    header {
        background-color: #1e293b;
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 1.8em;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    #glowna {
        display: flex;
        flex: 1;
        flex-wrap: wrap;
    }
    #menu {
        width: 100%;
        max-width: 250px;
        background-color: #334155;
        color: white;
        padding: 20px;
        box-sizing: border-box;
    }
    #menu h2 {
        margin-top: 0;
        font-size: 1.4em;
    }
    #menu select {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: none;
        border-radius: 5px;
        background-color: #475569;
        color: white;
        font-size: 1em;
    }
    #menu select:focus {
        outline: none;
        background-color: #64748b;
    }
    #content {
        flex: 1;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        align-items: start;
        box-sizing: border-box;
    }
    .produkt {
        background: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.2s, box-shadow 0.2s;
        text-align: center;
    }
    .produkt:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }
    .produkt img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin-bottom: 10px;
    }
    .produkt p {
        margin: 0;
        font-size: 1em;
        color: #555;
    }
    footer {
        background-color: #1e293b;
        color: white;
        text-align: center;
        padding: 15px;
        font-size: 0.9em;
    }

</style>

</head>
<body>
    <div id="kontener">
        <header>
            <h1>Sklep rowerowy</h1>
        </header>
        <div id="glowna">
            <div id="menu">
                <h2>Wybierz kategorię</h2>
                <form method="POST">
                    <select name="wyborKategorii" onchange="this.form.submit()">
                        <option value="1" <?php echo $wybranaKategoria === '1' ? 'selected' : ''; ?>>Kategoria 1</option>
                        <option value="2" <?php echo $wybranaKategoria === '2' ? 'selected' : ''; ?>>Kategoria 2</option>
                        <option value="3" <?php echo $wybranaKategoria === '3' ? 'selected' : ''; ?>>Kategoria 3</option>
                    </select>
                </form>
            </div>
            <div id="content">
                <?php foreach ($produkty as $produkt): ?>
                    <div class="produkt">
                        <img src="<?php echo $produkt['src']; ?>" alt="<?php echo $produkt['opis']; ?>">
                        <p><?php echo $produkt['opis']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <footer>
            <p>Sklep rowerowy</p>
        </footer>
    </div>
</body>
</html>
<?php
$polaczenie->close();
?>