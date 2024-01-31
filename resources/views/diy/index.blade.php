@extends('layout')
@section('content')
<!-- component -->
<html>

<div class="w-full md:w-3/5 mx-auto justify-center">
    <div class="mx-5 my-3 text-sm">
        <a href="" class="text-[#1c3242] font-bold tracking-widest">Do It Yourself</a>
    </div>
    <!-- Titre -->
    <div class="w-full text-gray-800 text-4xl px-5 font-bold leading-none">
        La recette de lessive maison au savon de Marseille
    </div>
    <div class="w-full text-gray-600 font-thin italic px-5 pt-3">
        Article mis à jour le : 30/01/2024
    </div>
    <!-- Mini résumé -->
    <div class="w-full text-gray-500 px-5 pb-5 pt-2">
        Découvrez une alternative écologique et économique pour laver votre linge en fabriquant votre propre lessive à la maison. En utilisant des ingrédients simples et naturels, vous pouvez créer une solution de lessive efficace qui prend soin de votre linge tout en réduisant l'impact sur l'environnement.
    </div>
    <!-- Image principale -->
    <div class="mx-5">
        <img src="https://mescoursesenvrac.com/wp-content/uploads/2020/04/Lessive-maison-au-savon-de-Marseille-Mes-courses-en-vrac.png" class="mx-auto block">
    </div>
    <!-- Espace -->
    <div class="my-5"></div>
    <!-- Contenu -->
    <div class="px-5 w-full mx-auto border-b py-3">
        <h1><strong>Pourquoi faire sa propre lessive ?</strong></h1>
        <p class="my-1">Faire sa lessive maison permet avant tout de maîtriser les ingrédients qui la composent. Trop de lessives industrielles contiennent des solvants, des agents chimiques, de texture, des parfums qui finissent par irriter notre peau et polluent notre environnement.<br>
            Une lessive maison c’est donc avant tout une lessive simple, à base de peu d’ingrédients, qui soit saine pour nous et la planète.
            <br>
            La lessive maison c’est aussi un bon moyen de faire des économies. Avec 3 produits, on peut faire sa lessive pour 1 an, voire plus. C’est aussi une économie de déchets puisque qu’on réutilise le même contenant à chaque réalisation.
        </p>
    </div>
    <!-- Espace -->
    <div class="my-5"></div>
    <!-- Vidéo -->
    <div class="mx-5">
        <div class="relative" style="padding-bottom: 56.25%;">
            <!-- 16:9 aspect ratio -->
            <iframe
                class="absolute top-0 left-0 w-full h-full"
                width="760"
                height="615"
                src="https://www.youtube.com/embed/zNvvTkXhE2I?si=zY1J2JYEUAsC_r2S"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
            ></iframe>
        </div>
    </div>

    <!-- Espace entre la vidéo et les sections suivantes -->
    <div class="my-5"></div>

    <!-- Ingrédients -->
    <div class="px-5 w-full mx-auto border-b py-3">
        <h2 class="font-bold">Ingrédients</h2>
        <ul>
            <li class="mb-1">• 2 cuillères à soupe bombées de bicarbonate de soude (42g environ);</li>
            <li class="mb-1">• 1 cuillère à soupe bombée de cristaux de soude (11g environ);</li>
            <li class="mb-1">• 50g de savon de Marseille râpé finement;</li>
            <li class="mb-1">• 2 litres d'eau;</li>
            <li class="mb-1"><i>• Facultatif : quelques gouttes d’huile essentielle de lavande;</i></li>
        </ul>
    </div>

    <!-- Espace entre les sections -->
    <div class="my-4"></div>

    <!-- Ustensiles -->
    <div class="px-5 w-full mx-auto border-b py-3">
        <h2 class="font-bold">Ustensiles</h2>
        <ul>
            <li class="mb-1">• 1 bouteille de 2 litres;</li>
            <li class="mb-1">• 1 casserole;</li>
            <li class="mb-1">• 1 récipient de plus de 500ml;</li>
            <li class="mb-1">• 1 verre doseur;</li>
            <li class="mb-1">• 1 fouet;</li>
            <li class="mb-1">• 1 entonnoir;</li>
        </ul>
    </div>

    <!-- Espace entre les sections -->
    <div class="my-4"></div>

    <!-- Étapes de la recette -->
    <div class="px-5 w-full mx-auto py-3">
        <h2 class="font-bold">Étapes de la recette</h2>
        <ol>
            <li><i>Attention, lessive maison ne veut pas dire produits inoffensifs. Les poudres utilisées peuvent être dangereuses. Nous vous conseillons vivement d’utiliser des lunettes de protection et de réaliser vos produits dans une pièce bien aérée. Évitez aussi de « respirer » le produit pendant sa fabrication.</i></li>
            <br>
            <li><strong>Étape n°1 :</strong> faites fondre le savon de Marseille dans 2L d’eau chaude. Il n’est pas nécessaire de faire bouillir l’eau, il faut juste qu’elle soit bien chaude. Remuez jusqu’à dissolution complète.</li>
            <br>
            <li><strong>Étape n°2 :</strong> remplissez le récipient de 2L d’eau à température ambiante. Mélangez dedans le bicarbonate de soude et les cristaux de soude. Attention lorsque vous manipulez ces ingrédients, protégez bien vos mains et vos yeux et veillez à ne pas respirer les produits.</li>
            <br>
            <li><strong>Étape n°3 :</strong> une fois que chaque mélange est bien homogène, versez le contenu du récipient dans la casserole de savon. Mélangez bien puis versez le tout dans la bouteille de lessive à l’aide d’un entonnoir. Si vous le souhaitez, ajoutez quelques gouttes d’huile essentielle (4-5 minutes environ).</li>
            <br>
            <li><strong>Étape n°4 :</strong> Laissez reposer le mélange une nuit avant de l'utiliser.</li>
            <br>
            <li><strong>Utilisation & dosage :</strong> ce mélange est très concentré, vous pouvez ne mettre qu’1 à 2 cuillère à soupe dans votre machine à laver. Pour un dosage idéal, le mieux est de faire quelques essais chez vous, en fonction de la taille de votre machine, de la saleté de votre linge etc. Veillez à bien mélanger avant de l’utiliser.</li>
            <br>
            <li><strong>Astuce :</strong> si votre eau est calcaire, ajoutez de temps en temps un verre de vinaigre blanc dans votre bac d’adoucissant. Cela évitera à votre machine de s’entartrer. Attention toutefois, le vinaigre ne fait pas bon ménage avec les couches lavables !</li>

        
        </ol>
    </div>
</div>

</html>

@endsection
