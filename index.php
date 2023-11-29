<?php
include './connection.php';
// Handle search query
$search = isset($_GET['search']) ? $_GET['search'] : '';
$searchCondition = !empty($search) ? "WHERE titel LIKE :search" : "";

$query = "SELECT * FROM projecten $searchCondition";
$stmt = $conn->prepare($query);

if (!empty($search)) {
  $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
}

$stmt->execute();
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio Website - Overzichtspagina</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
  <main>
    <div class="container">
      <div class="">
        <div class="d-flex justify-content-between align-items-center m-4">
          <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <div class="add">
              <button class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#modalForm">Add</button>
            </div>
          <?php endif; ?>
          <form method="get" class="d-flex justify-content-center">
            <div class="form-group">
              <label for="search-input" class="sr-only">Search</label>
              <input type="search" class="form-control" id="search-input" name="search" placeholder="Search..."
                value="<?= $search ?>" />
            </div>
            <button type="submit" class="btn btn-primary ml-2">Search</button>
          </form>

          <a href="./login.php"
            class="<?php echo (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) ? 'd-none' : 'd-block'; ?>">
            <button class="btn btn-primary ml-2">Login</button>
          </a>

          <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <form action="./handlers/logout_user_handler.php" method="POST">
              <button type="submit" class="btn btn-danger ml-2">Logout</button>
            </form>
          <?php endif; ?>

        </div>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1 projects">
          <!-- Card -->
          <?php foreach ($projects as $row): ?>
            <div class="project card shadow-sm card-body m-2">
              <div class="card-text">
                <h2>
                  <?= $row['titel'] ?>
                </h2>
                <div>
                  <?= $row['kort_beschrijving'] ?>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="btn-group">
                  <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-secondary">
                    View
                  </a>
                  <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <a href="./edit.php?id=<?= $row['id'] ?>"><button type="button" class="btn btn-sm btn-outline-secondary">
                        Edit
                      </button></a>
                    <form method="post" action="./handlers/delete_project_handler.php"
                      onsubmit="return confirm('Are you sure you want to delete this project?');">
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                      <button type="submit" class="btn btn-sm btn-outline-secondary" name="delete">Delete</button>
                    </form>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
  </main>
  <?php
  include './component/modal/add_project_modal.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>