<header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 text-center" id="titre">
				OLEV.com : les rois de la pédale
			</div>
		</div>
		<ul class="nav justify-content-center nav-pills" id="menu">
			<li class="nav-item dropdown">
				<a class="nav-link" href="/">Accueil</a>
			</li>
			<li class="nav-item dropdown">
        		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          		Client
        		</a>
        		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/annonce">Afficher tout les vélos</a>
              <a class="dropdown-item" href="/recherche_annonce">Rechercher un vélo</a>
        		</div>
      		</li>
      		<li class="nav-item dropdown">
        		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          		Propriétaire
        		</a>
        		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          			<a class="dropdown-item" href="/poster_annonce">Mettre une annonce</a>
                <a class="dropdown-item" href="/modifier_annonce">Modifier une annonce</a>
                <a class="dropdown-item" href="/supprimer_annonce">Supprimer une annonce</a>
        		</div>
      		</li>
			  {%  if not app.user %}
			<li class="nav item">
				<a class="nav-link" href="{{ path('security_login') }}"> connexion</a>
			</li>
			{% else %}
			<li class="nav item">
				<a class="nav-link" href="{{ path('security_logout') }}"> deconnexion</a>
			</li>
			{% endif %}
		</ul>
	</div>
</header>