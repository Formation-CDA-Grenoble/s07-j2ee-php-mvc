<div>
    <?php foreach ($products as $product): ?>
    <div>
        <a href="/products/<?= $product->getId() ?>">
            <h2><?= $product->getName() ?></h2>
        </a>
        <div>Prix: <?= $product->getPrice() ?>€</div>
    </div>
    <?php endforeach; ?>
</div>