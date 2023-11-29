<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Titel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./handlers/add_project_handler.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Titel</label>
                        <input type="text" class="form-control" id="titel" name="titel" placeholder="Titel" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kort beschriving</label>
                        <input type="text" class="form-control" id="kort_beschrijving" name="kort_beschrijving"
                            placeholder="Kort beschriving" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Beschriving</label>
                        <input type="text" class="form-control" id="beschrijving" name="beschrijving"
                            placeholder="Beschriving" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type" placeholder="Type" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jaar</label>
                        <input type="text" class="form-control" id="jaar" name="jaar" placeholder="Jaar" />
                    </div>
                    <div class="modal-footer d-block">
                        <button type="submit" class="btn btn-warning float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>