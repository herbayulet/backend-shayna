<?php $__env->startSection('content'); ?>
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Foto Barang <small><?php echo e($product->name); ?></small></h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Barang</th>
                                        <th>Foto</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                   <tr>
                                    <td><?php echo e($item->id); ?></td>
                                    <td><?php echo e($item->product-> name); ?></td>
                                    <td>
                                        <img src="<?php echo e(url ($item-> photo)); ?>" alt=""/>
                                    </td>
                                    <td><?php echo e($item->is_default ? 'Ya' : 'Tidak'); ?></td>
                                    <td>
                                        <form action="<?php echo e(route ('product-galleries.destroy', $item-> id)); ?>" 
                                                    method="post" 
                                                    class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                       <tr>
                                           <td colspan="6" class="text-center p-5">
                                               Data tidak ada
                                           </td>
                                       </tr>
                                   <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/herbayu/laravel/shayna-BackEnd/resources/views/pages/products/gallery.blade.php ENDPATH**/ ?>