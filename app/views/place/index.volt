<div class="card">
    <div class="card-body">
        <form method="post" action="/place/index">
            <div class="input-group">
                <input type="text" class="form-control" name="searchstring" placeholder="Nach Place suchen" autocomplete="off" required>
                <div class="input-group-append">
                    <button class="btn btn-primary material-icons" id="validationTooltipUsernamePrepend">search</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                {{tag.linkTo(["place/new","Neuer Place", "class":"btn btn-primary"])}}
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Places</h5>
        <hr />
        {%for place in page.items %}
            <div class="row card-text">
                <div class="col-md-1">
                    <span class="font-weight-bold">{{place.id}}</span>
                </div>
                <div class="col-md-4">
                    <span class="font-weight-bold">{{place.gid}}</span>
                </div>
                <div class="col-md-3">
                    <span class="font-weight-bold">{{place.name}}</span>
                </div>
                <div class="col-md-4 text-right">
                    <a href="/place/show/{{place.id}}" class="btn btn-info material-icons">photo_size_select_actual</a>
                    <a href="/place/edit/{{place.id}}" class="btn btn-primary material-icons">edit</a>
                    <a href="/place/delete/{{place.id}}" class="btn btn-danger material-icons">delete</a>
                </div>
            </div>
            <hr />
        {%endfor%} 
    </div>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item {% if page.current == page.before %}disabled{%endif%}"><a class="page-link" tabindex="-1" href="/place/index/{{page.before}}"><span aria-hidden="true">&larr;</span> Zurück</a></li>
            <li class="page-item"><a class="page-link">{{page.total_items}} Places</a></li>
            <li class="page-item {% if page.current >= page.next %}disabled{%endif%}"><a class="page-link" href="/place/index/{{page.next}}">Weiter <span aria-hidden="true">&rarr;</span></a></li>
        </ul>
    </nav>
</div>