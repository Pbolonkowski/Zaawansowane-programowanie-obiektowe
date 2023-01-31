# Zaawansowane-programowanie-obiektowe
Temat projektu: Aplikacja internetowa OLXv2
Technologie: PHP, HTML, CSS

Aplikacja pozwala na zakup oraz na wystawienie własnych produktów, takich jak filmy, gry czy książki. Technologie, które zostały użyte do projektu to HTML CSS i PHP. Aplikacja jest swojego rodzaju pośrednikiem w handlu pomiędzy właścicielem przedmiotów, a klientem, który będzie chciał je nabyć. Motywacją do stworzenia aplikacji był fakt, że obecnie na rynku jest niewiele stron tego typu.

Przedmiotem niniejszego projektu jest zaprojektowanie, wykonanie i wdrożenie Sklepu
internetowego FGK, w którym użytkownicy swobodnie będą mogli wystawiać przedmioty do
sprzedaży oraz kupować przedmioty innych użytkowników. Aplikacja będzie służyła do
pośredniczenia w handlu pomiędzy właścicielem przedmiotów, a klientem, który będzie
chciał je nabyć. Celem było stworzenie przejrzystego oraz intuicyjnego interfejsu, aby każdy
mógł się w nim odnaleźć.
Sprzedawca będzie w stanie wystawić swoje produkty z dokładnym opisem, natomiast
kupujący będzie miał wgląd w oferty wystawione przez sprzedawcę z możliwością
ewentualnego zakupu. Aby móc zakupić przedmiot będzie wymagana rejestracja na portalu,
natomiast wgląd będzie miał każdy nieważne czy to będzie użytkownik zalogowany lub
niezalogowany. Motywacją do stworzenia projektu jest fakt, że obecnie nie ma na rynku
wielu stron podobnych do OLX czy Allegro.
E-sklep (ES) ma zapewnić:
● możliwość przeglądania ofert użytkowników
● możliwość stworzenia własnego konta
● możliwość kupna przedmiotu
● możliwość wystawienia przedmiotu
● zapewnienie wsparcia dla kupującego i sprzedającego
● wymiany wiadomości z innymi użytkownikami
Technologie, które zostały zastosowane do realizacji projektu:
● HTML
● CSS
● PHP

Case study
1. Aktorzy
● Administrator
● Użytkownik
2. Opis czynności aktora
2.1 Administrator
● Możliwość kontaktu z użytkownikami
● Możliwość akceptacji produktów, ewentualny kontakt z użytkownikiem wystawiającym
przedmiot
2.2 Użytkownik (zalogowany)
● Możliwość dodania oferty
● Możliwość wysyłania wiadomości między użytkownikami
● Możliwość przeglądania historii zakupów
● Możliwość przeglądania historii sprzedaży
● Możliwość przeglądania aktywnych ogłoszeń
● Możliwość przeglądania ofert użytkowników
● Możliwość zakupu przedmiotu
● Możliwość kontaktu z administratorem
● Możliwość wylogowania się
2.3 Użytkownik (niezarejestrowany)
● Przeglądanie ofert na stronie
● Możliwość założenia konta
● Możliwość zalogowania się

Musimy stworzyć nową bazę o nazwie “uzytkownicy” oraz zaimportować 3 tabele z płyty.

Skrócona wersja uruchomienia projektu:
Tworzymy bazę uzytkownicy w phpmyadmin, importujemy do niej 3 tabele z płyty o nazwie
„produkty”, „uzytkownicy”, „wiadomosci”. Następnie uruchamiamy xampa, wpisujemy
https://localhost/design2/index.php. Konto administratora ma login adam, hasło qwerty
