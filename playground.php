<?php
interface MotorInterface {
    public function getHubraum(): string;
    public function getTyp(): string;
}


class DieselMotor implements MotorInterface {
    public function getHubraum(): string { return "2.0L"; }
    public function getTyp(): string { return "DIESEL"; }
}

class BenzinMotor implements MotorInterface {
    public function getHubraum(): string { return "3.0L"; }
    public function getTyp(): string { return "BENZIN"; }
}

class ElektroMotor implements MotorInterface {
    public function getHubraum(): string { return "Nicht vorhanden"; }
    public function getTyp(): string { return "ELEKTRO"; }
}

class Auto {
    private string $marke;
    private string $farbe;
    private MotorInterface $motor;
    private string $felgenMaterial;
    private string $karosserie;

    // Fest definierte Eigenschaften laut Anforderung
    private int $anzahlRaeder = 4;
    private string $felgenGroesse = '19"';
    private string $felgenFarbe = 'Schwarz';

    // Constructor zum Bauen des Auto-Objekts mit den Formulardaten
    public function __construct(string $marke, string $farbe, MotorInterface $motor, string $felgenMaterial, string $karosserie) {
        $this->marke = $marke;
        $this->farbe = $farbe;
        $this->motor = $motor;
        $this->felgenMaterial = $felgenMaterial;
        $this->karosserie = $karosserie;
    }

    public function getMarke(): string { return $this->marke; }
    public function getFarbe(): string { return $this->farbe; }
    public function getMotorTyp(): string { return $this->motor->getTyp(); }
    public function getMotorHubraum(): string { return $this->motor->getHubraum(); }
    public function getFelgenMaterial(): string { return $this->felgenMaterial; }
    public function getKarosserie(): string { return $this->karosserie; }
    public function getAnzahlRaeder(): int { return $this->anzahlRaeder; }
    public function getFelgenGroesse(): string { return $this->felgenGroesse; }
    public function getFelgenFarbe(): string { return $this->felgenFarbe; }
}

$bestellungAbgeschlossen = false;
$meinAuto = null;

// Prüfung, ob das Formular abgesendet wurde (Backend-Aufruf simuliert)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Nutzung der superglobalen Variable $_POST zum Auslesen der Daten
    $marke = $_POST['marke'] ?? 'Unbekannt';
    $farbe = $_POST['farbe'] ?? '#ffffff';
    $motorWahl = $_POST['motor'] ?? 'BENZIN';
    $felgen = $_POST['felgen'] ?? 'Aluminium';
    $karosserie = $_POST['karosserie'] ?? 'Limousine';

    // Interface-Logik: Das richtige Motor-Objekt instanziieren
    $motorObjekt = null;
    switch ($motorWahl) {
        case 'DIESEL':
            $motorObjekt = new DieselMotor();
            break;
        case 'ELEKTRO':
            $motorObjekt = new ElektroMotor();
            break;
        case 'BENZIN':
        default:
            $motorObjekt = new BenzinMotor();
            break;
    }

    // Das Auto-Objekt über den Konstruktor bauen
    $meinAuto = new Auto($marke, $farbe, $motorObjekt, $felgen, $karosserie);
    $bestellungAbgeschlossen = true;
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuyMyCar Fahrzeugmanufaktur</title>
    <!-- Nutzung von Tailwind CSS für ein modernes, responsives Design -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 font-sans text-slate-800 min-h-screen flex items-center justify-center p-4">

