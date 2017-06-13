<?php


class takmili_model extends Model
{
    function __construct()
    {
        parent::__construct();
    }


    function sabt_takmili(){

        $amlak = new amlak();


        $error = "";
        $ok = "true";
        if (isset($_POST['noe_melk'])){

            $id = $_SESSION['id'];
            $sql = "select * from `add_melk` where `id` =?";
            $data = array($id);
            $res = $amlak->select($sql,$data);
            $res = $res[0];
            $id_melk = $res['id'];


            //update etelaat avaliye
            $noe_melk = $_POST['noe_melk'];
            $masahat = $_POST['masahat'];
            $ostan = $_POST['ostan_tak'];
            $shahr = $_POST['shahr'];
            $mantaghe = $_POST['mantaghe'];
            $address = $_POST['address'];
            $tedadkhab = $_POST['tedad_khab'];


            $sql_update = "update `add_melk` SET `noe_melk` =?, `masahat`=?, `ostan`=?, `shahr`=?, `mantaghe` = ?, `edame_address` = ?, `tedad_khab`=? where `id`=".$id_melk;
            $data_update = array($noe_melk,$masahat,$ostan,$shahr,$mantaghe,$address,$tedadkhab);
            $res_update = $amlak->Idu($sql_update,$data_update);
            if($res_update){
                $error .= "آپدیت انجام شد"."<br>";
                $ok = "true";
            }else{
                $error .= "خطا در آپدیت"."<br>";
                $ok = "false";
            }




          //zaruri
            if ($_POST['kharid_rahn'] == 1){

                $id_melk = $res['id'];
                $kharid_rahn = $_POST['kharid_rahn'];
                $emkane_moaveze = $_POST['emkane_moaveze'];
                $marhale_sakht = $_POST['marhale_sakht'];
                $zamane_tahvil = $_POST['zamane_tahvil'];
                $pishpar_dakht = $_POST['pishpar_dakht'];
                $mablagh_vam = $_POST['mablagh_vam'];
                $tedad_aghsat_pardakht = $_POST['tedad_aghsat_pardakht'];
                $tedad_aghsat_monde = $_POST['tedad_aghsat_monde'];
                $noe_vam = $_POST['noe_vam'];
                $sql_zaruri = "INSERT INTO `etelaat_zaruri` ( `id_melk`, `noe_moamele` , `emkane_moaveze` ,`marhale_sakht` , `zamane_tahvil` , `pishpar_dakht` , `mablagh_vam` , `tedad_aghsat_pardakht` , `tedad_aghsat_monde` , `noe_vam` ) VALUES ( ?,?, ?, ?, ?, ?, ?, ?, ?, ?) ";
                $data_zaruri = array($id_melk,$kharid_rahn,$emkane_moaveze,$marhale_sakht,$zamane_tahvil,$pishpar_dakht,$mablagh_vam,$tedad_aghsat_pardakht,$tedad_aghsat_monde,$noe_vam);

                $res_zaruri = $amlak->Idu($sql_zaruri,$data_zaruri);

                if($res_zaruri == 1)
                {
                    $error .= "ملک ثبت شد"."<br>";
                    $ok = "true";
                }
                else
                {
                    $error .= "خطا در ثبت ملک"."<br>";
                    $ok = "false";
                }

            }else{

                $rahn = $_POST['rahn'];
                $ejare = $_POST['ejare'];
                $sql_rent = "update `add_melk` SET `ejare` =?, `rahn`=? where `id`=".$id_melk;
                $data_rent = array($rahn,$ejare);
                $res_rent = $amlak->Idu($sql_rent,$data_rent);
                if($res_rent){
                    $error .= "رنت آپدیت شد"."<br>";
                    $ok = "true";
                }else{
                    $error .= "خطا درآپدیت رنت"."<br>";
                    $ok = "true";
                }
            }//end zaruri





           if (isset($_POST['tahviye'])){
               $tahviye = $_POST['tahviye'];
               $tahviye = json_encode($tahviye);
           }else{
               $tahviye = json_encode(array());
           }


            if (isset($_POST['emkanat'])){
                $emkanat = $_POST['emkanat'];
                $emkanat = json_encode($emkanat);
            }else{
                $emkanat = json_encode(array());
            }

            if (isset($_POST['mogheiyat'])){
                $mogheiyat = $_POST['mogheiyat'];
                $mogheiyat = json_encode($mogheiyat);
            }else{
                $mogheiyat = json_encode(array());
            }

            if (isset($_POST['service'])){
                $service = $_POST['service'];
                $service = json_encode($service);
            }else{
                $service = json_encode(array());
            }



                $id_melk = $id_melk = $res['id'];
                $tabaghe_melk = $_POST['tabaghe_melk'];
                $tedad_vahed = $_POST['tedad_vahed'];
                $kaf = $_POST['kaf'];
                $nama = $_POST['nama'];
                $sal_sakht = $_POST['sal_sakht'];
                $tedad_tabaghat = $_POST['tedad_tabaghat'];
                $sanad = $_POST['sanad'];
                $service_wc = $service;
                $mogheiyat_melk = $mogheiyat;
                $emkanat_list = $emkanat;
                $tahviye_list = $tahviye;
                $tedad_parking = $_POST['tedad_parking'];
                $tedad_khat = $_POST['tedad_khat'];
                $mogheiyat_tozih = $_POST['mogheiyat_tozih'];
                $tozihat_takmili = $_POST['tozihat_takmili'];

                $sql_takmili = "INSERT INTO `etelaat_takmili` ( `id_melk` , `tabaghe_melk` , `tedad_vahed` , `kaf` , `nama` , `sal_sakht` , `tedad_tabaghat` , `sanad` , `service_wc` , `mogheiyat_melk` , `emkanat` , `tahviye` , `tedad_parking` , `tedad_khat`, `mogheiyat_tozih`, `tozihat_takmili` ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,? ,? )";

                $data_takmili = array($id_melk, $tabaghe_melk, $tedad_vahed, $kaf, $nama, $sal_sakht, $tedad_tabaghat, $sanad, $service_wc, $mogheiyat_melk, $emkanat_list, $tahviye_list, $tedad_parking, $tedad_khat, $mogheiyat_tozih, $tozihat_takmili);

                $res_takmili = $amlak->Idu($sql_takmili, $data_takmili);
                if ($res_takmili == 1) {
                    $error .= "اطلاعات تکیمیل ثبت شد" . "<br>";
                    $ok = "true";
                } else {
                    $error .= "خطا در ثبت تکیمیلی" . "<br>";
                    $ok = "false";
                }

            //end takmili









        }else{
            echo "nist";
        }


        echo '{"ok":"'.$ok.'","message":"'.$error.'"}';
        exit;
    }//sabt_takmili

}