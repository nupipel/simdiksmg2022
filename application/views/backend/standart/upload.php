<style type="text/css">
    .widget-user-header {
        padding-left: 20px !important;
    }
</style>

<section class="content-header">
    <?= isset($breadcrumb) ? $breadcrumb : '' ?>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Upload Data Siswa/ Peserta Didik</b></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <?php if (!empty($this->session->flashdata('status')) || !empty($this->session->flashdata('error'))) {

                        if ($this->session->flashdata('error')) { ?>
                            <script>
                                toastr["error"]("Error, Terjadi kesalahan upload file")
                            </script>
                            <div class="alert alert-danger" role="alert"> <?= $this->session->flashdata('error'); ?></div>
                        <?php } else { ?>
                            <script>
                                toastr["success"]("File Berhasil diupload")
                            </script>
                            <div class="alert alert-info" role="alert"> <?= $this->session->flashdata('status'); ?></div>
                    <?php }
                    } ?>
                    <form action="<?= base_url('administrator/Import/import_pd'); ?>" method="post" enctype="multipart/form-data" name="form_upload_pd" id="form_upload_pd">
                        <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" id="idsekolah" name="idsekolah" value="<?= $this->session->userdata('username') ?>" readonly>
                        <div class="form-group">
                            <label>Tahun ajaran</label>
                            <select style="width:300px" class="form-control select2 required" id="tahun_ajaran" name="tahun_ajaran" required>
                                <option value="">- Pilih Tahun -</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pilih File Excel</label>
                            <input type="file" id='fileExcel' name="fileExcel" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                        </div>
                        <div>
                            <button id='import' name='import' class='btn btn-success' type="submit">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Import
                            </button>&nbsp;&nbsp;
                            <a href="javascript:void(0);" id='hapus' class="btn btn-danger remove-data" data-toggle="tooltip" data-placement="top" title="<?= cclang('remove_button'); ?>"><i class="fa fa-close"></i> Hapus Data</a>

                            <span class="loading loading-hide">
                                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
                                <i><?= 'Harap Tunggu sedang proses'; ?></i>
                            </span>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="box">
                    <div class="box-body">
                        <table id="dataTablePd" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>NIPD</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat lahir</th>
                                    <th>NIK</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>NIPD</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat lahir</th>
                                    <th>NIK</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    <th></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>


<script>
    const csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
    var idsekolah = $("#idsekolah").val();
    // console.log(id);

    $('#dataTablePd').DataTable({
        processing: true,
        serverSide: true,
        searchable: true,
        ajax: {
            url: '<?= site_url() ?>administrator/import/dataTablePd',
            type: 'POST',
            data: {
                id: idsekolah,
                [csrfName]: csrfHash
            },
        },
    });

    $.ajax({
        url: "<?= site_url() ?>administrator/import/cekDatatablePd",
        type: "POST",
        data: {
            id: idsekolah,
            [csrfName]: csrfHash,
        }
    }).done(function(res) {
        var jumlahData = res;
        if (jumlahData == 0) {
            //alert();
            $('.remove-data').addClass('disabled');
        } else {
            $('.remove-data').removeClass('disabled');
            document.getElementById('import').disabled = true;
            document.getElementById('fileExcel').disabled = true;
            document.getElementById('tahun_ajaran').disabled = true;


        }
        // console.log(res);
    });
</script>

<script>
    function deletePD() {
        const csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
            csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
        var idsekolah = $("#idsekolah").val();
        // console.log(idsekolah);
        swal({
                title: "<?= cclang('are_you_sure'); ?>",
                text: "Proses ini akan menghapus seluruh data yang telah anda import/ upload. Silakan upload ulang data anda apabila ada perbaikan",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#D30000",
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        dataType: 'json',
                        type: 'POST',
                        url: '<?= base_url('administrator/import/deleteDataPD') ?>',
                        data: {
                            id: idsekolah,
                            [csrfName]: csrfHash,
                        },
                        beforeSend: function() {
                            $('.loading').show();
                        },
                    }).success(function(res) {
                        var data = res;
                        if (data = 'del') {
                            $('.loading').hide();
                            location.reload();
                        }
                        // console.log(data);
                        // alert();
                    });
                } else {
                    location.reload();
                }
            });
    }
</script>

<script>
    $('.remove-data').click(function() {
        const csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
            csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
        var idsekolah = $("#idsekolah").val();
        var jenisptk = $("#jenis_ptk").val();

        swal({
                title: "<?= cclang('are_you_sure'); ?>",
                text: "Proses ini akan menghapus seluruh data yang telah anda import/ upload. Silakan upload ulang data anda apabila ada perbaikan",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Hapus",
                cancelButtonText: "Batal",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        dataType: 'json',
                        type: 'POST',
                        url: '<?= base_url('administrator/import/deleteDataPD') ?>',
                        data: {
                            id: idsekolah,
                            [csrfName]: csrfHash,
                        },
                        beforeSend: function() {
                            $('.loading').show();
                        },
                        complete: function() {
                            $('.loading').show();
                            location.reload();
                        }
                    });
                }
            });

        return false;
    });
</script>

<script>
    $("#form_upload_pd").on("submit", function() {
        $('.loading').show();
    });
</script>