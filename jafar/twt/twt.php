<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "km_online";

$con = mysqli_connect($servername, $username, $password, $db);

if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

session_start();

function getUserPosts($user_id) {
    global $con;
    $user_id = mysqli_real_escape_string($con, $user_id);
    $query = "SELECT user_posts.post_id, user_posts.user_id, user_id.username, user_posts.content, user_posts.post_date, COUNT(likes.post_id) AS like_count
              FROM user_posts
              INNER JOIN user_id ON user_posts.user_id = user_id.id
              LEFT JOIN likes ON user_posts.post_id = likes.post_id
              GROUP BY user_posts.post_id, user_posts.user_id, user_id.username, user_posts.content, user_posts.post_date
              ORDER BY like_count DESC, user_posts.post_date DESC";

    $result = mysqli_query($con, $query);

    $posts = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $post_id = $row['post_id'];
        $comments = getPostComments($post_id);

        $row['comments'] = $comments;
        $posts[] = $row;
    }

    return $posts;
}

function getPostComments($post_id) {
    global $con;
    $post_id = mysqli_real_escape_string($con, $post_id);
    $query = "SELECT comments.comment_id, comments.user_id, user_id.username, comments.content, comments.comment_date
              FROM comments
              INNER JOIN user_id ON comments.user_id = user_id.id
              WHERE comments.post_id = '$post_id'
              ORDER BY comments.comment_date";

    $result = mysqli_query($con, $query);

    $comments = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $comments[] = $row;
    }

    return $comments;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['post'])) {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

            if (empty($content)) {
                echo "Pesan tidak boleh kosong.";
            } else {
                $content = mysqli_real_escape_string($con, $content);
                $query = "INSERT INTO user_posts (user_id, content) VALUES ('$user_id', '$content')";

                if (mysqli_query($con, $query)) {
                    echo "Pesan berhasil diposting.";
                } else {
                    echo "Terjadi kesalahan: " . mysqli_error($con);
                }
            }
        } else {
            echo "Anda harus login untuk melakukan posting.";
        }
    } elseif (isset($_POST['comment'])) {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $post_id = $_POST['post_id'];
            $content = htmlspecialchars($_POST['comment_content'], ENT_QUOTES, 'UTF-8');

            if (empty($content)) {
                echo "Komentar tidak boleh kosong.";
            } else {
                $content = mysqli_real_escape_string($con, $content);
                $query = "INSERT INTO comments (post_id, user_id, content) VALUES ('$post_id', '$user_id', '$content')";

                if (mysqli_query($con, $query)) {
                    echo "Komentar berhasil ditambahkan.";
                } else {
                    echo "Terjadi kesalahan: " . mysqli_error($con);
                }
            }
        } else {
            echo "Anda harus login untuk melakukan komentar.";
        }
    } elseif (isset($_POST['like'])) {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $post_id = $_POST['post_id'];
            
            // Pastikan user dapat memberikan satu like per postingan
            $checkQuery = "SELECT * FROM likes WHERE post_id = '$post_id' AND user_id = '$user_id'";
            $checkResult = mysqli_query($con, $checkQuery);

            if (mysqli_num_rows($checkResult) == 0) {
                // User belum memberikan like, tambahkan like
                $likeQuery = "INSERT INTO likes (post_id, user_id) VALUES ('$post_id', '$user_id')";

                if (mysqli_query($con, $likeQuery)) {
                    echo "Anda memberikan like pada postingan ini.";
                } else {
                    echo "Terjadi kesalahan: " . mysqli_error($con);
                }
            } else {
                echo "Anda sudah memberikan like pada postingan ini sebelumnya.";
            }
        } else {
            echo "Anda harus login untuk memberikan like.";
        }
    }
}

?>

<form method="POST" action="">
    <textarea name="content" placeholder="Apa yang Anda pikirkan?" required></textarea>
    <button type="submit" name="post">Post</button>
</form>

<?php
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $posts = getUserPosts($user_id);

    foreach ($posts as $post) {
        echo '<div class="post">';
        echo '<strong>' . $post['username'] . '</strong> - ' . $post['post_date'];
        echo '<p>' . $post['content'] . '</p>';
        echo '<p>Like Count: ' . $post['like_count'] . '</p>';
        
        // Tombol Like
        echo '<form method="POST" action="">';
        echo '<input type="hidden" name="post_id" value="' . $post['post_id'] . '">';
        echo '<button type="submit" name="like">Like</button>';
        echo '</form>';

        if (!empty($post['comments'])) {
            echo '<div class="comments">';
            foreach ($post['comments'] as $comment) {
                echo '<p><strong>' . $comment['username'] . '</strong> - ' . $comment['comment_date'] . '</p>';
                echo '<p>' . $comment['content'] . '</p>';
            }
            echo '</div>';
        }

        echo '<form method="POST" action="">';
        echo '<input type="hidden" name="post_id" value="' . $post['post_id'] . '">';
        echo '<textarea name="comment_content" placeholder="Tulis komentar" required></textarea>';
        echo '<button type="submit" name="comment">Komentar</button>';
        echo '</form>';
        echo '</div>';
    }
}
?>