<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['contentJson']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['contentJson']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $blocks = json_decode($contentJson, true) ?? [];
?>

<?php if(!empty($blocks)): ?>
    <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php switch($block['type']):
            case ('heading'): ?> 
                <?php if($block['data']['level'] == 1): ?>
                    <h1><?php echo $block['data']['text']; ?></h1>
                <?php elseif($block['data']['level'] == 2): ?>
                    <h2><?php echo $block['data']['text']; ?></h2>
                <?php elseif($block['data']['level'] == 3): ?>
                    <h3><?php echo $block['data']['text']; ?></h3>
                <?php else: ?>
                    <h4><?php echo $block['data']['text']; ?></h4>
                <?php endif; ?>
                <?php break; ?>

            <?php case ('paragraph'): ?>
                <p><?php echo $block['data']['text']; ?></p>
                <?php break; ?>

            <?php case ('list'): ?>
                <?php if($block['data']['style'] == 'ordered'): ?>
                    <ol>
                        <?php $__currentLoopData = $block['data']['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo $item; ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                <?php else: ?>
                    <ul>
                        <?php $__currentLoopData = $block['data']['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo $item; ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
                <?php break; ?>
        <?php endswitch; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\ekosistem-pesantren\resources\views/partials/_render_content.blade.php ENDPATH**/ ?>