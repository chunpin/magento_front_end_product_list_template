<?php
/**
 * Product list template
 *
 * @see Mage_Catalog_Block_Product_List
 */
?>
<?php
    $_categoryId = 35;
    $_category = new Mage_Catalog_Model_Category();
    $_category->load($_categoryId);
    $_productCollection = $_category->getProductCollection();
    $_productCollection->addAttributeToSelect('*');
?>


<h2><?php echo $_category->getName(); ?></h2>
 
<?php if(!$_productCollection->count()): ?>
    <p class="note-msg"><?php echo $this->__('There are no products matching the selection.') ?></p>
<?php else: ?>
    <div class="category-products">
        <ul class="products-grid">
            <?php foreach ($_productCollection as $_product): ?>
                <li class="item">
                    <a href="<?php echo $_product->getProductUrl() ?>" title="<?php echo $this->stripTags($this->getImageLabel($_product, 'small_image'), null, true) ?>" class="product-image">
                        <img src="<?php echo $this->helper('catalog/image')->init($_product, 'small_image')->resize(135); ?>" width="135" height="135" alt="<?php echo $this->stripTags($this->getImageLabel($_product, 'small_image'), null, true) ?>" />
                    </a>
 
                    <h2 class="product-name">
                        <a href="<?php echo $_product->getProductUrl() ?>" title="<?php echo $this->stripTags($_product->getName(), null, true) ?>">
                            <?php echo $_product->getName(); ?>
                        </a>
                    </h2>
 
                    <?php if($_product->getRatingSummary()): ?>
                        <?php echo $this->getReviewsSummaryHtml($_product, 'short') ?>
                    <?php endif; ?>
 
                    <?php echo $this->getPriceHtml($_product, true) ?>
 
                    <div class="actions">
                        <?php if($_product->isSaleable()): ?>
                            <button type="button" title="<?php echo $this->__('Add to Cart') ?>" class="button btn-cart" onclick="setLocation('<?php echo $this->getAddToCartUrl($_product) ?>')"><span><span><?php echo $this->__('Add to Cart') ?></span></span></button>
                        <?php else: ?>
                            <p class="availability out-of-stock"><span><?php echo $this->__('Out of stock') ?></span></p>
                        <?php endif; ?>
 
                        <ul class="add-to-links">
                            <?php if ($this->helper('wishlist')->isAllow()) : ?>
                                <li><a href="<?php echo $this->helper('wishlist')->getAddUrl($_product) ?>" class="link-wishlist"><?php echo $this->__('Add to Wishlist') ?></a></li>
                            <?php endif; ?>
                            <?php if($_compareUrl=$this->getAddToCompareUrl($_product)): ?>
                                <li><span class="separator">|</span> <a href="<?php echo $_compareUrl ?>" class="link-compare"><?php echo $this->__('Add to Compare') ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>



