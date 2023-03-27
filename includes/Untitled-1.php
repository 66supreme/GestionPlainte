<div class="alert alert-warning" id="interp">
            <strong>Attention!</strong> Vous êtes actuellement en mode anonyme. Vous pouvez continuer ou cliquez
            sur "M'identifier" pour renseigner vos informations.
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                M'identifier
            </button>
        </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Identification du plaignant</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <label for="nom" class="form-label">Nom:</label>
                            <input type="text" class="form-control" id="nom" placeholder="Raki" name="nom">
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="adresse" class="form-label">Adresse:</label>
                            <input type="text" class="form-control" id="adresse" placeholder="Abidjan,Yopougon" name="adresse">
                        </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" id="btnok" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" name="enregistrer" class="btn btn-primary">Envoyer</button>
            <button type="submit" class="btn btn-danger">Annuler</button>
        </div>
    </div>