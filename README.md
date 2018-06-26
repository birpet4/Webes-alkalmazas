# Ügyfél nyilvántartás
## Feladat
Egy telekommunikációs cégnél szükség lenne egy, az ügyfeleiket és előfizetéseiket kezelő felületre. A rendszer tárolja az ügyfeleket (vezetéknév, keresztnév, egyedi ügyfélazonosító, számlázási cím, születési idő), illetve az előfizetéseiket (típus, tarifacsomag, ár, kezdő és lejárati dátum). Egy ügyfélnek több előfizetése is lehet, de egy előfizetéshez csak egy ügyfél tartozhat.
Az előfizetésekhez meghatározott tarfiacsomagok tartoznak, típus szerint (mobil, internet, telefon), meghatározott árakkal.
## Az alkalmazás felépítése, funkció
  * **Főoldal:** Nyitóoldal, statikus HTML oldal, amelyről a különböző funkciók érhetőek el linkek segítségével (ügyfél keresése, új ügyfél hozzáadása).

  * **Új ügyfél hozzáadása:** Ezen az oldalon lehetőség van új ügyfél hozzáadásához. Az ügyfél minden adatát megadva a rendszer elmenti az ügyfelet az adatbázisba.

  * **Keresés:** Kereső oldal, ahol ügyfél név vagy ügyfél azonosító alapján lehet keresni az előfizetők között. Az egyes találatok mellett megjelennek az ügyfél előfizetései, illetve új előfizetést adhatunk hozzá, vagy éppen módosíthatjuk az ügyfél adatait.

  * **Új előfizetés hozzáadása:** Az előző oldali linket követve hozzá tudjuk adni az ügyfélhez a kívánt előfizetést. Itt megadhatjuk az előfizetés paramétereit is.

  * **Ügyfél adatainak módosítása:** Szintén a keresés oldalról jutunk el ide. Ezen az oldalon módosíthatjuk a már létező ügyfél adatait, majd vissza tudjuk menteni az adatbázisba.

## Adatbázis séma
Az adatbázisban az ügyfelek és az előfizetések adatait tároljuk.
* **Ügyfél:** azonosító, vezetéknév, keresztnév, ügyfél azonosító, számlázási cím (irányítószám, város, utcaházszám), születési idő
* **Előfizetés:** azonosító, típus, tarifacsomag, ár, mettől, meddig
* Kapcsolótábla tárolja, hogy az egyes ügyfelekhez melyik előfizetések tartoznak
