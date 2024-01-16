<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "km_online";

// Membuat koneksi ke database MySQL
$con = mysqli_connect($servername, $username, $password, $db);

// Memeriksa apakah koneksi berhasil, jika tidak, tampilkan pesan kesalahan
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memulai sesi
session_start();

// Fungsi untuk mendapatkan posting pengguna
function getUserPosts()
{
    global $con;

    // Query untuk mengambil posting pengguna beserta jumlah 'like'
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

        // Memecah teks content menjadi paragraf
        $row['content'] = breakTextIntoParagraphs($row['content']);

        $row['comments'] = $comments;
        $posts[] = $row;
    }

    return $posts;
}

// Fungsi untuk mendapatkan komentar dari suatu posting
function getPostComments($post_id)
{
    global $con;

    // Query untuk mengambil komentar pada posting tertentu
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

// Fungsi untuk memecah teks menjadi paragraf
function breakTextIntoParagraphs($text)
{
    // Pecah teks menjadi paragraf jika lebih dari 20 karakter
    $paragraphs = array_filter(preg_split('/\n|\r/', $text));
    $result = '';

    foreach ($paragraphs as $paragraph) {
        if (strlen(trim($paragraph)) > 20) {
            $result .= '<p>' . trim($paragraph) . '</p>';
        }
    }

    return $result;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['post'])) {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

            // Memastikan isi pesan tidak kosong
            if (empty($content)) {
                echo "Pesan tidak boleh kosong.";
            } else {
                $contentWithLineBreaks = nl2br($content); // Menambahkan line breaks
                $contentWithLineBreaks = mysqli_real_escape_string($con, $contentWithLineBreaks);

                // Menyisipkan posting pengguna ke dalam database
                $query = "INSERT INTO user_posts (user_id, content) VALUES ('$user_id', '$contentWithLineBreaks')";

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

            // Memastikan komentar tidak kosong
            if (empty($content)) {
                echo "Komentar tidak boleh kosong.";
            } else {
                $contentWithLineBreaks = nl2br($content); // Menambahkan line breaks
                $contentWithLineBreaks = mysqli_real_escape_string($con, $contentWithLineBreaks);

                // Menyisipkan komentar ke dalam database
                $query = "INSERT INTO comments (post_id, user_id, content) VALUES ('$post_id', '$user_id', '$contentWithLineBreaks')";

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

            // Pastikan pengguna hanya dapat memberikan satu 'like' per posting
            $checkQuery = "SELECT * FROM likes WHERE post_id = '$post_id' AND user_id = '$user_id'";
            $checkResult = mysqli_query($con, $checkQuery);

            if (mysqli_num_rows($checkResult) == 0) {
                // Pengguna belum memberikan 'like', tambahkan 'like'
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Twitter</title>
    <link rel="stylesheet" href="asu.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</head>

<body>
    <!-- Konten Utama -->
    <div class="container">
        <!-- Header -->
        <div class="feed__header">
            <h2>Home</h2>
        </div>

        <!-- Tweet Box -->
        <div class="tweetBox">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="tweetbox__input">
                    <input type="text" name="content" placeholder="What's happening?"
                        oninput="insertLineBreaks(this, 15)" />
                </div>
                <button class="tweetBox__tweetButton" type="submit" name="post">Post</button>
            </form>
        </div>

        <!-- Post -->
        <?php
        $posts = getUserPosts();
        foreach ($posts as $post) {
            $username = $post['username'];
            $content = $post['content'];
            $waktu = $post['post_date'];
            ?>
            <div class="pot">
                <div class="post__body">
                    <div class="post__header">
                        <div class="post__headerText">
                            <h3>
                                <?php echo $username; ?>
                                <span class="post__headerSpecial">@
                                    <?php echo $waktu; ?>
                                </span>
                            </h3>
                        </div>
                        <div class="post__headerDescription">
                            <p class="texti">
                                <?php echo $content; ?>
                            </p>
                            <?php echo '<p>Like: ' . $post['like_count'] . '</p>'; ?>
                        </div>
                    </div>
                    <form method="POST" action="">
                        <?php echo '<input type="hidden" name="post_id" value="' . $post['post_id'] . '">'; ?>
                        <div class="post__footer">
                            <button type="button" class="material-icons" data-bs-toggle="modal"
                                data-bs-target="#exampleModal<?php echo $post['post_id']; ?>"
                                data-bs-whatever="@mdo">repeat</button>
                            <button type="submit" name="like" class="material-icons">favorite_border</button>
                        </div>
                    </form>

                    <!-- Comments -->
                    <?php if (!empty($post['comments'])) { ?>
                        <div class="comments komentar">
                            <?php foreach ($post['comments'] as $comment) { ?>
                                <div class="comment">
                                    <p class="comment-meta">
                                        Komentar <strong>
                                            <?php echo $comment['username']; ?>
                                        </strong> -
                                        <?php echo $comment['comment_date']; ?>
                                    </p>
                                    <div id="post-text">
                                        <p>
                                            <?php echo $comment['content']; ?>
                                        </p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>


                    <div class="modal fade" id="exampleModal<?php echo $post['post_id']; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel<?php echo $post['post_id']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel<?php echo $post['post_id']; ?>">
                                        Komentar</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php if (isset($_SESSION['user_id'])) { ?>
                                        <form method="POST" action="">
                                            <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                                            <div class="mb-3">
                                                <label name="comment_content" for="message-text"
                                                    class="col-form-label">Komentar:</label>
                                                <textarea class="form-control" name="comment_content"
                                                    placeholder="Tulis komentar" required></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="comment" class="btn btn-primary">Kirim
                                                    Komentar</button>
                                            </div>
                                        </form>
                                    <?php } else { ?>
                                        <p>Anda harus login untuk melakukan komentar.</p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+oCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        </script>
</body>

</html>