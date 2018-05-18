<html>
    <head>
        <title>Master Satuan</title>
        <link href='<?php echo base_url(); ?>resources/css/style.css' rel='stylesheet' type='text/css' />
        <script>
            function jsView() {
                document.location = '<?php echo site_url(); ?>/satuan';
            }
        </script>
    </head>
    <body>
        <h1>Master Satuan (Form)</h1>
        <br />
        <input type='button' name='btn_view' value='Kembali ke View' onClick='javascript: jsView();' />
        <br /><br />
        <?php echo form_open('satuan/simpan'); ?>
        <table width='600' align='center' cellspacing='0' cellpadding='0'>
            <tr>
                <th align='right' width='20%'>ID</th>
                <td>
                    <?php echo form_error('txt_id'); ?>
                    <input type='text' name='txt_id' size='3' maxlength='3' readOnly='readOnly' class='read_only' value='<?php if(isset($data)) echo $data[0]['id']; else echo set_value('txt_id'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Satuan*</th>
                <td>
                    <?php echo form_error('txt_nama_satuan'); ?>
                    <input type='text' name='txt_nama_satuan' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0] ['nama_satuan']; else echo set_value('txt_nama_satuan'); ?>' />
                </td>
            </tr>
                <td colspan='2'>
                    <i>* - Wajib isi</i>
                    <div align='right'>
                        <input type='submit' name='cmd_simpan' value='Simpan' />
                    </div>
                </td>
            </tr>
        </table>
        </form>
    </body>
</html>