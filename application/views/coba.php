<?php foreach ($peminjaman as $data){ ?>
                        <tr>
                          <td><?php echo $data->KODE_BUKU ?></td>
                          <td><?php echo $data->judul_buku ?></td>
                          <td><?php echo $data->TGL_PINJAM ?></td>
                          <td><?php echo $data->TGL_HARUSKEMBALI ?></td>
                          <td>
                            <?php if(date('Y-m-d')>$data->TGL_HARUSKEMBALI){
                              $sekarang= new DateTime(date('Y-m-d'));
                              $haruskem= new DateTime($data->TGL_HARUSKEMBALI);
                              $s=$sekarang->diff($haruskem)->days;
                              $denda=$s*1000;
                              echo $denda; ?>
                              <input type="hidden" class="form-control" name="id_pinjam[]" value="<?php echo $data->ID_PEMINJAMAN; ?>" >
                              <input type="hidden" class="form-control" id="denda[]" value="<?php echo $denda; ?>">

                           <?php } else { $denda=0; echo $denda;
                           ?><input type="hidden" class="form-control" name="id_pinjam[]" value="<?php echo $data->ID_PEMINJAMAN; ?>" >
                              <input type="hidden" class="form-control" name="denda[]" value="<?php echo $denda; ?>" ><?php
                           
                          } ?></td>

                          <td>
                            <div class="checkbox">
                          <label>
                            <input class="messageCheckbox" type="checkbox" value="<?php echo $data->KODE_BUKU ?>" name="kembali[]"> Dikembalikan
                          </label>
                          </div> 
                          <a href="#"><i class="fa fa-fw fa-edit">Perpanjangan</i></a>
                          </td>
                        </tr> 
                         <?php } ?>
<!-- controller -->
function pengembalian(){
    //var checkedValue = document.querySelector('.messageCheckbox:checked').value;
    //console.log(checkedValue);
    var checkedValueAr = []; 
    var idpAr = [];
    var dendaAr = [];
    //var inputElements = document.getElementsByClassName('messageCheckbox');
    var cboxes = document.getElementsByName('kembali[]');
    var idpVal = document.getElementsByName('id_pinjam[]');
    var dendaVal = document.getElementsByName('denda[]');
    var nis= document.getElementById('NIS').value;
    var len = cboxes.length;
    for(var i=0; i<len; ++i){
          if(cboxes[i].checked){
               checkedValueAr[i] = cboxes[i].value;
          }
    }

    var lenId= idpVal.length;
    for(var i=0; i<lenId; ++i){
        idpAr[i] = idpVal[i].value;  
    }

    var lenDen= dendaVal.length;
    for(var i=0; i<lenId; ++i){
        dendaAr[i] = dendaVal[i].value;  
    }

    var checkedValue= JSON.stringify(checkedValueAr);
    var idp= JSON.stringify(idpAr);
    var denda= JSON.stringify(dendaAr);

    console.log(checkedValue);
    console.log(idp);
    console.log(denda);
    console.log(nis);
    url = '<?php echo base_url().'C_petugas/checkout';?>';
 
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
              //jika berhasil
              if(this.readyState==4 && this.status == 200)
              {
                 console.log(this.responseText);
                
                if(this.responseText==0)
                {
                  //isiTableJurnal(data);
                  //kosongiTabel(table);
                  //enabledSimpanJurnal();
                  history.go(0);
                  //console.log(this.responseText);
                }
                else
                {
                  alert("Connection Error, try again");
                }
                

              }
            }
      //console.log("data="+jsonData+"&peminjaman="+jsonData2);
      xhttp.open("POST", url, true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("kembali="+checkedValue+"&id_pinjam="+idp+"&denda="+denda+"&nis="+nis);



  }







  public function checkout(){
        $this->load->model('M_pinjamKembali');
        $nis=$this->input->post('nis');
        //$data=$this->input->post();
        
        $buku=json_decode($this->input->post('kembali')); //kode buku yg dikembalikan
        $idpem=json_decode($this->input->post('id_pinjam')); //
        $denda=json_decode($this->input->post('denda'));
        //print_r($buku);
        //print_r($idpem);
        //print_r($denda);
        
        
        $this->M_pinjamKembali->buatIDkembali();
        $idkemB=$this->M_pinjamKembali->ambilIDk();
        foreach($idkemB as $idkemB){
            $idkem= $idkemB->ID_PENGEMBALIAN;
            break;
        }
        //$i=0;
        //foreach ($buku as $buku) {
            # code...
        $len=count($buku);
        for($i=0; $i<$len; $i++){
            if($buku[$i]!=null){
                $this->M_pinjamKembali->updateDetail($idkem, $buku[$i], $idpem[$i], $denda[$i]);
            }
           // $i++;
        }
//$idk,$idb, $idp,$denda
       // foreach ($buku as $j => $value) {
            # code...
        //    $this->M_pinjamKembali->;
       // }

   }