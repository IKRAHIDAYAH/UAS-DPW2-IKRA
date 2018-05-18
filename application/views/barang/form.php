<html>
    <head>
        <title>Master Barang</title>
        <link href='<?php echo base_url(); ?>resources/css/style.css' rel='stylesheet' type='text/css' />
        <script>
            function jsView() {
                document.location = '<?php echo site_url(); ?>/barang';
            }

            function hanyaAngka(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }
        </script>
    </head>
    <body>
        <h1>Master Barang (Form)</h1>
        <br />
        <input type='button' name='btn_view' value='Kembali ke View' onClick='javascript: jsView();' />
        <br /><br />
        <?php echo form_open('barang/simpan'); ?>
        <table width='600' align='center' cellspacing='0' cellpadding='0'>
            <tr>
                <th align='right' width='20%'>Kode<br/><small><i>(auto)</i></small></th>
                <td>
                    <?php echo form_error('txt_id'); ?>
                    <input type='text' name='txt_id' size='3' maxlength='3' readOnly='readOnly' class='read_only' value='<?php if(isset($data)) echo $data[0]['id']; else echo set_value('txt_id'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Satuan*</th>
                <td>
                    <?php echo form_error('cmb_satuan'); ?>
                    <select name='cmb_satuan'>
                    <?php 
                        if(isset($data))                            {
                            foreach ( $satuan_combo as $rows ) { 
                                if($rows['id'] == $data[0]['satuan_id']){
                                    echo '<option value="'.$rows['id'].'" selected>'. $rows['nama_satuan'].'</option>'; 
                                }else{
                                    echo '<option value="'.$rows['id'].'">'. $rows['nama_satuan'].'</option>'; 
                                }                                    
                            } 
                        }else{
                            foreach ( $satuan_combo as $rows ) { 
                                echo '<option value="'.$rows['id'].'">'. $rows['nama_satuan'].'</option>'; 
                            } 
                        }                            
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th align='right'>Nama Barang*</th>
                <td>
                    <?php echo form_error('txt_nama_barang'); ?>
                    <input type='text' name='txt_nama_barang' size='60' maxlength='200' value='<?php if(isset($data)) echo $data[0]['nama_barang']; else echo set_value('txt_nama_barang'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Harga Jual</th>
                <td>
                    <?php echo form_error('txt_harga_jual'); ?>
                    <input onkeypress="return hanyaAngka(event)" type='text' name='txt_harga_jual' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['harga_jual']; else echo set_value('txt_harga_jual'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Harga Beli</th>
                <td>
                    <?php echo form_error('txt_harga_beli'); ?>
                    <input onkeypress="return hanyaAngka(event)" type='text' name='txt_harga_beli' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['harga_beli']; else echo set_value('txt_harga_beli'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Stok</th>
                <td>
                    <?php echo form_error('txt_stok'); ?>
                    <input onkeypress="return hanyaAngka(event)" type='text' name='txt_stok' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['stok']; else echo set_value('txt_stok'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Merek</th>
                <td>
                    <?php echo form_error('txt_merek'); ?>
                    <input type='text' name='txt_merek' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['merek']; else echo set_value('txt_merek'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Tipe </th>
                <td>
                    <?php echo form_error('txt_tipe'); ?>
                    <input type='text' name='txt_tipe' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['tipe']; else echo set_value('txt_tipe'); ?>' />
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <i>* - Wajib isi</i>
                    <div align='right'>
                    <input type='submit' name='cmd_simpan' value='Simpan'/>
                    </div>
                </td>
            </tr>
        </table>
        </form>
    </body>
</html>