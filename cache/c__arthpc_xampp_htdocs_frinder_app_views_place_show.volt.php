<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-9">
                <a href="/place/" class="btn btn-primary">Zurück</a>
                <a href="/photo/add/<?= $place->id ?>" class="btn btn-primary">Foto hinzufügen</a>
                <a href="/type/add/<?= $place->id ?>" class="btn btn-primary">Kategorie hinzufügen</a>
                <a href="/place/edit/<?= $place->id ?>" class="btn btn-primary">Bearbeiten</a>
            </div>
        </div>
    </div>
</div>

<div class="card"> 
    <div class="card-body">
        <h5 class="card-title"><?= $place->name ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">ID: <?= $place->id ?></h6>
        <h6 class="card-subtitle mb-2 text-muted">GID: <?= $place->gid ?></h6>
        <p class="card-text"><?= $place->badge ?></p>
        <p class="card-text"><?= $place->description ?></p>
        <p class="card-text"><?= $place->lon ?></p>
        <p class="card-text"><?= $place->lat ?></p>
    </div>
</div>

<div class="card"> 
    <div class="card-body">
        <h5 class="card-title">Type</h5>
        <div class="row">
            <?php foreach ($place->Placetype as $placetype) { ?>
                <div class="col-md-3">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <?= $placetype->type->name ?>
                        <button onclick="window.location.href = '/placetype/delete/<?= $placetype->id ?>'" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="card-columns">
    <?php foreach ($place->photo as $photo) { ?>
        <div class="card">
            <img class="card-img-top" src="<?= $photo->src ?>" alt="Card image cap">
            <div class="card-body">
                <a href="/photo/delete/<?= $photo->id ?>" class="btn btn-danger">Löschen</a>
            </div>
        </div>
    <?php } ?>
</div>