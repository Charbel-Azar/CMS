<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('expense_categories'); ?>
                <div class="col-md-4 no-print pull-right"> 
                    <a href="finance/addExpenseCategoryView">
                        <div class="btn-group pull-right">
                            <button id="" class="btn editbutton btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_expense_category'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th><?php echo lang('category'); ?></th>
                                <th><?php echo lang('description'); ?></th>
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <th class="no-print"><?php echo lang('options'); ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <style>

                            .img_url{
                                height:20px;
                                width:20px;
                                background-size: contain; 
                                max-height:20px;
                                border-radius: 100px;
                            }

                        </style>

                        <?php foreach ($categories as $category) { ?>
                            <tr class="">
                                <td><?php echo $category->category; ?></td>
                                <td> <?php echo $category->description; ?></td>
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <td class="no-print">
                                        <a class="btn btn-info btn-xs editbutton" title="<?php echo lang('edit'); ?>" href="finance/editExpenseCategory?id=<?php echo $category->id; ?>"><i class="fa fa-edit"></i> </a>
                                        <a class="btn btn-info btn-xs delete_button" title="<?php echo lang('delete'); ?>" href="finance/deleteExpenseCategory?id=<?php echo $category->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i> </a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->


<script src="common/js/codearistos.min.js"></script>
<script>
    $(document).ready(function () {
       var table = $('#editable-sample').DataTable({
            responsive: true,

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1],
                    }
                },
            ],

            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: -1,
            "order": [[0, "desc"]],

           "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json" 
            }
        });
        table.buttons().container().appendTo('.custom_buttons');
        
    });
</script>