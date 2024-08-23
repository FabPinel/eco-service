<p>Bonjour,</p>

<p>Merci pour votre achat ! Nous vous invitons à laisser un avis sur vos produits.</p>

<p>Pour laisser un avis, veuillez cliquer sur le lien suivant :</p>

<a href="{{ $reviewUrl }}">Laisser un avis</a>

<p>Vous trouverez ci-dessous les tokens pour chaque produit :</p>

<ul>
    @foreach ($reviewTokens as $token)
        <li>{{ $token }}</li>
    @endforeach
</ul>

<p>Merci de votre confiance.</p>
