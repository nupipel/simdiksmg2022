<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
   //This page is a result of an autogenerated content made by running test.html with firefox.
   function domo() {

      // Binding keys
      $('*').bind('keydown', 'Ctrl+a', function assets() {
         window.location.href = BASE_URL + '/administrator/Reminder/add';
         return false;
      });

      $('*').bind('keydown', 'Ctrl+f', function assets() {
         $('#sbtn').trigger('click');
         return false;
      });

      $('*').bind('keydown', 'Ctrl+x', function assets() {
         $('#reset').trigger('click');
         return false;
      });

      $('*').bind('keydown', 'Ctrl+b', function assets() {

         $('#reset').trigger('click');
         return false;
      });
   }

   jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      <?= cclang('reminder') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('reminder') ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">

      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        <?php is_allowed('reminder_add', function () { ?>
                           <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('reminder')]); ?>  (Ctrl+a)" href="<?= site_url('administrator/reminder/add'); ?>"><i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('reminder')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('reminder_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('reminder') ?> " href="<?= site_url('administrator/reminder/export?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('reminder') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('reminder')]); ?> <i class="label bg-yellow"><?= $reminder_counts; ?> <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_reminder" id="form_reminder" action="<?= base_url('administrator/reminder/index'); ?>">



                     <!-- /.widget-user -->
                     <div class="row">
                        <div class="col-md-8">
                           <div class="col-sm-2 padd-left-0 ">
                              <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email">
                                 <option value="delete">Delete</option>
                              </select>
                           </div>
                           <div class="col-sm-2 padd-left-0 ">
                              <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                           </div>
                           <div class="col-sm-3 padd-left-0  ">
                              <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                           </div>
                           <div class="col-sm-3 padd-left-0 ">
                              <select type="text" class="form-control chosen chosen-select" name="f" id="field">
                                 <option value=""><?= cclang('all'); ?></option>
                                 <option <?= $this->input->get('f') == 'title' ? 'selected' : ''; ?> value="title">Title</option>
                                 <option <?= $this->input->get('f') == 'message' ? 'selected' : ''; ?> value="message">Message</option>
                                 <option <?= $this->input->get('f') == 'type' ? 'selected' : ''; ?> value="type">Type</option>
                                 <option <?= $this->input->get('f') == 'receipent' ? 'selected' : ''; ?> value="receipent">Receipent</option>
                                 <option <?= $this->input->get('f') == 'repeat_frequency' ? 'selected' : ''; ?> value="repeat_frequency">Repeat Frequency</option>
                              </select>
                           </div>
                           <div class="col-sm-1 padd-left-0 ">
                              <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                                 Filter
                              </button>
                           </div>
                           <div class="col-sm-1 padd-left-0 ">
                              <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/reminder'); ?>" title="<?= cclang('reset_filter'); ?>">
                                 <i class="fa fa-undo"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="table-responsive">

                        <br>
                        <table class="table table-bordered table-striped dataTable">
                           <thead>
                              <tr class="">
                                 <th>
                                    <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                                 </th>
                                 <th data-field="title" data-sort="1" data-primary-key="0"> <?= cclang('title') ?></th>
                                 <th data-field="message" data-sort="1" data-primary-key="0"> <?= cclang('table') ?></th>
                                 <th data-field="type" data-sort="1" data-primary-key="0"> <?= cclang('type') ?></th>
                                 <th data-field="receipent" data-sort="1" data-primary-key="0"> <?= cclang('receipent') ?></th>
                                 <th data-field="repeat_frequency" data-sort="1" data-primary-key="0"> <?= cclang('repeat_frequency') ?></th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody id="tbody_reminder">
                              <?php foreach ($reminders as $reminder) : ?>
                                 <tr>
                                    <td width="5">
                                       <input type="checkbox" class="flat-red check" name="id[]" value="<?= $reminder->id; ?>">
                                    </td>

                                    <td><span class="list_group-title"><?= _ent($reminder->title); ?></span></td>
                                    <td><span class="list_group-table"><?= _ent($reminder->table); ?></span></td>
                                    <td><span class="list_group-type"><?= _ent($reminder->type); ?></span></td>
                                    <td><?= join_multi_select($reminder->receipent, 'aauth_groups', 'id', 'name'); ?></td>
                                    <td><span class="list_group-repeat_frequency"><?= _ent($reminder->repeat_frequency); ?> minutes</span></td>
                                    <td width="200">

                                       <?php is_allowed('reminder_view', function () use ($reminder) { ?>
                                          <a href="<?= site_url('administrator/reminder/view/' . $reminder->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                                          <?php }) ?>
                                          <?php is_allowed('reminder_update', function () use ($reminder) { ?>
                                             <a href="<?= site_url('administrator/reminder/edit/' . $reminder->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                                          <?php }) ?>
                                          <?php is_allowed('reminder_delete', function () use ($reminder) { ?>
                                             <a href="javascript:void(0);" data-href="<?= site_url('administrator/reminder/delete/' . $reminder->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                                          <?php }) ?>

                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                              <?php if ($reminder_counts == 0) : ?>
                                 <tr>
                                    <td colspan="100">
                                       Reminder data is not available
                                    </td>
                                 </tr>
                              <?php endif; ?>

                           </tbody>
                        </table>
                        <div class="col-md-4 pull-right">
                          <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                             <?= $pagination; ?>
                          </div>
                        </div>
                     </div>
               </div>
               <hr>

            </div>
            </form>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
</section>
<!-- /.content -->

<!-- Page script -->

<script>
   $(document).ready(function() {

      (function() {

      })()


      $('.table tbody tr').each(function() {
         var row = $(this);
         (function() {
            var title = row.find('.list_group-title');
            var message = row.find('.list_group-message');
            var type = row.find('.list_group-type');
            var datetime = row.find('.list_group-datetime');

         })()
      })

      $('.remove-data').click(function() {

         var url = $(this).attr('data-href');

         swal({
               title: "<?= cclang('are_you_sure'); ?>",
               text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
               cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
               closeOnConfirm: true,
               closeOnCancel: true
            },
            function(isConfirm) {
               if (isConfirm) {
                  document.location.href = url;
               }
            });

         return false;
      });


      $('#apply').click(function() {

         var bulk = $('#bulk');
         var serialize_bulk = $('#form_reminder').serialize();

         if (bulk.val() == 'delete') {
            swal({
                  title: "<?= cclang('are_you_sure'); ?>",
                  text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
                  cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
                  closeOnConfirm: true,
                  closeOnCancel: true
               },
               function(isConfirm) {
                  if (isConfirm) {
                     document.location.href = BASE_URL + '/administrator/reminder/delete?' + serialize_bulk;
                  }
               });

            return false;

         } else if (bulk.val() == '') {
            swal({
               title: "Upss",
               text: "<?= cclang('please_choose_bulk_action_first'); ?>",
               type: "warning",
               showCancelButton: false,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Okay!",
               closeOnConfirm: true,
               closeOnCancel: true
            });

            return false;
         }

         return false;

      }); /*end appliy click*/


      //check all
      var checkAll = $('#check_all');
      var checkboxes = $('input.check');

      checkAll.on('ifChecked ifUnchecked', function(event) {
         if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
         } else {
            checkboxes.iCheck('uncheck');
         }
      });

      checkboxes.on('ifChanged', function(event) {
         if (checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
         } else {
            checkAll.removeProp('checked');
         }
         checkAll.iCheck('update');
      });
      initSortable('reminder', $('table.dataTable'));
   }); /*end doc ready*/
</script>