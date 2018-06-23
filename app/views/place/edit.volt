<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-9">
                {{tag.linkTo(["place/index","Zurück", "class":"btn btn-primary"])}}
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="post" action="/place/save">
            <input type="hidden" name="id" value="{{place.id}}" />
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" autocomplete="off" required value="{{place.name}}" tabindex="1">
            </div>
            <div class="form-group">
                <label for="gid">Google Place ID</label>
                <input type="text" class="form-control" id="gid" name="gid" placeholder="Google Place ID" autocomplete="off" value="{{place.gid}}" {%if place.gid is defined %}readonly{%endif%}  tabindex="2">
            </div>
            <div class="form-group">
                <label for="lat">Lat</label>
                <input type="text" class="form-control" id="lat" name="lat" placeholder="Lat" autocomplete="off" value="{{place.lat}}" tabindex="3">
            </div>           
            <div class="form-group">
                <label for="lon">Lon</label>
                <input type="text" class="form-control" id="lon" name="lon" placeholder="Lon" autocomplete="off" value="{{place.lon}}" tabindex="4">
            </div>
            <div class="form-group">
                <label for="badge">Badge</label>
                <input type="text" class="form-control" id="badge" name="badge" placeholder="Badge" autocomplete="off" value="{{place.badge}}" tabindex="5">
            </div>
            <div class="form-group">
                <label for="description">Beschreibung</label>
                <textarea class="form-control" name="description" id="description" rows="5">{{place.description}}</textarea>
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Speichern</button>
        </form>
    </div>
</div>