<?php
include './connection.php';

if (isset($_GET['id'])) {
    $projectId = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM projecten WHERE id = :id");
    $stmt->bindValue(':id', $projectId);
    $stmt->execute();
    $project = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio Website - Edit pagina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1 projects">
                <div class="project card shadow-sm card-body m-2">
                    <form action="./handlers/update_project_handler.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Titel</label>
                            <input type="text" class="form-control" value="<?php echo $project['titel']; ?>" id="titel"
                                name="titel" placeholder="Titel" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kort beschriving</label>
                            <input type="text" class="form-control" value="<?php echo $project['kort_beschrijving']; ?>"
                                id="kort_beschrijving" name="kort_beschrijving" placeholder="Kort beschriving" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Beschriving</label>
                            <input type="text" class="form-control" value="<?php echo $project['beschrijving']; ?>"
                                id="beschrijving" name="beschrijving" placeholder="Beschriving" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <input type="text" class="form-control" value="<?php echo $project['type']; ?>" id="type"
                                name="type" placeholder="Type" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jaar</label>
                            <input type="text" class="form-control" value="<?php echo $project['jaar']; ?>" id="jaar"
                                name="jaar" placeholder="Jaar" />
                        </div>
                        <div class="modal-footer d-block">
                            <button type="submit" class="btn btn-warning float-end">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>