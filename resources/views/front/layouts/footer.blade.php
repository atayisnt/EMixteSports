<!-- Footer -->
<footer class="bg-dark text-light py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>EMixteSports</h5>
                <p>Votre destination pour l'équipement sportif de qualité</p>
            </div>
            <div class="col-md-4">
                <h5>Liens rapides</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-light">Accueil</a></li>
                    <li><a href="{{ route('products.all') }}" class="text-light">Produits</a></li>
                    <li><a href="{{ route('products.latest') }}" class="text-light">Nouveautés</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contact</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-envelope"></i> contact@emixte.com</li>
                    <li><i class="bi bi-phone"></i> +33 1 23 45 67 89</li>
                    <li><i class="bi bi-geo-alt"></i> Paris, France</li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} EMixteSports. Tous droits réservés.</p>
        </div>
    </div>
</footer> 