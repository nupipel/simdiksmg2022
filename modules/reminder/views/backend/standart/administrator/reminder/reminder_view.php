
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+e', function assets() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_back').trigger('click');
       return false;
   });
    
}


jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Reminder      <small><?= cclang('detail', ['Reminder']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/reminder'); ?>">Reminder</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
     
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">

               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                    
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Reminder</h3>
                     <h5 class="widget-user-desc">Detail Reminder</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_reminder" id="form_reminder" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($reminder->id); ?></span>
                        </div>
                    </div>
                                        
                  <h3>Reminder</h3>
                  <section>
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Title </label>

                        <div class="col-sm-8">
                        <span class="detail_group-title"><?= _ent($reminder->title); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Message </label>

                        <div class="col-sm-8">
                        <span class="detail_group-message"><?= _ent($reminder->message); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Type </label>

                        <div class="col-sm-8">
                        <span class="detail_group-type"><?= _ent($reminder->type); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Data </label>

                        <div class="col-sm-8">
                        <span class="detail_group-data"><?= _ent($reminder->data); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Receipent </label>

                        <div class="col-sm-8">
                          <?= join_multi_select($reminder->receipent, 'aauth_groups', 'id', 'name'); ?>
                        </div>
                    </div>
                                        </section>
                  <h3>Conditions</h3>
                  <section>
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Repeat Frequency </label>

                        <div class="col-sm-8">
                        <span class="detail_group-repeat_frequency"><?= _ent($reminder->repeat_frequency); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                                               </section>
                        <div class="message"></div>
                          
                    <div class="view-nav">
                        <?php is_allowed('reminder_update', function() use ($reminder){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit reminder (Ctrl+e)" href="<?= site_url('administrator/reminder/edit/'.$reminder->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Reminder']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/reminder/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Reminder']); ?></a>
                     </div>
                    
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>
</section>
<!-- /.content -->

<script>
$(document).ready(function(){
   (function(){
        var title = $('.detail_group-title');
        var message = $('.detail_group-message');
        var type = $('.detail_group-type');
        var datetime = $('.detail_group-datetime');
    })()
      
   $('.container-button-bottom').hide();
   $('.form-step').steps({
      headerTag: 'h3',
      bodyTag: 'section',
      autoFocus: true,
      enableAllSteps : true,
      onFinishing : function(){
        $('.btn_save_back').trigger('click')
      },
      labels : {
        finish : 'save'
      },
      enableFinishButton : false
  });
  });
</script>