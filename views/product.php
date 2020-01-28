<a href="/products">Retour à la liste des produits</a>
<img src="<?= $product->getPicture() ?>" />
<h1><?= $product->getName() ?></h1>
<div>Prix: <?= $product->getPrice() ?>€</div>
<p><?= $product->getDescription() ?></p>
