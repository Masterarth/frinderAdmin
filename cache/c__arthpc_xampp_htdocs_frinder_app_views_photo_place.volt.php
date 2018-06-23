<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <a href="/place/show/<?= $placeid ?>" class="btn btn-primary">Zurück</a>
                <a href="/photo/add/<?= $placeid ?>" class="btn btn-primary">Foto hinzufügen</a>
            </div>
        </div>
    </div>
</div>
<div class="card-columns">
    <?php foreach ($photos as $photo) { ?>
        <div class="card">
            <img class="card-img-top" src="<?= $photo->src ?>" alt="Card image cap">
            <div class="card-body">
                <a href="/photo/delete/<?= $photo->id ?>" class="card-link">Löschen</a>
            </div>
        </div>
    <?php } ?>
</div>