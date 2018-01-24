<?php
ini_set('display_errors', '1');
include('../../model/connect.php');
include('../../model/function.php');

$title="Datorii ";

include('../../views/_Top.php');
include('../../controller/verif_ses.php');

if(isset($_SESSION['user']))
{
	$selectat="Datorii";
	include('../../views/_nav_bar.php');
?>
<ul>
    <li>- note pe categorii / sugestii
        <ul>
            <li>-studiu api</li>
            <li>-implementare</li>
        </ul>
    </li>
    <li>- daca sunt infectate sau nu cu malware
        <ul>
            <li>-studiu api</li>
            <li>-implementare</li>
        </ul>
    </li>
    <li>- viteza de incarcare
        <ul>
            <li>- am observat errori in cazul in care sta mai mult sa analizeze siteul.</li>
            <li>- graficile trebuiesc chemate separat pe fiecare categorie in parte sa nu se ingreuneze incarcarea paginii</li>
            <li>- rezolvat problema aparitiei timpului pe grafic(daca se rezolva pct-ul anterior se rezolva si pct-ul asta)</li>
        </ul>
    </li>
    <li>- monitorizare zilnica
        <ul>
            <li>- trebuie facut un cronjob ce incarca automat in db.</li>
        </ul>
    </li>
    <li>- trimitere mail catre client
        <ul>
            <li>- creere cont mail cu SMTP.</li>
            <li>- implementare PHPMailer (eu l-am mai folosit si pare k)</li>
            <li>- Creere pagina pt mesaje</li>
        </ul>
    </li>
    <li>- descarcare excel
        <ul>
            <li>- implementare PHPExcel</li>
        </ul>
    </li>
    <li>- recuperare parola</li>
    <li>- comentarii cod</li>
</ul>
<?php
}else include('../../views/_no_acces.php');
include('../../views/_footer.php');
include('../../views/_Bottom.php');
?>