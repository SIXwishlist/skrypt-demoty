<?php
 
if(!isset($ustawienia['base_url'])){
	die('brak dostepu');
}

function pobierz_kategorie(){
	global $smarty, $kategorie;
	$q = mysql_query('select * from kategorie where kategoria_glowna=0 order by nazwa');
	while($dane = mysql_fetch_array($q)){
		$q2 = mysql_query('select * from kategorie where kategoria_glowna='.$dane['id'].' order by nazwa');
		while($dane2 = mysql_fetch_array($q2)){
			$q3 = mysql_query('select * from kategorie where kategoria_glowna='.$dane2['id'].' order by nazwa');
			while($dane3 = mysql_fetch_array($q3)){
				$dane2['podkategorie'][]=$dane3;
			}
			$dane['podkategorie'][]=$dane2;
		}
		$kategorie[] = $dane;
	}
	if(isset($kategorie)){$smarty->assign("kategorie", $kategorie);}
}

function pobierz_boksy(){
	global $smarty;
	$q = mysql_query('select * from boksy order by pozycja');
	while($dane = mysql_fetch_array($q)){
		$dane['tresc']=htmlspecialchars_decode($dane['tresc']);
		$boksy[] = $dane;
	}
	if(Isset($boksy)){$smarty->assign("boksy", $boksy);}
}

function pobierz_miniaturki($order='rand() limit 9'){
	$q = mysql_query('select id, tytul, prosty_tytul, glowna, wybor_obrazka, url, miniaturka, glosy, data, kategoria from obrazki order by '.$order);
	while($dane = mysql_fetch_array($q)){
		$q2 = mysql_query('select nazwa, prosta_nazwa from kategorie where id="'.$dane['kategoria'].'" limit 1');
		while($dane2 = mysql_fetch_array($q2)){	
			$dane['nazwa'] = $dane2['nazwa'];
			$dane['prosta_nazwa'] = $dane2['prosta_nazwa'];
		}
		$dane['ile_komentarzy'] = mysql_num_rows(mysql_query('select 1 from komentarze where obrazek_id="'.$dane['id'].'"'));
		$wynik[] = $dane;
	}
	if(isset($wynik)){
		return($wynik);
	}else{
		return(null);
	}
}

function pobierz_losowe_obrazki(){
	global $smarty;
	$smarty->assign("losowe_obrazki", pobierz_miniaturki());
}

function pobierz_dane_do_boksow(){
	global $smarty, $ustawienia;
	$statystyki = array();
	$statystyki['obrazki'] = mysql_num_rows(mysql_query('select id from obrazki where glowna=1'));
	$statystyki['poczekalnia'] = mysql_num_rows(mysql_query('select id from obrazki where glowna=0'));
	$statystyki['komentarze'] = mysql_num_rows(mysql_query('select id from komentarze'));
	$statystyki['glosy'] = mysql_num_rows(mysql_query('select id from glosy'));
	$statystyki['kategorie'] = mysql_num_rows(mysql_query('select id from kategorie'));
	$statystyki['tagi'] = mysql_num_rows(mysql_query('select id from tagi'));
	$statystyki['uzytkownicy'] = mysql_num_rows(mysql_query('select id from uzytkownicy where aktywny=1'));
	if($ustawienia['tworzenie']==1){
		$statystyki['stworzone'] = mysql_num_rows(mysql_query('select id from stworzone'));
	}
	$smarty->assign("statystyki", $statystyki);
	
	$top = pobierz_miniaturki('obrazki.glosy desc limit 9');
	if(isset($top)){$smarty->assign("top", $top);}
	$nowe = pobierz_miniaturki('obrazki.data desc limit 9');
	if(isset($nowe)){$smarty->assign("nowe", $nowe);}

	$q = mysql_query('select komentarze.tresc, komentarze.data, uzytkownicy.login, obrazki.id, obrazki.prosty_tytul, obrazki.tytul from komentarze, uzytkownicy, obrazki where komentarze.autor_id = uzytkownicy.id and komentarze.obrazek_id = obrazki.id order by komentarze.data desc limit 9');
	while($dane = mysql_fetch_array($q)){
		$dane['tresc']=htmlspecialchars_decode($dane['tresc']);
		$nowe_komentarze[] = $dane;
	}
	if(isset($nowe_komentarze)){$smarty->assign("nowe_komentarze", $nowe_komentarze);}
	
	$ile_wszystkich_tagow=0;
	$q = mysql_query('select * from tagi order by rand() limit 30');
	while($dane = mysql_fetch_array($q)){
		$ile_tablica[] = $dane['ile'] = $ile = mysql_num_rows(mysql_query('select id from obrazki where tagi like "%-'.$dane['id'].'-%"'));
		$ile_wszystkich_tagow += $ile;
		$tagi[] = $dane;
	}
	if(isset($tagi)){
		$max = max($ile_tablica);
		for($i=0; $i < count($tagi); $i++){
			$tagi[$i]['rozmiar'] = ($tagi[$i]['ile']/$max)*20+10;
		}
		$smarty->assign("tagi", $tagi);
	}
	
	if($ustawienia['konkursy']==1){
		$q = mysql_query('select id, tytul, prosty_tytul, koniec from konkursy where start < CURRENT_DATE() and koniec > CURRENT_DATE() and wlaczony="1" order by rand() limit 1');
		while($dane = mysql_fetch_array($q)){$konkurs_boks=$dane;}
		if(isset($konkurs_boks)){$smarty->assign("konkurs_boks", $konkurs_boks);}
	}
}

function policz_strony($limit='10', $tabela, $warunek='true'){
	global $smarty;
	if (isset($_GET['page']) and is_numeric($_GET['page']) and $_GET['page']>0)  { 
		$limit_start = ($_GET['page']-1)*$limit;
		$smarty->assign("ktora_strona", $_GET['page']);
	}else{
		$limit_start = 0;
		$smarty->assign("ktora_strona", 1);
	}
	$smarty->assign("ile_stron", ceil(mysql_num_rows(mysql_query('select * from '.$tabela.' where '.$warunek.''))/$limit));
	$url_strony = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
	if (strpos($url_strony,'&page') !== false) {
		$url_strony = substr($url_strony,0,strpos($url_strony,"&page"));
	}elseif (strpos($url_strony,'?page') !== false) {
		$url_strony = substr($url_strony,0,strpos($url_strony,"?page"));
	}
	$smarty->assign("url_strony", $url_strony);
	$smarty->assign("iteration", $limit_start);
	return $limit_start;
}

