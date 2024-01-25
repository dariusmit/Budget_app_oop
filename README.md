Pabaigus šio PHP kurso https://youtu.be/sVbEyFZKgqk?list=PLr3d3QYzkw2xabQRUpcZ_IBk9W50M9pe- antrąją dalį atlikau praktinę objektinio PHP programavimo užduotį.

Užduotis šiame video:
https://youtu.be/D1EshhwNt48?list=PLr3d3QYzkw2xabQRUpcZ_IBk9W50M9pe-

Programėlės aprašymas:
Programėlė turi suteikti galimybę įkelti transakcijų failą ar failus .csv formatu, pagal pateiktą šabloną CSV samples aplanke, paimti duomenis iš šio failo ar failų, paskaičiuoti pajamas, išlaidas ir atvaizduoti kartu su failų turiniu lentelės forma naršyklėje. Galiausiai
išsaugoti transakcijų failų duomenis duomenų bazėje.

Šiai užduočiai atlikti pabandžiau sukurti paprastą MVC dizaino principą atitinkančią failų struktūrą, panaudojau Composer įrankį automatiniam klasių importavimui, DotEnv biblioteką duomenų bazės prisijungimo duomenims saugoti,
htacess failus ( nukreipti visas HTTP užklausas į index.php failą ir apsaugoti public aplanką slaptažodžiu). Prisijungi prie duomenų bazės panaudojau PDO biblioteką.

Pradžioje užduotį atlikau asmeniniame virtualiame serveryje panaudojus XAMPP įrankį. Galutinį kodą pritaikiau realiam serveriui ir patalpinau čia:
http://dariusmolotokas.lt/budget/public/
