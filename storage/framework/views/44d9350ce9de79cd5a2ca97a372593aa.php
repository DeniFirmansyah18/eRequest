<header class="sticky top-0 before:absolute before:inset-0 before:backdrop-blur-md max-lg:before:bg-white/90 dark:max-lg:before:bg-gray-800/90 before:-z-10 z-30 <?php echo e($variant === 'v2' || $variant === 'v3' ? 'before:bg-white after:absolute after:h-px after:inset-x-0 after:top-full after:bg-gray-200 dark:after:bg-gray-700/60 after:-z-10' : 'max-lg:shadow-sm lg:before:bg-gray-100/90 dark:lg:before:bg-gray-900/90'); ?> <?php echo e($variant === 'v2' ? 'dark:before:bg-gray-800' : ''); ?> <?php echo e($variant === 'v3' ? 'dark:before:bg-gray-900' : ''); ?>">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 <?php echo e($variant === 'v2' || $variant === 'v3' ? '' : 'lg:border-b border-gray-200 dark:border-gray-700/60'); ?>">

            <!-- Header: Left side -->
            <div class="flex">
                
                <!-- Hamburger button -->
                <button
                    class="text-gray-500 hover:text-gray-600 dark:hover:text-gray-400 lg:hidden"
                    @click.stop="sidebarOpen = !sidebarOpen"
                    aria-controls="sidebar"
                    :aria-expanded="sidebarOpen"
                >
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="5" width="16" height="2" />
                        <rect x="4" y="11" width="16" height="2" />
                        <rect x="4" y="17" width="16" height="2" />
                    </svg>
                </button>

            </div>

            <!-- Header: Right side -->
            <div class="flex items-center space-x-3">

                <!-- Notifications button -->
                <!--<?php if (isset($component)) { $__componentOriginalf79de796c8f6af2e04e458215bf88445 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf79de796c8f6af2e04e458215bf88445 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-notifications','data' => ['align' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-notifications'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf79de796c8f6af2e04e458215bf88445)): ?>
<?php $attributes = $__attributesOriginalf79de796c8f6af2e04e458215bf88445; ?>
<?php unset($__attributesOriginalf79de796c8f6af2e04e458215bf88445); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf79de796c8f6af2e04e458215bf88445)): ?>
<?php $component = $__componentOriginalf79de796c8f6af2e04e458215bf88445; ?>
<?php unset($__componentOriginalf79de796c8f6af2e04e458215bf88445); ?>
<?php endif; ?>-->

                <!-- Dark mode toggle -->
                <?php if (isset($component)) { $__componentOriginal2090438866f3dcdb76cd8b070bcc302d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2090438866f3dcdb76cd8b070bcc302d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.theme-toggle','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('theme-toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2090438866f3dcdb76cd8b070bcc302d)): ?>
<?php $attributes = $__attributesOriginal2090438866f3dcdb76cd8b070bcc302d; ?>
<?php unset($__attributesOriginal2090438866f3dcdb76cd8b070bcc302d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2090438866f3dcdb76cd8b070bcc302d)): ?>
<?php $component = $__componentOriginal2090438866f3dcdb76cd8b070bcc302d; ?>
<?php unset($__componentOriginal2090438866f3dcdb76cd8b070bcc302d); ?>
<?php endif; ?>                

                <!-- Divider -->
                <hr class="w-px h-6 bg-gray-200 dark:bg-gray-700/60 border-none" />

                <!-- User button -->
                <?php if (isset($component)) { $__componentOriginal47960a53ca22e4c0165823f6e04bb506 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47960a53ca22e4c0165823f6e04bb506 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-profile','data' => ['align' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-profile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47960a53ca22e4c0165823f6e04bb506)): ?>
<?php $attributes = $__attributesOriginal47960a53ca22e4c0165823f6e04bb506; ?>
<?php unset($__attributesOriginal47960a53ca22e4c0165823f6e04bb506); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47960a53ca22e4c0165823f6e04bb506)): ?>
<?php $component = $__componentOriginal47960a53ca22e4c0165823f6e04bb506; ?>
<?php unset($__componentOriginal47960a53ca22e4c0165823f6e04bb506); ?>
<?php endif; ?>

            </div>

        </div>
    </div>
</header><?php /**PATH C:\xampp\htdocs\eRequest\resources\views/components/app/header.blade.php ENDPATH**/ ?>