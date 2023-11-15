<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            transition: background-color 0.5s, color 0.5s;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #dee2e6;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        .delete-button {
            color: #dc3545;
            cursor: pointer;
        }

        .dark-theme {
            background-color: #343a40;
            color: #ffffff;
        }

        .dark-theme table {
            border-color: #495057;
        }

        .dark-theme a {
            color: #17a2b8;
        }

        .dark-theme .delete-button {
            color: #ff3838;
        }

        .switch-button {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            color: #495057;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 20px;
            transition: background-color 0.5s, color 0.5s;
            align-items: center;
            justify-content: center;
            display: flex;
        }

        .dark-theme .switch-button {
            background-color: #495057;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div>
        <button onclick="toggleTheme()" class="switch-button">Toggle Theme</button>
    </div>

    <?php
    require "../koneksi.php";

    $user = "SELECT id, username, email, last_login FROM user_id";
    $hasil = $con->query($user);

    if ($hasil->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th>AKSI</th>
                </tr>";

        while ($row = $hasil->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>
                        <a href='hapus.php?id=" . $row["id"] . "' class='delete-button'>Hapus</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data ditemukan.";
    }
    $con->close();
    ?>

    <script>
        function toggleTheme() {
            const body = document.body;
            const currentTheme = body.classList.contains("dark-theme") ? "dark" : "light";
            const newTheme = currentTheme === "dark" ? "light" : "dark";

            body.classList.remove(`${currentTheme}-theme`);
            body.classList.add(`${newTheme}-theme`);
            localStorage.setItem("theme", newTheme);
        }

        const savedTheme = localStorage.getItem("theme");
        if (savedTheme) {
            document.body.classList.add(`${savedTheme}-theme`);
        }
    </script>
</body>

</html>