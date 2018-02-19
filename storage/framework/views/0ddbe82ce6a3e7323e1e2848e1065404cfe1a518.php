<?php if($paginator->hasPages()): ?>
    <ul class="unstyled inbox-pagination">
        
        <li><span><?php echo e($paginator->firstItem()); ?> - <?php echo e($paginator->lastItem()); ?> of <?php echo e($paginator->total()); ?></span></li>
        <?php if($paginator->onFirstPage()): ?>
        <li>
            <a class="pl-15 pr-15"><i class="fa fa-angle-left  pagination-left"></i></a>
        </li>
        <?php else: ?>
        <li>
            <a class="pl-15 pr-15" href="<?php echo e($paginator->previousPageUrl()); ?>"><i class="fa fa-angle-left  pagination-left"></i></a>
        </li>
        <?php endif; ?>

        
        <?php if($paginator->hasMorePages()): ?>
        <li>
            <a href="<?php echo e($paginator->nextPageUrl()); ?>"><i class="fa fa-angle-right pagination-right"></i></a>
        </li>
        <?php else: ?>
            <li>
            <a><i class="fa fa-angle-right pagination-right"></i></a>
        </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>