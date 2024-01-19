# eAsistent - Strokovna Naloga 
**Avtor:** Nina Lušin

## Opis naloge
**Naslov**: Kot član družine imam nakupovalni listek, ki ga polnijo vsi člani družine in s katerim lahko grem v trgovino.

**Opis**:
- Potrebujem aplikacijo "nakupovalni listek", kjer lahko različni uporabniki dodajajo, urejajo in brišejo predmete, ki jih bo moral nekdo kasneje iskati v trgovino.
- Tisti, ki gre v trgovino, mora imeti možnost odkljukati predmete, ki jih je nabavil, kot bi prečrtal na nakupovalnem listku.
- Prva verzija ima samo "en spisek", ki ga vsi urejajo. Ne omogoča več nakupovalnih listkov.
- Naj bo uporabniška izkušnja navdušila uporabnika.

**Kazalniki/QA**:
* Dva različna uporabnika lahko vpišeta predmet na isti listek.
* Vsak uporabnik vidi vse vpisano in stanje vpisanega.
* En uporabnik pobriše predmet drugega uporabnika. Posledica se vidi pri drugem uporabniku.
* En uporabnik odkljuka predmet kot "kupljen". Posledica se vidi pri drugem uporabniku.

## Navodila za namestitev projekta

 1. Najprej kloniramo repozitorij na naš računalnik.
 2. Nato odpremo "command prompt" z ukazom "cmd" ali preko menija. 
 ![enter image description here](https://i.imgur.com/9f2dv9b.png)

 3. V konzoli se pomaknemo na lokacijo projekta na računalniku:
![ ](https://i.imgur.com/FCp87kH.png)

 4. Nato namestimo odvisnosti z ukazom “composer install”.
![ ](https://i.imgur.com/qSNMtRi.png)

 5. Nato namestimo NPM pakete z ukazom “npm install”.
![ ](https://i.imgur.com/q1GlqrU.png)

 6. Nato naredimo MySQL bazo:
	 - **Ime baze:** shopping_list
	 - **Collation:** utf16_slovenian_ci
 7.  Nato naredimo na bazi novega uporabnika, ki mu dodelimo vse pravice:  
	    **Username:** laravel  
	    **Password:** eAsistent123*

8.  Nato v konzoli skopiramo “.env.example” datoteko v “.env” z ukazom “copy .env.example .env”.
![ ](https://i.imgur.com/WYmFC8G.png)

9. V .env datoteki spremenimo nastavitve za podatkovno bazo.
**DB_CONNECTION**=mysql
**DB_HOST**=127.0.0.1
**DB_PORT**=3306
**DB_DATABASE**=shopping_list
**DB_USERNAME**=laravel
**DB_PASSWORD**=eAsistent123*

10. Nato v konzoli zaženemo migracijo podatkovne baze z ukazom “php artisan migrate”.
![ ](https://i.imgur.com/veFw3ee.png)
 
 11. Nato v konzoli generiramo api ključ z “php artisan key:generate”.
![ ](https://i.imgur.com/bWJ8YJd.png)

 13. Nato v konzoli zaženemo: “npm run build”.
![ ](https://i.imgur.com/C0rvifK.png)

 14. Nato v konzoli zaženemo artisan server.
 “php artisan serve --host=localhost --port=8000”
![ ](https://i.imgur.com/zr80zmp.png)

14. V brskalniku se pomaknemo na URL: http://localhost:8000/
 ![ ](https://i.imgur.com/qzk5byc.png)

