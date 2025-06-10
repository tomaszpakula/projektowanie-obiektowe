# projektowanie-obiektowe

# **Zadanie 1 Pascal**

Proszę napisać program w Pascalu, który zawiera dwie procedury, jedna
generuje listę 50 losowych liczb od 0 do 100. Druga procedura sortuje
liczbę za pomocą sortowania bąbelkowego.

✅ 3.0 Procedura do generowania 50 losowych liczb od 0 do 100 [commit](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/26ea9544de79941a88d946333e40586f9282a58f)

✅ 3.5 Procedura do sortowania liczb [commit](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/6edacb5ef2df24b012b4c9ecb31b3039b65fc7da)

✅ 4.0 Dodanie parametrów do procedury losującej określającymi zakres losowania: od, do, ile [commit](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/32f4c2d27e40e68d680ff5d9a4173df03e748832)

✅ 4.5 5 testów jednostkowych testujące procedury [commit](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/c05a2a1cc29f83ee5451438ba2e314cdbaf973f6)

✅ 5.0 Skrypt w bashu do uruchamiania aplikacji w Pascalu via docker [commit](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/0481a144e75ed01b3d12907cf6bf46e3f1fa6001)


[katalog](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/main/zadanie1)

# **Zadanie 2 Symfony**

Należy stworzyć aplikację webową na bazie frameworka Symfony na
obrazie kprzystalski/projobj-php:latest. Baza danych dowolna, sugeruję
SQLite.

✅ 3.0 Należy stworzyć jeden model z kontrolerem z produktami, zgodnie z CRUD

✅ 3.5 Należy stworzyć skrypty do testów endpointów via curl

✅ 4.0 Należy stworzyć dwa dodatkowe kontrolery wraz z modelami

✅ 4.5 Należy stworzyć widoki do wszystkich kontrolerów

✅ 5.0 Stworzenie panelu administracyjnego z mockowanym logowaniem

[katalog](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/main/zadanie2)

# **Zadanie 3** Wzorce kreacyjne - Spring Boot (Kotlin)

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

[katalog](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/main/zadanie3)

# **Zadanie 4** Wzorce strukturalne Echo (Go)
Należy stworzyć aplikację w Go na frameworku echo. Aplikacja ma mieć
jeden endpoint, minimum jedną funkcję proxy, która pobiera dane np. o
pogodzie, giełdzie, etc. (do wyboru) z zewnętrznego API. Zapytania do
endpointu można wysyłać w jako GET lub POST.

✅ 3.0 Należy stworzyć aplikację we frameworki echo w j. Go, która będzie
miała kontroler Pogody, która pozwala na pobieranie danych o pogodzie
~~(lub akcjach giełdowych)~~

✅ 3.5 Należy stworzyć model Pogoda ~~(lub Giełda)~~ wykorzystując gorm, a
dane załadować z listy przy uruchomieniu

✅ 4.0 Należy stworzyć klasę proxy, która pobierze dane z serwisu
zewnętrznego podczas zapytania do naszego kontrolera

✅ 4.5 Należy zapisać pobrane dane z zewnątrz do bazy danych

✅ 5.0 Należy rozszerzyć endpoint na więcej niż jedną lokalizację
(Pogoda) ~~, lub akcje (Giełda)~~ zwracając JSONa

[katalog](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/main/zadanie4)

# **Zadanie 5** Wzorce behawioralne
React (JavaScript/Typescript)

Należy stworzyć aplikację kliencką wykorzystując bibliotekę React.js.
Dane pomiędzy wszystkimi komponentami powinny być przesyłane za pomocą
React hooks.

✅ 3.0 W ramach projektu należy stworzyć dwa komponenty: Produkty oraz
Płatności; Płatności powinny wysyłać do aplikacji serwerowej dane, a w
Produktach powinniśmy pobierać dane o produktach z aplikacji
serwerowej

✅ 3.5 Należy dodać Koszyk wraz z widokiem; należy wykorzystać routing

