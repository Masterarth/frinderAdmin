<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-9">
                <a href="/place/show/<?= $placeid ?>" class="btn btn-primary">Zurück</a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="post" action="/type/create">
            <input type="hidden" name="placeid" value="<?= $placeid ?>"/>
            <div class="form-group">
                <label for="name">Typ-Bezeichnung</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Type-Bezeichnung" autocomplete="off" required tabindex="1">
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Speichern</button>
        </form>
    </div>
</div>
