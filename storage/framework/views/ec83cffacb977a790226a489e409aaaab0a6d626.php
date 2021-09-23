<?php $__env->startSection('content'); ?>
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Barang</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                   <tr>
                                    <td><?php echo e($item-> id); ?></td>
                                    <td><?php echo e($item-> name); ?></td>
                                    <td><?php echo e($item-> type); ?></td>
                                    <td><?php echo e($item-> price); ?></td>
                                    <td><?php echo e($item-> quantity); ?></td>
                                    <td>
                                        <a href="<?php echo e(route ('products.gallery', $item-> id)); ?>"  class="btn btn-info">
                                        
                                            <i class="fa fa-picture-o"></i>
                                        </a>
                                        <a href="<?php echo e(route ('products.edit', $item-> id)); ?>"  class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="<?php echo e(route ('products.destroy', $item-> id)); ?>" 
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
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/herbayu/laravel/shayna-BackEnd/resources/views/pages/products/index.blade.php ENDPATH**/ ?>