<div class="max-w-3xl w-full bg-white rounded-xl shadow-lg overflow-hidden">

    <!-- Header -->
    <div class="bg-slate-900 text-white p-6 text-center">
        <h1 class="text-3xl font-bold tracking-wider">BuyMyCar</h1>
        <p class="text-slate-400 text-sm mt-1">Exklusive Fahrzeugmanufaktur</p>
    </div>

    <div class="p-8">

        <?php if (!$bestellungAbgeschlossen): ?>

            <h2 class="text-2xl font-semibold mb-6 text-center">Konfigurieren Sie Ihr Fahrzeug</h2>

            <form action="" method="POST" class="space-y-6">

                <!-- Fahrzeugtyp (Marke) -->
                <div>
                    <label for="marke" class="block text-sm font-medium text-slate-700 mb-2">Fahrzeugtyp (Marke)</label>
                    <select id="marke" name="marke" required class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="" disabled selected>Bitte wählen...</option>
                        <option value="VOLVO">VOLVO</option>
                        <option value="SEAT">SEAT</option>
                        <option value="BMW">BMW</option>
                        <option value="SKODA">SKODA</option>
                        <option value="MERCEDES">MERCEDES</option>
                        <option value="PORSCHE">PORSCHE</option>
                    </select>
                </div>

                <!-- Karosserie -->
                <div>
                    <label for="karosserie" class="block text-sm font-medium text-slate-700 mb-2">Karosserieform</label>
                    <select id="karosserie" name="karosserie" required class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="Limousine">Limousine</option>
                        <option value="Coupe">Coupé</option>
                        <option value="Kombi">Kombi</option>
                    </select>
                </div>

                <!-- Farbe -->
                <div>
                    <label for="farbe" class="block text-sm font-medium text-slate-700 mb-2">Fahrzeugfarbe</label>
                    <div class="flex items-center space-x-3">
                        <input type="color" id="farbe" name="farbe" value="#000000" class="h-10 w-20 rounded cursor-pointer border-slate-300">
                        <span class="text-sm text-slate-500">Klicken, um Farbe zu wählen</span>
                    </div>
                </div>

                <!-- Motor -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Motorentyp</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <label class="flex items-center p-3 border border-slate-200 rounded-lg cursor-pointer hover:bg-slate-50">
                            <input type="radio" name="motor" value="DIESEL" required class="text-blue-600 focus:ring-blue-500">
                            <span class="ml-3">DIESEL (2.0L)</span>
                        </label>
                        <label class="flex items-center p-3 border border-slate-200 rounded-lg cursor-pointer hover:bg-slate-50">
                            <input type="radio" name="motor" value="BENZIN" class="text-blue-600 focus:ring-blue-500">
                            <span class="ml-3">BENZIN (3.0L)</span>
                        </label>
                        <label class="flex items-center p-3 border border-slate-200 rounded-lg cursor-pointer hover:bg-slate-50">
                            <input type="radio" name="motor" value="ELEKTRO" class="text-blue-600 focus:ring-blue-500">
                            <span class="ml-3">ELEKTRO (Kein Hubraum)</span>
                        </label>
                    </div>
                </div>

                <!-- Felgen -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Felgenmaterial (Standard: 19", Schwarz)</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="flex items-center p-3 border border-slate-200 rounded-lg cursor-pointer hover:bg-slate-50">
                            <input type="radio" name="felgen" value="Aluminium" required class="text-blue-600 focus:ring-blue-500">
                            <span class="ml-3">Aluminiumfelgen</span>
                        </label>
                        <label class="flex items-center p-3 border border-slate-200 rounded-lg cursor-pointer hover:bg-slate-50">
                            <input type="radio" name="felgen" value="Stahlfelgen" class="text-blue-600 focus:ring-blue-500">
                            <span class="ml-3">Stahlfelgen</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200 shadow-md">
                        BESTELLEN
                    </button>
                </div>
            </form>

        <?php else: ?>

            <!-- ================================================================== -->
            <!-- BESTELLBESTÄTIGUNG (Backend Output)                                -->
            <!-- ================================================================== -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-100 text-green-500 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h2 class="text-3xl font-bold text-slate-800">Bestellung erfolgreich!</h2>
                <p class="text-slate-500 mt-2">Ihr Fahrzeug wurde in der Manufaktur in Auftrag gegeben.</p>
            </div>

            <!-- Tabellarische Ausgabe des gebauten Objekts -->
            <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm">
                <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                    <thead class="bg-slate-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-semibold text-slate-700 uppercase tracking-wider">Eigenschaft</th>
                        <th scope="col" class="px-6 py-3 font-semibold text-slate-700 uppercase tracking-wider">Ihre Konfiguration</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                    <tr>
                        <td class="px-6 py-4 font-medium text-slate-900">Marke</td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($meinAuto->getMarke()); ?></td>
                    </tr>
                    <tr class="bg-slate-50">
                        <td class="px-6 py-4 font-medium text-slate-900">Karosserie</td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($meinAuto->getKarosserie()); ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-medium text-slate-900">Farbe</td>
                        <td class="px-6 py-4 flex items-center">
                            <span class="w-6 h-6 inline-block rounded border border-slate-300 mr-2" style="background-color: <?php echo htmlspecialchars($meinAuto->getFarbe()); ?>;"></span>
                            <?php echo htmlspecialchars($meinAuto->getFarbe()); ?>
                        </td>
                    </tr>
                    <tr class="bg-slate-50">
                        <td class="px-6 py-4 font-medium text-slate-900">Motorentyp</td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($meinAuto->getMotorTyp()); ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-medium text-slate-900">Hubraum</td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($meinAuto->getMotorHubraum()); ?></td>
                    </tr>
                    <tr class="bg-slate-50">
                        <td class="px-6 py-4 font-medium text-slate-900">Felgenmaterial</td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($meinAuto->getFelgenMaterial()); ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-medium text-slate-900 text-blue-600">Standard: Räderanzahl</td>
                        <td class="px-6 py-4 text-blue-600"><?php echo $meinAuto->getAnzahlRaeder(); ?> Stück</td>
                    </tr>
                    <tr class="bg-slate-50">
                        <td class="px-6 py-4 font-medium text-slate-900 text-blue-600">Standard: Felgengröße</td>
                        <td class="px-6 py-4 text-blue-600"><?php echo htmlspecialchars($meinAuto->getFelgenGroesse()); ?></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-medium text-slate-900 text-blue-600">Standard: Felgenfarbe</td>
                        <td class="px-6 py-4 text-blue-600"><?php echo htmlspecialchars($meinAuto->getFelgenFarbe()); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-8 text-center">
                <a href="?" class="text-blue-600 hover:text-blue-800 font-medium">← Neues Fahrzeug konfigurieren</a>
            </div>

        <?php endif; ?>

    </div>
</div>

</body>
</html>