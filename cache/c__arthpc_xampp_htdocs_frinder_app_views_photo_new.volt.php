<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-9">
                <a href="/photo" class="btn btn-primary">Zurück</a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="post" action="/place/create">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="country" name="name" placeholder="Name" autocomplete="off" required tabindex="1">
            </div>
            <div class="form-group">
                <label for="gid">Google Place ID</label>
                <input type="text" class="form-control" id="zipcode" name="gid" placeholder="Google Place ID" autocomplete="off" required tabindex="2">
            </div>
            <div class="form-group">
                <label for="badge"></label>
                <input type="text" class="form-control" id="badge" name="badge" placeholder="Badge" autocomplete="off" tabindex="3">
            </div>
            <div class="form-group">
                <label for="description">Beschreibung</label>
                <textarea class="form-control" name="description" id="description" rows="5" tabindex="4"></textarea>
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Speichern</button>
        </form>
    </div>
</div>