✅ 4.0 Dane pomiędzy wszystkimi komponentami powinny być przesyłane za
pomocą React hooks

✅ 4.5 Należy dodać skrypt uruchamiający aplikację serwerową oraz
kliencką na dockerze via docker-compose

✅ 5.0 Należy wykorzystać axios’a oraz dodać nagłówki pod CORS

[katalog](https://github.com/tomaszpakula/e-biznes/tree/main/zadanie5)

[commit](https://github.com/tomaszpakula/e-biznes/commit/92723ac26fe01d23d0b628530ea7355dc24e7c5c)

# **Zadanie 6** Zapaszki
Sonar (JS)
W ramach zadania 6 należy zredukować błędy typu: Bugs, Security
Hotspots, Vulnerabilities oraz Code Smells. Błędy powinny być efektem
statycznej analizy kodu za pomocą rozwiązania Sonar Cloud
(https://sonarcloud.io/). Dodatkowo należy w Readme.md na każdym
repozytorium dodać badge SonarCloud do powyższych czterech typów
błędów (https://sonarcloud.io/project/information?id=). Należy
sprawdzić kod projektu 5 z kodem w React’cie.

✅ 3.0 Należy dodać eslint w hookach gita

✅ 3.5 Należy wyeliminować wszystkie bugi w kodzie w Sonarze (kod
aplikacji klienckiej)

✅ 4.0 Należy wyeliminować wszystkie zapaszki w kodzie w Sonarze (kod
aplikacji klienckiej)

✅ 4.5 Należy wyeliminować wszystkie podatności oraz błędy bezpieczeństwa
w kodzie w Sonarze (kod aplikacji klienckiej)

✅ 5.0 Zredukować duplikaty kodu do 0%

[katalog](https://github.com/tomaszpakula/e-biznes/tree/main/zadanie7)

[commit](https://github.com/tomaszpakula/e-biznes-client/commit/a52f9fdabad4e0d3b4a5de0794c38021189ba7c1)

# **Zadanie 7** Antywzorce - Vapor (Swift)

Proszę napisać prostą aplikację w Vaporze, wykorzystując Leaf jako
silnik szablonów or Fluent jako ORM. Proszę stworzyć trzy modele oraz
CRUD dla każdego z nich. Należy stworzyć model z minimum jedną
relacją. CRUD powinien mieć odzwierciedlenie w szablonach.

✅ 3.0 Należy stworzyć kontroler wraz z modele Produktów zgodny z CRUD w
ORM Fluent

✅ 3.5 Należy stworzyć szablony w Leaf

✅ 4.0 Należy stworzyć drugi model oraz kontroler Kategorii wraz z
relacją

✅ 4.5 Należy wykorzystać Redis do przechowywania danych

🔳 5.0 Wrzucić aplikację na heroku

[katalog](https://github.com/tomaszpakula/projektowanie-obiektowe/tree/main/zadanie7)

# **Zadanie 8** Testy

✅ 3.0 Należy stworzyć 30 przypadków testowych w Pythonie w WebDriverze

✅ 3.5 Należy rozszerzyć testy funkcjonalne, aby zawierały minimum 100
asercji

✅ 4.0 Należy stworzyć testy jednostkowe do wybranego wcześniejszego
projektu z minimum 100 asercjami

✅ 4.5 Należy dodać testy API, należy pokryć wszystkie endpointy z
minimum jednym scenariuszem negatywnym per endpoint

✅ 5.0 Należy uruchomić testy funkcjonalne na Browserstacku na urządzeniu
mobilnym

# **Zadanie 9** Mobile first
(Android)

Należy stworzyć prostą aplikację w Kotlinie z kilkoma widokami.
Należy:

✅ 3.0 stworzyć listę kategorii oraz produktów

🔳 3.5 dodać widok koszyka

🔳 4.0 stworzyć bazę w Realmie

🔳 4.5 dodać płatności w Stripe

🔳 5.0 dodać logowanie i rejestrację via Oauth2