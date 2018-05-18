<div class="">
    <div class="page-title">
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                <h2>Data Apotek</h2>
                    <div class="col-md-10 text-center">
                       <div style="margin-top: 4px"  id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                       </div>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="x_content">
                    <?php echo anchor(site_url('apotek/create'), '<i class="fa fa-plus"> Create</i>', 'class="btn btn-success"'); ?>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                    		    <th>Nama Apotek</th>
                    		    <th>No Hp</th>
                    		    <th>Alamat</th>
                    		    <th>No Rek</th>
                    		    <th>No Izin</th>
                    		    <th>Apoteker</th>
                    		    <th>Id Login</th>
                    		    <th width="200px">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "apotek/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },{"data": "nama"},{"data": "no_hp"},{"data": "alamat"},{"data": "no_rek"},{"data": "no_izin"},{"data": "apoteker"},{"data": "id_login"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
    </body>
</html>