<?php

if(!isset($cms_login)){
	die('brak dostepu');
}

if(isset($_GET['jezyk']) and $_GET['jezyk']!=''){
	$jezyk = filtruj($_GET['jezyk']);
	if(isset($_POST['akcja']) and $_POST['akcja']=='zapisz_jezyk_teksty'){
		mysql_query('update tlumaczenia_teksty set dodaj_nowy="'.filtruj($_POST["dodaj_nowy"]).'", udalo_sie="'.filtruj($_POST["udalo_sie"]).'", zobacz="'.filtruj($_POST["zobacz"]).'", tytul="'.filtruj($_POST["tytul"]).'", opis="'.filtruj($_POST["opis"]).'", film_youtube="'.filtruj($_POST["film_youtube"]).'", film_vimeo="'.filtruj($_POST["film_vimeo"]).'", film_dailymotion="'.filtruj($_POST["film_dailymotion"]).'", obrazek_z_dysku="'.filtruj($_POST["obrazek_z_dysku"]).'", obrazek_z_internetu="'.filtruj($_POST["obrazek_z_internetu"]).'", kategoria="'.filtruj($_POST["kategoria"]).'", tagi_po_przecinku="'.filtruj($_POST["tagi_po_przecinku"]).'", dodaj="'.filtruj($_POST["dodaj"]).'", zaznacz_lokalizacje="'.filtruj($_POST["zaznacz_lokalizacje"]).'", edytuj="'.filtruj($_POST["edytuj"]).'", zapisz="'.filtruj($_POST["zapisz"]).'", blad="'.filtruj($_POST["blad"]).'", poczekalnia="'.filtruj($_POST["poczekalnia"]).'", autor="'.filtruj($_POST["autor"]).'", data="'.filtruj($_POST["data"]).'", komentarzy="'.filtruj($_POST["komentarzy"]).'", musisz_zalogowany="'.filtruj($_POST["musisz_zalogowany"]).'", strona="'.filtruj($_POST["strona"]).'", nie_dodano="'.filtruj($_POST["nie_dodano"]).'", aktywny="'.filtruj($_POST["aktywny"]).'", zakonczony="'.filtruj($_POST["zakonczony"]).'", data_start="'.filtruj($_POST["data_start"]).'", data_koniec="'.filtruj($_POST["data_koniec"]).'", konkurs_nie_znaleziono="'.filtruj($_POST["konkurs_nie_znaleziono"]).'", konkursy="'.filtruj($_POST["konkursy"]).'", konkurs="'.filtruj($_POST["konkurs"]).'", zwyciezca="'.filtruj($_POST["zwyciezca"]).'", status="'.filtruj($_POST["status"]).'", konto="'.filtruj($_POST["konto"]).'", login="'.filtruj($_POST["login"]).'", email="'.filtruj($_POST["email"]).'", statystyki="'.filtruj($_POST["statystyki"]).'", data_rejestracji="'.filtruj($_POST["data_rejestracji"]).'", dodanych_obrazkow="'.filtruj($_POST["dodanych_obrazkow"]).'", obrazkow_na_glownej="'.filtruj($_POST["obrazkow_na_glownej"]).'", dodanych_komentarzy="'.filtruj($_POST["dodanych_komentarzy"]).'", stworzonych_obrazkow="'.filtruj($_POST["stworzonych_obrazkow"]).'", twoje_obrazki="'.filtruj($_POST["twoje_obrazki"]).'", glosow="'.filtruj($_POST["glosow"]).'", usun="'.filtruj($_POST["usun"]).'", nie_znaleziono="'.filtruj($_POST["nie_znaleziono"]).'", dane_osobowe="'.filtruj($_POST["dane_osobowe"]).'", imie="'.filtruj($_POST["imie"]).'", adres="'.filtruj($_POST["adres"]).'", miasta="'.filtruj($_POST["miasta"]).'", zmiana_hasla="'.filtruj($_POST["zmiana_hasla"]).'", stare_haslo="'.filtruj($_POST["stare_haslo"]).'", nowe_haslo="'.filtruj($_POST["nowe_haslo"]).'", powtorz_nowe_haslo="'.filtruj($_POST["powtorz_nowe_haslo"]).'", zmien_haslo="'.filtruj($_POST["zmien_haslo"]).'", zaloguj="'.filtruj($_POST["zaloguj"]).'", login_lub_email="'.filtruj($_POST["login_lub_email"]).'", haslo="'.filtruj($_POST["haslo"]).'", zaloguj_przez_fb="'.filtruj($_POST["zaloguj_przez_fb"]).'", reset_hasla="'.filtruj($_POST["reset_hasla"]).'", rejestracja="'.filtruj($_POST["rejestracja"]).'", wroc_do_serwisu="'.filtruj($_POST["wroc_do_serwisu"]).'", onas="'.filtruj($_POST["onas"]).'", menu_top="'.filtruj($_POST["menu_top"]).'", menu_dodaj="'.filtruj($_POST["menu_dodaj"]).'", menu_stworz="'.filtruj($_POST["menu_stworz"]).'", menu_poczekalnia="'.filtruj($_POST["menu_poczekalnia"]).'", menu_mapa_obiektow="'.filtruj($_POST["menu_mapa_obiektow"]).'", menu_mapa_uzytkownikow="'.filtruj($_POST["menu_mapa_uzytkownikow"]).'", menu_konkursy="'.filtruj($_POST["menu_konkursy"]).'", menu_konto="'.filtruj($_POST["menu_konto"]).'", menu_wyloguj="'.filtruj($_POST["menu_wyloguj"]).'", menu_rejestracja="'.filtruj($_POST["menu_rejestracja"]).'", menu_logowanie="'.filtruj($_POST["menu_logowanie"]).'", losowo_wybrane="'.filtruj($_POST["losowo_wybrane"]).'", stopka_opis="'.filtruj($_POST["stopka_opis"]).'", mapa_obiektow="'.filtruj($_POST["mapa_obiektow"]).'", mapa_obiektow_opis="'.filtruj($_POST["mapa_obiektow_opis"]).'", nie_dodano_lokalizacji="'.filtruj($_POST["nie_dodano_lokalizacji"]).'", mapa_uzytkownikow="'.filtruj($_POST["mapa_uzytkownikow"]).'", mapa_uzytkownikow_opis="'.filtruj($_POST["mapa_uzytkownikow_opis"]).'", na_glowna="'.filtruj($_POST["na_glowna"]).'", nie_mozna_zaladowac="'.filtruj($_POST["nie_mozna_zaladowac"]).'", komentarze="'.filtruj($_POST["komentarze"]).'", usun_komentarz="'.filtruj($_POST["usun_komentarz"]).'", nie_dodano_komentarzy="'.filtruj($_POST["nie_dodano_komentarzy"]).'", komentarz_zalogowany="'.filtruj($_POST["komentarz_zalogowany"]).'", nie_znaleziono_obrazka="'.filtruj($_POST["nie_znaleziono_obrazka"]).'", tresc_komentarza="'.filtruj($_POST["tresc_komentarza"]).'", captcha="'.filtruj($_POST["captcha"]).'", kontakt="'.filtruj($_POST["kontakt"]).'", kontakt_info="'.filtruj($_POST["kontakt_info"]).'", temat="'.filtruj($_POST["temat"]).'", wiadomosc="'.filtruj($_POST["wiadomosc"]).'", wyslij="'.filtruj($_POST["wyslij"]).'", polityka_prywatnosci="'.filtruj($_POST["polityka_prywatnosci"]).'", moderator="'.filtruj($_POST["moderator"]).'", kontakt_z_uzytkownikiem="'.filtruj($_POST["kontakt_z_uzytkownikiem"]).'", kontakt_z_uzytkownikiem_opis="'.filtruj($_POST["kontakt_z_uzytkownikiem_opis"]).'", nie_znaleziono_uzytkownika="'.filtruj($_POST["nie_znaleziono_uzytkownika"]).'", regulamin="'.filtruj($_POST["regulamin"]).'", powtorz_haslo="'.filtruj($_POST["powtorz_haslo"]).'", akceptuje="'.filtruj($_POST["akceptuje"]).'", oraz="'.filtruj($_POST["oraz"]).'", polityke_prywatnosci="'.filtruj($_POST["polityke_prywatnosci"]).'", dodatkowe_informacje="'.filtruj($_POST["dodatkowe_informacje"]).'", obrazkow_i_filmow="'.filtruj($_POST["obrazkow_i_filmow"]).'", w_poczekalni="'.filtruj($_POST["w_poczekalni"]).'", kategorii="'.filtruj($_POST["kategorii"]).'", tagow="'.filtruj($_POST["tagow"]).'", stworzonych="'.filtruj($_POST["stworzonych"]).'", uzytkownikow="'.filtruj($_POST["uzytkownikow"]).'", najlepsze="'.filtruj($_POST["najlepsze"]).'", najnowsze="'.filtruj($_POST["najnowsze"]).'", najnowsze_komentarze="'.filtruj($_POST["najnowsze_komentarze"]).'", wyszukiwarka="'.filtruj($_POST["wyszukiwarka"]).'", szukaj="'.filtruj($_POST["szukaj"]).'", wyszukiwarka_uzytkownikow="'.filtruj($_POST["wyszukiwarka_uzytkownikow"]).'", tag="'.filtruj($_POST["tag"]).'", stworz_obrazek="'.filtruj($_POST["stworz_obrazek"]).'", zapisz_obrazek="'.filtruj($_POST["zapisz_obrazek"]).'", stworz_nowy_obrazek="'.filtruj($_POST["stworz_nowy_obrazek"]).'", kolor_w_formacie="'.filtruj($_POST["kolor_w_formacie"]).'", dodaj_obrazek_z_dysku="'.filtruj($_POST["dodaj_obrazek_z_dysku"]).'", typ="'.filtruj($_POST["typ"]).'", obrazek="'.filtruj($_POST["obrazek"]).'", mem="'.filtruj($_POST["mem"]).'", kolor_tla="'.filtruj($_POST["kolor_tla"]).'", kolor_ramki="'.filtruj($_POST["kolor_ramki"]).'", podglad="'.filtruj($_POST["podglad"]).'", stworz="'.filtruj($_POST["stworz"]).'", stworzone="'.filtruj($_POST["stworzone"]).'", obrazkow="'.filtruj($_POST["obrazkow"]).'", na_glownej="'.filtruj($_POST["na_glownej"]).'", nic_nie_znaleziono="'.filtruj($_POST["nic_nie_znaleziono"]).'", mapa_strony="'.filtruj($_POST["mapa_strony"]).'", menu_onas="'.filtruj($_POST["menu_onas"]).'", menu_kategorie="'.filtruj($_POST["menu_kategorie"]).'", tagi="'.filtruj($_POST["tagi"]).'", top="'.filtruj($_POST["top"]).'", logowanie="'.filtruj($_POST["logowanie"]).'", uzytkownicy="'.filtruj($_POST["uzytkownicy"]).'", profil="'.filtruj($_POST["profil"]).'", dodano="'.filtruj($_POST["dodano"]).'", kategorie="'.filtruj($_POST["kategorie"]).'", na_pewno_usunac="'.filtruj($_POST["na_pewno_usunac"]).'", blad_typ_pliku="'.filtruj($_POST["blad_typ_pliku"]).'", blad_plik_z_dysku="'.filtruj($_POST["blad_plik_z_dysku"]).'", blad_url_nie_istnieje="'.filtruj($_POST["blad_url_nie_istnieje"]).'", blad_youtube="'.filtruj($_POST["blad_youtube"]).'", blad_vimeo="'.filtruj($_POST["blad_vimeo"]).'", blad_dailymotion="'.filtruj($_POST["blad_dailymotion"]).'", blad_inny="'.filtruj($_POST["blad_inny"]).'", blad_dodales_juz="'.filtruj($_POST["blad_dodales_juz"]).'", blad_kategoria="'.filtruj($_POST["blad_kategoria"]).'", blad_opis="'.filtruj($_POST["blad_opis"]).'", zaloguj_sie="'.filtruj($_POST["zaloguj_sie"]).'", zapisano="'.filtruj($_POST["zapisano"]).'", dane_zaktualizowane="'.filtruj($_POST["dane_zaktualizowane"]).'", blad_hasla_rozne="'.filtruj($_POST["blad_hasla_rozne"]).'", blad_stare_haslo="'.filtruj($_POST["blad_stare_haslo"]).'", blad_dlugie_haslo="'.filtruj($_POST["blad_dlugie_haslo"]).'", blad_wszystkie_pola="'.filtruj($_POST["blad_wszystkie_pola"]).'", konto_nie_aktywowane="'.filtruj($_POST["konto_nie_aktywowane"]).'", dane_nieprawidlowe="'.filtruj($_POST["dane_nieprawidlowe"]).'", potwierdz_link_aktywacyjny="'.filtruj($_POST["potwierdz_link_aktywacyjny"]).'", nowe_haslo_wyslane="'.filtruj($_POST["nowe_haslo_wyslane"]).'", blad_captcha="'.filtruj($_POST["blad_captcha"]).'", blad_dlugi_komentarz="'.filtruj($_POST["blad_dlugi_komentarz"]).'", wiadomosc_wyslana="'.filtruj($_POST["wiadomosc_wyslana"]).'", blad_login="'.filtruj($_POST["blad_login"]).'", blad_login_zajety="'.filtruj($_POST["blad_login_zajety"]).'", blad_email="'.filtruj($_POST["blad_email"]).'", blad_email_zajety="'.filtruj($_POST["blad_email_zajety"]).'", pole_obowiazkowe="'.filtruj($_POST["pole_obowiazkowe"]).'", aktywacja_info="'.filtruj($_POST["aktywacja_info"]).'", aktywacja_blad="'.filtruj($_POST["aktywacja_blad"]).'", email_nie_zarejestrowany="'.filtruj($_POST["email_nie_zarejestrowany"]).'", cookies_tekst="'.filtruj($_POST["cookies_tekst"]).'", cookies_zamknij="'.filtruj($_POST["cookies_zamknij"]).'", usunac_komentarz="'.filtruj($_POST["usunac_komentarz"]).'", mocne="'.filtruj($_POST["mocne"]).'", slabe="'.filtruj($_POST["slabe"]).'", menu_glowna="'.filtruj($_POST["menu_glowna"]).'", nastepna_strona="'.filtruj($_POST["nastepna_strona"]).'", menu_stworzone="'.filtruj($_POST["menu_stworzone"]).'", menu_uzytkownicy="'.filtruj($_POST["menu_uzytkownicy"]).'", mem_obrazek="'.filtruj($_POST['mem_obrazek']).'", blad_404="'.filtruj($_POST['blad_404']).'", komentarz_glos_tak="'.filtruj($_POST['komentarz_glos_tak']).'", komentarz_glos_nie="'.filtruj($_POST['komentarz_glos_nie']).'", komentarz_niezalogowany="'.filtruj($_POST['komentarz_niezalogowany']).'", najlepszy_komentarz="'.filtruj($_POST['najlepszy_komentarz']).'" where jezyk="'.$jezyk.'" limit 1');
		pobierz_tlumaczenia_teksty();
	}
	$q = mysql_query('select * from tlumaczenia_teksty where jezyk="'.$ustawienia['jezyk'].'" limit 1');
	while($dane = mysql_fetch_assoc($q)){$tlumaczenia_teksty_aktywny = $dane;}
	$smarty->assign("tlumaczenia_teksty_aktywny", $tlumaczenia_teksty_aktywny);
	$q = mysql_query('select * from tlumaczenia_teksty where jezyk="'.$jezyk.'" limit 1');
	while($dane = mysql_fetch_assoc($q)){$tlumaczenia_teksty = $dane;}
	if (isset($tlumaczenia_teksty)){$smarty->assign("tlumaczenia_teksty", $tlumaczenia_teksty);}
}
