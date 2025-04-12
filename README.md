# projektowanie-obiektowe

**zadanie 1 Pascal**

Proszę napisać program w Pascalu, który zawiera dwie procedury, jedna
generuje listę 50 losowych liczb od 0 do 100. Druga procedura sortuje
liczbę za pomocą sortowania bąbelkowego.

✅ 3.0 Procedura do generowania 50 losowych liczb od 0 do 100 [commit](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/26ea9544de79941a88d946333e40586f9282a58f)

✅ 3.5 Procedura do sortowania liczb [commit](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/6edacb5ef2df24b012b4c9ecb31b3039b65fc7da)

✅ 4.0 Dodanie parametrów do procedury losującej określającymi zakres losowania: od, do, ile [commit](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/32f4c2d27e40e68d680ff5d9a4173df03e748832)

✅ 4.5 5 testów jednostkowych testujące procedury [commit](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/c05a2a1cc29f83ee5451438ba2e314cdbaf973f6)

✅ 5.0 Skrypt w bashu do uruchamiania aplikacji w Pascalu via docker [commit](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/0481a144e75ed01b3d12907cf6bf46e3f1fa6001)


[katalog](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/main/zadanie1)

**zadanie 2 Symfony**

Należy stworzyć aplikację webową na bazie frameworka Symfony na
obrazie kprzystalski/projobj-php:latest. Baza danych dowolna, sugeruję
SQLite.

✅ 3.0 Należy stworzyć jeden model z kontrolerem z produktami, zgodnie z CRUD

✅ 3.5 Należy stworzyć skrypty do testów endpointów via curl

✅ 4.0 Należy stworzyć dwa dodatkowe kontrolery wraz z modelami

✅ 4.5 Należy stworzyć widoki do wszystkich kontrolerów

🔲 5.0 Stworzenie panelu administracyjnego z mockowanym logowaniem

**Zadanie 3** Wzorce kreacyjne - Spring Boot (Kotlin)

Proszę stworzyć prosty serwis do autoryzacji, który zasymuluje
autoryzację użytkownika za pomocą przesłanej nazwy użytkownika oraz
hasła. Serwis powinien zostać wstrzyknięty do kontrolera za pomocą
anotacji @Autowired. Aplikacja ma oczywiście zawierać jeden kontroler
i powinna zostać napisana w języku Kotlin. Oparta powinna zostać na
frameworku Spring Boot, podobnie jak na zajęciach. Serwis do
autoryzacji powinien być singletonem.

✅ 3.0 Należy stworzyć jeden kontroler wraz z danymi wyświetlanymi z
listy na endpoint’cie w formacie JSON - Kotlin + Spring Boot

✅ 3.5 Należy stworzyć klasę do autoryzacji (mock) jako Singleton w
formie 

✅ 4.0 Należy obsłużyć dane autoryzacji przekazywane przez użytkownika

✅ 4.5 Należy wstrzyknąć singleton do głównej klasy via @Autowired

✅ 5.0 Obok wersji Eager do wyboru powinna być wersja Singletona w wersji
lazy

**Zadanie 4** Wzorce strukturalne Echo (Go)
Należy stworzyć aplikację w Go na frameworku echo. Aplikacja ma mieć
jeden endpoint, minimum jedną funkcję proxy, która pobiera dane np. o
pogodzie, giełdzie, etc. (do wyboru) z zewnętrznego API. Zapytania do
endpointu można wysyłać w jako GET lub POST.

🔲 3.0 Należy stworzyć aplikację we frameworki echo w j. Go, która będzie
miała kontroler Pogody, która pozwala na pobieranie danych o pogodzie
(lub akcjach giełdowych)

🔲 3.5 Należy stworzyć model Pogoda (lub Giełda) wykorzystując gorm, a
dane załadować z listy przy uruchomieniu

🔲 4.0 Należy stworzyć klasę proxy, która pobierze dane z serwisu
zewnętrznego podczas zapytania do naszego kontrolera

🔲 4.5 Należy zapisać pobrane dane z zewnątrz do bazy danych

🔲 5.0 Należy rozszerzyć endpoint na więcej niż jedną lokalizację
(Pogoda), lub akcje (Giełda) zwracając JSONa
